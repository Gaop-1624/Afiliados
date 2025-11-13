<?php

namespace App\Livewire\Arls;

use App\Models\Afp;
use App\Models\Arl;
use App\Models\TDocumento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditArl extends Component
{
   
    public $nit, $t_documento_id, $nombre, $codigo, $arlid, $TDocumentos, $arl;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Arls.Arls');
    }

    public function create(){

        $arl = Arl::updateOrCreate(
            ['id' => $this->arlid], 
            [
            'nit' => $this->nit,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
        ]);
      

        LivewireAlert::title('¡Arl Actualizada!')->success()->show();      
        
        $this->closeModal();
        
    }

    public function mount($arlid = null)
    { 
        $this->arl = $arlid;
        $this->TDocumentos = TDocumento::all();
    } 


    public function render()
    {
       $arls = Arl::find($this->arl);

        return view('livewire.arls.edit-arl', [
            $this->nit = $arls->nit,
            $this->t_documento_id = $arls->t_documento_id,
            $this->nombre = $arls->nombre,
            $this->codigo = $arls->codigo,
            $this->arlid = $arls->id,
        ]);
    }
}
