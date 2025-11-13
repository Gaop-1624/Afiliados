<?php

namespace App\Livewire\Actualizar;

use App\Models\Salario;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ActualizarSalario extends Component
{
    public $salario, $adm;
    public $valor, $ano, $id;
    public $updating = false;

    public function closeModal(){
        $this->resetValidation();
        $this->reset(['salario','ano', 'adm']);
        $this->updating = false;
       // $this->redirectRoute('dashboard');
    }

    public function Rules(){
        return [
            'salario' => [
                'required',
                'numeric',
            ],
            'adm' => [
                'required',
                'numeric',
            ],
        ];
    }
    
    public function create()
    {
       $this->validate($this->Rules());

       $ano = date('Y');

       // Validar que no exista ya un salario para el año
        /* if (Salario::where('ano', $ano)->exists()) {
           LivewireAlert::title("Ya existe un salario para el año {$ano}")
               ->error()
               ->show();
           return;
       }  */

       Salario::updateOrCreate(
           ['id' => $this->id],
           [
               'salario' => $this->salario,
               'administracion' => $this->adm,
               'ano' => $ano,
           ]
       );
       /*  Salario::create([
            'salario' => $this->salario,
            'ano'   => $ano,
            'administracion' => $this->adm
        ]);  */

        
        if($this->updating){
            LivewireAlert::title('Salario actualizado con éxito')
                ->success()
                ->show();
        }else{
            LivewireAlert::title('Salario creado con éxito')
                ->success()
                ->show();
        }

        $this->closeModal();
    }

    public function update(Salario $salario)
    {
            $Salario = Salario::where('id', $salario->id)->first();

            $this->salario = $Salario->salario;
            $this->adm = $Salario->administracion;
            $this->ano = $Salario->ano;
            $this->id = $Salario->id;
            $this->updating = true;

           
    }

    public function render()
    {
        $salario = Salario::all();
        return view('livewire.actualizar.actualizar-salario',[
            'salarios' => $salario
        ]);
    }
}
