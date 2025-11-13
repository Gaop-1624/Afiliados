<?php

namespace App\Livewire\Epss;

use App\Models\Ep;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditEps extends Component
{
    public $nit, $t_documento_id, $nombre, $codigo, $epsid, $TDocumentos, $eps;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Eps.Eps');
    }

    public function create(){

        $eps = Ep::updateOrCreate(
            ['id' => $this->epsid], 
            [
            'nit' => $this->nit,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
        ]);
      

        LivewireAlert::title('¡Eps Actualizada!')->success()->show();

        $this->closeModal();

    }

    public function mount($epsid = null)
    { 
        $this->eps = $epsid;
        $this->TDocumentos = TDocumento::all();
    } 

    public function render()
    {
        $eps = Ep::find($this->eps);
        
        return view('livewire.epss.edit-eps', [
            $this->nit = $eps->nit,
            $this->t_documento_id = $eps->t_documento_id,
            $this->nombre = $eps->nombre,
            $this->codigo = $eps->codigo,
            $this->epsid = $eps->id,
        ]);
    }
}
