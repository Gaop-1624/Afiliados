<?php

namespace App\Livewire\Planillas;

use App\Models\Afiliado;
use App\Models\Pagos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class PlanillaRetiros extends Component
{
    public $afiliadosSinPago;

    public function mount()
    {
        $this->loadAfiliadosSinPago();
    }

    public function loadAfiliadosSinPago()
    {
        $inicio = now()->startOfMonth();
        $fin    = now()->endOfMonth();

        $this->afiliadosSinPago = Afiliado::whereHas('contratos', function($q){
                $q->where('status', 1); // opcional: solo contratos activos
            })
            ->whereDoesntHave('contratos.pagos', function($q) use ($inicio, $fin) {
                $q->whereBetween('fecha_pago', [$inicio, $fin]);
            })
            ->with(['tdocumentos','contratos' => fn($q) => $q->where('status',1)])
            ->get();
    }

    public function RetirarAfiliados(){
        LivewireAlert::title(__('Withdraw Members'))
                ->text(__('Are you sure you want to remove these affiliates?'))
                ->asConfirm()
                ->onConfirm('deleteItem', ['confirm' => true])
                ->show();
    }

    public function deleteItem($data)
    {
        // solo proceder si confirmación verdadera
        if (empty($data['confirm'])) {
            return;
        }

        $inicio = now()->startOfMonth();
        $fin    = now()->endOfMonth();

        $afiliadosSinPago = Afiliado::whereHas('contratos', function($q){
                $q->where('status', 1); // opcional: solo contratos activos
            })
            ->whereDoesntHave('contratos.pagos', function($q) use ($inicio, $fin) {
                $q->whereBetween('fecha_pago', [$inicio, $fin]);
            })
            ->with(['tdocumentos','contratos' => fn($q) => $q->where('status',1)])
            ->get();

        if ($afiliadosSinPago->isEmpty()) {
            LivewireAlert::title(__('No affiliates to withdraw'))->info()->show();
            return;
        }  

       
        
        DB::beginTransaction();
            try {

                foreach ($afiliadosSinPago as $afiliado) {
                    // obtener contrato relevante (último activo)
                    $contrato = $afiliado->contratos()->where('status', 1)->latest()->first();
                    if (! $contrato) {
                        continue;
                    }

                    // actualizar contrato: marcar como retirado (status = 2) y guardar fecha_retiro
                    $contrato->update([
                        'status' => 2, // ajustar valor según tu convención (2 = retirado)
                        'fecha_retiro' => now()->toDateString()
                    ]);

                    $salario = $contrato->salario / 30;
                    $ncodigo = Pagos::latest()->first();
     
                    if ($ncodigo) {
                        $codigo = $ncodigo->id + 1;
                    } else {
                        $codigo = 1;
                    }

                    $codigo1 = str_pad($codigo, 4, '0', STR_PAD_LEFT);

                    $user = Auth::id();
                    $mes = now()->month;
                    $ano = now()->year;
                    $periodo = $ano."-".$mes;

                    $pago = Pagos::create([
                            'codigo' => $codigo1,
                            'total_pagado' => 0,
                            'fecha_pago' => now(),
                            'salario' => $salario,
                            'contrato_id' => $contrato->id,
                            'periodo' => $periodo,
                            'user_id' => $user,
                            'dias' => 1,
                            'nplanilla' => 1,
                            'novedad' => 'RET'
                    ]); 
}

            DB::commit();

                LivewireAlert::title(__('Withdrawn successfully'))
                    ->success()
                    ->show();

                // recargar lista
                $this->loadAfiliadosSinPago();

            } catch (\Throwable $th) {
                DB::rollBack();
                LivewireAlert::title(__('Error withdrawing affiliates'))
                    ->text($th->getMessage())
                    ->error()
                    ->show();
            }

    }

    public function render()
    {
        return view('livewire.planillas.planilla-retiros');
    }
}
