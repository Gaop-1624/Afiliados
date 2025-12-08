<?php

namespace App\Livewire\Planillas;

use App\Models\AfiliadoPlanilla;
use App\Models\DetallePlanillas;
use App\Models\Pagos;
use App\Models\Planillas;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreatePlanillas extends Component
{
    public Collection $cart;
    public $Pagos = [], $afiliado;
    public $totalCart=0, $total;
    
    public function cerrar(){
        $this->cart = new Collection;
        $this->save();
        $this->redirectRoute('Planillas.Planillas');
    }

     public function refresh(){
        $this->cart = new Collection;
        $this->totalCart = 0;
        $this->save();
        $this->dispatch('refresh');
    }

    function ScanningCode(){
       $Pagos = Pagos::where('nplanilla', 1)->get();

       if ($Pagos) {
            $Pagos = Pagos::where('nplanilla', 1)
                  //  ->where('contrato_empresa', 3)
                    ->get();
          //  dd($Pagos);
            //$this->AddAfiliado($Pagos);
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
        $empresaId = 1;

        $planillas = Pagos::with('contrato')
           ->where('nplanilla', 1)
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

      
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
   
                    foreach($planillas as $pago){
                        DetallePlanillas::create([
                            'planilla_id' => $planilla->id,
                            'afiliado_id' => $pago->contrato->afiliado_id,
                            // 'pago_id' => $pago->id, // opcional si tu tabla detalle tiene referencia
                        ]);
}
                     
                    DB::table('pagos')->where('nplanilla', '1')->update(['nplanilla' => '2']);

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
        $empresaId = 1; 
        $Pagos = Pagos::with('contrato')
           ->where('nplanilla', 1)
           ->where('user_id', Auth::id())
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

        $totales = $Pagos->sum('total_pagado');

        return view('livewire.planillas.create-planillas', [
            'totales' => $totales,
            'pagos' => $Pagos
        ]);
    }
}
