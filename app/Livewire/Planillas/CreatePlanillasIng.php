<?php

namespace App\Livewire\Planillas;

use App\Models\DetallePlanillas;
use App\Models\Pagos;
use App\Models\Planillas;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreatePlanillasIng extends Component
{
    public Collection $cart;
    public $Pagos = [], $afiliado;
    public $totalCart=0, $total;

    public function ScanningCode(){
       $Pagos = Pagos::where('nplanilla', 2)->get();

       if ($Pagos) {
            $Pagos = Pagos::where('nplanilla', 2)->get();
        
       } else {
            LivewireAlert::title('¡No Encontrado!')
            ->Error()
            ->show();
       }
    }

    public function save(){
          session()->put("cart", $this->cart);
          session()->save();  
    } 

     public function Create(){
        
        $empresaId = 2;

        $planillas = Pagos::with('contrato')->where('nplanilla', 2)->get();

        if ($planillas->isEmpty()) {
            LivewireAlert::title('¡No hay pagos para procesar!')->info()->show();
            return;
        }
    
        $totalCart = $planillas->sum('total_pagado');

        $periodo = Pagos::latest()->first();
        $periodosalud = $periodo->periodo;
      
        $fecha = now();
        $mes = $fecha->format('m');
        $ano = now()->year;
        $periodopension = $ano."-".($mes -1);
     
              
          DB::beginTransaction();

            try {   
                
                    $planilla = Planillas::Create([
                        'nplanilla' => 'Pendiente',
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
                        ]); 
                        $cont++;
                    }

                    DB::table('pagos')->where('nplanilla', '2')->update(['nplanilla' => '3']);
                    DB::commit();
                    
                    LivewireAlert::title('¡Planilla Creada!')
                        ->text('Se procesaron ' . count($pagoIds) . ' pagos')
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
        $empresaId = 2; 
        $Pagos = Pagos::with('contrato')
           ->where('nplanilla', 2)
           ->where('user_id', Auth::id())
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

        $totales = $Pagos->sum('total_pagado');

        return view('livewire.planillas.create-planillas-ing', [
            'totales' => $totales,
            'pagos' => $Pagos
        ]);
    }
}
