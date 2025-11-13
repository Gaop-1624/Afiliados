<?php

namespace App\Livewire\Arls;

use App\Models\Arl;
use App\Models\TDocumento;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateArl extends Component
{
    public $nit, $TDocumentos, $t_documento_id, $nombre, $codigo, $arlid;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Arls.Arls');
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
    
            Arl::updateOrCreate(
                ['id' => $this->arlid], 
                [
                't_documento_id' => $this->t_documento_id,
                'nit' => $this->nit,
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
            ]);

             LivewireAlert::title('¡Arl Creada!')
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
        return view('livewire.arls.create-arl');
    }
}
