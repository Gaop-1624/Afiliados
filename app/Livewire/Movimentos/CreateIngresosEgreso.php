<?php

namespace App\Livewire\Movimentos;

use App\Models\IngresosEgresos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use PHPUnit\Framework\Constraint\IsTrue;

class CreateIngresosEgreso extends Component
{
    public $total, $tipo, $detalle;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Movimiento.IngresosEgresos');
    }

    public function limpiarModal(){
        $this->resetValidation();
        $this->reset(['total','tipo','detalle']);
    }

    public function Rules(){
        return [
                'detalle' => [
                            'required',
                            'string',
                ],
                'tipo' => [
                            'required',
                            'string',
                ],
                'total' => [
                            'required',
                            'numeric',
                ],
             
        ];
    }

    public function CrearIngresoEgreso(){
            $this->validate($this->Rules());

            $user = User::find(Auth::user()->id);
            $empresa = $user->empresa_id;
            $IngresosEgresos = IngresosEgresos::latest()->first();
            $valortotal = $IngresosEgresos->total ?? 0;
            $valortotal = $IngresosEgresos ? $IngresosEgresos->total : 0;

            if($this->tipo == 0){
                $tipo = 0;
                $entrada =$this->total;
                $salida = 0;
                $total = $valortotal + $this->total;
            }else{
                $tipo = 1;
                $entrada = 0;
                $salida =$this->total;
                $total = $valortotal - $this->total;
            }
            
            
            $IngresoEgreso = IngresosEgresos::create([
                    'fecha_ingreso' => now(),
                    'mes' => now()->month,
                    'tipo' => $tipo,
                    'detalle' => $this->detalle,
                    'entrada' => $entrada,
                    'salida' => $salida,
                    'total' => $total,
                    'empresa_id' => $empresa,
                    'user_id' => Auth::id()
            ]);
      

                 LivewireAlert::title('¡Registro Ingresado!')
                    ->success()
                    ->show();

                    $this->closeModal();
    }

    public function render()
    {
        return view('livewire.movimentos.create-ingresos-egreso');
    }
}
