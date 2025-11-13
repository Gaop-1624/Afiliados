<?php

namespace App\Livewire\Epss;

use App\Models\Ep;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateEps extends Component
{
    public $nit, $TDocumentos, $t_documento_id, $nombre, $codigo, $epsid;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Eps.Eps');
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
    
            Ep::updateOrCreate(
                ['id' => $this->epsid], 
                [
                't_documento_id' => $this->t_documento_id,
                'nit' => $this->nit,
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'tarifaeps' => '0.04'
            ]);

             LivewireAlert::title('¡Eps Creada!')
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
        return view('livewire.epss.create-eps');
    }
}
