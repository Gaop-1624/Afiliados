<?php

namespace App\Livewire\Afps;

use App\Models\Afp;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditAfp extends Component
{
    public $nit, $t_documento_id, $nombre, $codigo, $afpid, $TDocumentos, $afp;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afps.Afps');
    }

    public function create(){

        $afp = Afp::updateOrCreate(
            ['id' => $this->afpid], 
            [
            'nit' => $this->nit,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
        ]);
      

        LivewireAlert::title('¡Afp Actualizada!')->success()->show();
        
        $this->closeModal();
        
    }

    public function mount($afpid = null)
    { 
        $this->afp = $afpid;
        $this->TDocumentos = TDocumento::all();
    } 

    public function render()
    {
        $afp = Afp::find($this->afp);

        return view('livewire.afps.edit-afp', [
            $this->nit = $afp->nit,
            $this->t_documento_id = $afp->t_documento_id,
            $this->nombre = $afp->nombre,
            $this->codigo = $afp->codigo,
            $this->afpid = $afp->id,
        ]);
    }
}
