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

    public function ClearFiels(){
        $this->reset(['Nplanilla', 'Vpagado']);
        $this->resetValidation();
    }

    public function OpenModal($planillaId){
            $this->ClearFiels();
            $this->selectedPlanillaId = $planillaId;
            $this->modal = true;
        }

        public function CloseModal(){
            $this->ClearFiels();
            $this->modal = false;
           // $this->redirectRoute('Planillas.Planillas');
        }

    
    public function ExpotPlanillasAportes($id){
        return Excel::download(new PlanillasAportes($id), 'PlanillaAportesenLinea.xlsx');    
    }

     public function ExpotPlanillasSimple($id){
        return Excel::download(new PlanillasSimple($id), 'PlanillaPagoSimple.xlsx');    
    }

    public function PagarPlanilla(Planillas $id){
            $planilla = Planillas::find($id)->first();
           
             DB::beginTransaction();

            try { 
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
                    'detalle' => "Pago de Planilla", $this->Nplanilla,
                    'entrada' => 0,
                    'salida' =>$this->Vpagado,
                    'total' => $total,
                    'empresa_id' => $empresa,
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
      $planillas = Planillas::paginate(3);
      
     // $query = Planillas::query();

        // Filtrar por usuario logueado
        /* $query->where('user_id', Auth::id()); */

        // Filtro de búsqueda (si hay texto en $this->search)
    /*     if (!empty($this->search)) {
            $s = $this->search;
            $query->where(function($q) use ($s) {
                $q->where('id', 'like', '%'.$s.'%')
                  ->orWhere('codigo', 'like', '%'.$s.'%')
                  ->orWhere('periodo', 'like', '%'.$s.'%');
            });
        }

        $planillas = $query->orderBy('id','DESC')->paginate(6); */

        return view('livewire.planillas.planillas-index', [
            'planillas' => $planillas,
          
        ]);
    }
}
