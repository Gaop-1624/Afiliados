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
       $Pagos = Pagos::where('nplanilla', 1)->get();

       if ($Pagos) {
            $Pagos = Pagos::where('nplanilla', 1)
                  //  ->where('contrato_empresa', 3)
                    ->get();
        
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
        $empresaId = 4;

        $planillas = Pagos::with('contrato')
           ->where('nplanilla', 1)
           ->whereHas('contrato', function($q) use ($empresaId) {
               $q->where('empresa_id', $empresaId);
           })
           ->get();

       // $planillas = Pagos::with('contrato')->where('nplanilla', 1)->get();
       // $totalCart = Pagos::where('nplanilla', 1)->sum('total_pagado');
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

                        /* DB::table('pagos')->where('nplanilla', '1')->update([
                            'nplanilla' => '2'
                        ]); */

                        $planillas[$cont]->nplanilla = '2';
                        $planillas[$cont]->save();
                     // $planillas->update(['nplanilla' => '2']);

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
        $empresaId = 4; 
        $Pagos = Pagos::with('contrato')
           ->where('nplanilla', 1)
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
