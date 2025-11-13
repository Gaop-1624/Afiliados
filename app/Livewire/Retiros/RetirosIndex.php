<?php

namespace App\Livewire\Retiros;

use App\Models\Afiliado;
use App\Models\contrato;
use App\Models\Pagos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class RetirosIndex extends Component
{
    public $documento, $nombreCompleto, $documentocc, $diasretiro, $activated, $fecha_retiro, $status;
  

    public function limpiarModal(){
        $this->resetValidation();
        $this->reset(['documentocc','nombreCompleto', 'documento', 'diasretiro', 'fecha_retiro']);
        $this->activated = 0;
    }

    public function ScanningId(){

        $afiliado = Afiliado::with('Contratos')->where('documento', $this->documento)->first();

  
            if($afiliado){

                if($afiliado->contratos[0]->status == '1' ?? ""){
                        $this->activated = 1;
                    } elseif($afiliado->contratos[0]->status == '2' ?? ""){
                        $this->activated = 2;
                    } else{
                        $this->activated = 0;
                }

                $this->nombreCompleto =  $afiliado->pnombre . ' ' . $afiliado->snombre . ' ' . $afiliado->papellido . ' ' . $afiliado->sapellido;
                $this->documentocc = $afiliado->documento;
                $this->fecha_retiro = $afiliado->contratos[0]->fecha_retiro ?? "";

            } else {

                LivewireAlert::title('¡Afiliado No Existe!')
                ->error()
                ->show();
                $this->limpiarModal();

            }

       
    }

    public function Rules(){
        return [
                'diasretiro' => [
                    'required',
                    'numeric',
                    'max:30'
                ],
                'documento' => [
                    'required',
                    'numeric',
                ]
        ];
    }

    public function RetirarAfiliado(){

        $this->validate($this->Rules());

        $afiliado = Afiliado::where('documento', $this->documentocc)->first();
        
 
        if($afiliado->contratos[0]->status == '1'){
            $this->activated = 1;
            $contrato = $afiliado->contratos[0]->update([
                'status' => '2',
                'fecha_retiro' => now(),
            ]);

            $ncodigo = Pagos::latest()->first();
     
            if ($ncodigo) {
                $codigo = $ncodigo->id + 1;
            } else {
                $codigo = 1;
            }

            $codigo1 = str_pad($codigo, 4, '0', STR_PAD_LEFT);

            $user = Auth::id();
            $contratoId = $afiliado->contratos[0]->id;

            $mes = now()->month;
            $ano = now()->year;
            $periodo = $mes."-".$ano;
            $salario = 1423500;
            $dias = $this->diasretiro;
            $totalretiro = $salario / 30 * $dias;

            $pago = Pagos::create([
                'codigo' => $codigo1,
                'total_pagado' => $totalretiro,
                'fecha_pago' => now(),
                'salario' => $totalretiro,
                'contrato_id' => $contratoId,
                'periodo' => $periodo,
                'user_id' => $user,
                'dias' => $this->diasretiro,
                'nplanilla' => 1,
                'novedad' => "Retiro"
            ]); 
           
            LivewireAlert::title('¡Afiliado Retirado!')
            ->success()
            ->show();
            $this->limpiarModal();

        } else {
            $this->activated = 2;
        }
  
    }

    public function ActivarAfiliado(){
        
            $afiliado = Afiliado::where('documento', $this->documentocc)->first();

             $user = User::find(Auth::user()->id);
             $mes = now()->month;
             $ano = now()->year;
             $perido = $mes."-".$ano;
             $epsId = $afiliado->contratos->eps_id;
             $afpId = $afiliado->contratos->afp_id;
             $cajaId = $afiliado->contratos->caja_id;
             $riesgo = $afiliado->contratos->riesgo;
             $claseArl = $afiliado->contratos->claseArl;
            
             $contrato = contrato::create([
                        'fecha_ingreso' => now(),
                        'afiliado_id' => $afiliado->id,
                        'periodo' => $perido,
                        'eps_id' => $epsId,
                        'afp_id' => $afpId,
                        'caja_id' => $cajaId,
                        'status' => 3,
                        'riesgo' => $riesgo,
                        'claseArl' => $claseArl,
                        'user_id' => $user->id,
            ]);

            LivewireAlert::title('¡Afiliado Activado!')
            ->success()
            ->show();
            $this->limpiarModal();

    }

    public function render()
    {
        return view('livewire.retiros.retiros-index');
    }
}
