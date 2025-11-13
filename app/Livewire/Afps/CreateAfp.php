<?php

namespace App\Livewire\Afps;

use App\Models\Afp;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateAfp extends Component
{
    public $nit, $TDocumentos, $t_documento_id, $nombre, $codigo, $afpid;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afps.Afps');
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
    
            Afp::updateOrCreate(
                ['id' => $this->afpid], 
                [
                't_documento_id' => $this->t_documento_id,
                'nit' => $this->nit,
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
            ]);

             LivewireAlert::title('¡Afp Creada!')
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
        return view('livewire.afps.create-afp');
    }
}
