<?php

namespace App\Livewire\Planillas;

use App\Models\DetallePlanillas;
use App\Models\Pagos;
use App\Models\Planillas;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatePlanillasDp extends Component
{

    public Collection $cart;
    public $Pagos = [], $afiliado;
    public $totalCart=0, $total;

    function ScanningCode(){
       $Pagos = Pagos::where('nplanilla', 4)->get();

       if ($Pagos) {
            $Pagos = Pagos::where('nplanilla', 4)->get();
        
       } else {
            LivewireAlert::title('¡No Encontrado!')
            ->error()
            ->show();
       }
    }

    public function save(){
          session()->put("cart", $this->cart);
          session()->save();  
    } 

     public function Create(){
        $empresaId = 4;

        $planillas = Pagos::with('contrato')->where('nplanilla', 4)->get();

        if ($planillas->isEmpty()) {
            LivewireAlert::title('¡No hay pagos para procesar!')->info()->show();
            return;
        }

        $totalCart = $planillas->sum('total_pagado');

        $periodo = Pagos::latest()->first();
        $ultimoperiodo = $periodo->periodo;
      
        $ano = (int) now()->year;
        $periodosalud =  $ano."-".($ultimoperiodo);
        $periodopension =  $ano."-".($ultimoperiodo -1);
       /*  $periodosalud = $periodo->periodo;
      
        $fecha = now();
        $mes = $fecha->format('m');
        $ano = now()->year;
        $periodopension = $ano."-".($mes -1); */
     
              
         DB::beginTransaction();

            try { 

               
                    $planilla = Planillas::Create([
                        'nplanilla' => 'Sin Pagar',
                        'total_pagado' => $totalCart,
                        'periodo_salud' => $periodosalud,
                        'periodo_pension' => $periodopension,
                        'empresa_id' => $empresaId,
                        'user_id' => Auth::id()
                    ]);

                    // recolectar ids de pagos
                    $pagoIds = $planillas->pluck('id')->toArray();

                    $cont=0;
                    while($cont < count($planillas)){
                        DetallePlanillas::create([
                            'planilla_id' => $planilla->id,
                            'afiliado_id' => $planillas[$cont]->contrato->afiliado_id,
                            'pago_id' => $planilla->id,
                            'salario' => $planilla->salario ?? 0,
                            'total_pagado' => $planilla->total_pagado ?? 0,
                        ]); 
                        $cont++;
                    }
   
                                    
                    DB::table('pagos')->where('nplanilla', '4')->update(['nplanilla' => '3']);

                    LivewireAlert::title('¡Planilla Creada!')
                    ->success()
                    ->show();

                    $this->redirectRoute('Planillas.Planillas');
                    
            
              } catch (\Throwable $th) {
                DB::rollBack();
                LivewireAlert::title('¡Error al Guardar la Planilla!')
                    ->Error()
                    ->timer(3000)
                    ->show();
            }

        DB::commit();  

    }

    public function mount(){
        if(session()->has('cart')){
            $this->cart = session('cart');
        } else {
            $this->cart = new Collection;
        }
    }

    public function render()
    {
        $empresaId = 4; 
        $Pagos = Pagos::with('contrato')
           ->where('nplanilla', 4)
            ->where('user_id', Auth::id())
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

        $totales = $Pagos->sum('total_pagado');

        return view('livewire.planillas.create-planillas-dp',[
            'totales' => $totales,
            'pagos' => $Pagos
        ]);
    }
}
