<?php

namespace App\Livewire\Cajas;

use App\Models\Caja;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateCaja extends Component
{
     public $nit, $TDocumentos, $t_documento_id, $nombre, $codigo, $caja_id;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Cajas.Cajas');
    }

    public function Rules(){
        return [
            't_documento_id' => [
                'required',
            ],
           'nit' => [
                'required',
                'numeric',
            ],
            'codigo' => [
                  'required',
                    'string',
            ],
            'nombre' => [
                  'required',
                  'string',  
            ]
        ];
    }

        public function create(){
            $this->validate($this->Rules()); 
    
            Caja::updateOrCreate(
                ['id' => $this->caja_id], 
                [
                't_documento_id' => $this->t_documento_id,
                'nit' => $this->nit,
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'tarifacaja' => "0.04",
                'dpto' => "VALLE",
                'ciudad' => "CALI",
            ]);

             LivewireAlert::title('¡Caja Creada!')
            ->success()
            ->show(); 
    
            $this->closeModal();
        }

    public function mount()
    {
        $this->TDocumentos = TDocumento::all();
    }

    public function render()
    {
        return view('livewire.cajas.create-caja');
    }
}
