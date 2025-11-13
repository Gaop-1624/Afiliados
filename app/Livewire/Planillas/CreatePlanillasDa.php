<?php

namespace App\Livewire\Planillas;

use App\Models\Pagos;
use Livewire\Component;
use App\Models\DetallePlanillas;
use App\Models\Planillas;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CreatePlanillasDa extends Component
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
        $periodosalud = $periodo->periodo;
      
        $fecha = now();
        $mes = $fecha->format('m');
        $ano = now()->year;
        $periodopension = $ano."-".($mes -1);
     
              
         DB::beginTransaction();

            try { 

                if ($planillas->count()){
                    $planilla = Planillas::Create([
                        'nplanilla' => 'Pendiente',
                        'total_pagado' => $totalCart,
                        'periodo_salud' => $periodosalud,
                        'periodo_pension' => $periodopension,
                    ]);
   
                    $cont=0;
                    while($cont < count($planillas)){
                        DetallePlanillas::create([
                            'planilla_id' => $planilla->id,
                            'afiliado_id' => $planillas[$cont]->contrato->afiliado_id,
                        ]); 

                    
                        $planillas[$cont]->nplanilla = '2';
                        $planillas[$cont]->save();
                    
                    $cont++;
                    }

                    LivewireAlert::title('¡Planilla Creada!')
                    ->success()
                    ->show();

                    $this->redirectRoute('Planillas.Planillas');
                    
                }else{
                    LivewireAlert::title('¡No Existen Planillas!')
                    ->success()
                    ->show();
                }

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
        $empresaId = 5; 
        $Pagos = Pagos::with('contrato')
           ->where('nplanilla', 1)
           ->where('user_id', Auth::id())
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

        $totales = $Pagos->sum('total_pagado');

        return view('livewire.planillas.create-planillas-da', [
            'totales' => $totales,
            'pagos' => $Pagos
        ]);
    }
}
