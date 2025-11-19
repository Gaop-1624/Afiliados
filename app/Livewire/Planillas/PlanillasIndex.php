<?php

namespace App\Livewire\Planillas;

use App\Exports\PlanillasAportes;
use App\Exports\PlanillasSimple;
use App\Models\IngresosEgresos;
use App\Models\Pagos;
use App\Models\Planillas;
use App\Models\Salario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class PlanillasIndex extends Component
{
    public $id, $Nplanilla, $Vpagado, $planilla;
    public $modal = false;
    public $selectedPlanillaId = null;
    public $currentPlanilla = null;

    public function ClearFiels(){
        $this->reset(['Nplanilla', 'Vpagado']);
        $this->resetValidation();
    }

    public function OpenModal($id){
            $this->ClearFiels();
            $this->selectedPlanillaId = $id;
            $this->currentPlanilla = Planillas::with('empresa')->find($id);
          //  $this->Nplanilla= $this->currentPlanilla->nplanilla ?? null;
            $this->modal = true;
    }

    public function CloseModal(){
        
            $this->selectedPlanillaId = null;
            $this->currentPlanilla = null;
           
            $this->modal = false;
            $this->ClearFiels();
    }

    
    public function ExpotPlanillasAportes($id){
        return Excel::download(new PlanillasAportes($id), 'PlanillaAportesenLinea.xlsx');    
    }

     public function ExpotPlanillasSimple($id){
        return Excel::download(new PlanillasSimple($id), 'PlanillaPagoSimple.xlsx');    
    }

    public function PagarPlanilla(){
      // dd($planilla);
        $planilla = Planillas::find($this->selectedPlanillaId);

         if (! $this->selectedPlanillaId) {
            LivewireAlert::title('Planilla no seleccionada')->error()->show();
            return;
        }

        $this->validate([
            'Nplanilla' => 'required|string',
            'Vpagado'   => 'required|numeric',
        ]);
      
        DB::beginTransaction();

            try {  

                DB::table('pagos')->where('nplanilla', '3')->update(['nplanilla' => $this->Nplanilla]);

                $planilla->update([
                    'nplanilla' => $this->Nplanilla,
                    'total_pagado' => $this->Vpagado,
                    'status' => '1'
                ]);


                $user = User::find(Auth::user()->id);
                $empresa = $user->empresa_id;

                $IngresosEgresos = IngresosEgresos::latest()->first();
                $valortotal = $IngresosEgresos->total ?? 0;
                $valortotal = $IngresosEgresos ? $IngresosEgresos->total : 0;
                        
                $salario = Salario::latest()->first();
                      
                $total = $valortotal - str_replace(',', '', $this->Vpagado);

                $IngresoEgreso = IngresosEgresos::create([
                    'fecha_ingreso' => now(),
                    'mes' => now()->month,
                    'tipo' => 1,
                    'detalle' => "Pago de Planilla No :".$this->Nplanilla,
                    'entrada' => 0,
                    'salida' =>$this->Vpagado,
                    'total' => $total,
                    'empresa_id' => $empresa,
                    'user_id' => Auth::user()->id,
                ]); 

                LivewireAlert::title('¡Planilla Pagada!')
                ->success()
                ->show();

                $this->modal = false;

             } catch (\Throwable $th) {
                DB::rollBack();
                LivewireAlert::title('¡Error al Pagar Planilla!')
                    ->Error()
                    ->timer(3000)
                    ->show();
            }

        DB::commit();  
           
    }

    public function render()
    {
        $query = Planillas::query();
    
      //  $planillas = Planillas::paginate(3);
        // Filtrar por usuario logueado
      //  $query->where('user_id', Auth::id());

        // Filtro de búsqueda (si hay texto en $this->search)
        /* if (!empty($this->search)) {
            $s = $this->search;
            $query->where(function($q) use ($s) {
                $q->where('id', 'like', '%'.$s.'%')
                  ->orWhere('nplanilla', 'like', '%'.$s.'%')
                  ->orWhere('periodo_salud', 'like', '%'.$s.'%')
                  ->orWhere('periodo_pension', 'like', '%'.$s.'%');
            });
        }

        $planillas = $query->orderBy('id','DESC')->paginate(3); */
        $planillas = Planillas::with('empresa')->latest()->paginate(10);
      
        return view('livewire.planillas.planillas-index', [
                'planillas' => $planillas,
            
            ]);
        }
}
