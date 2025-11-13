<?php

namespace App\Livewire\Cajas;

use App\Models\Caja;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditCaja extends Component
{
     public $nit, $t_documento_id, $nombre, $codigo, $arlid, $TDocumentos, $arl, $cajaid;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Cajas.Cajas');
    }

    public function create(){

        $caja = Caja::updateOrCreate(
            ['id' => $this->cajaid], 
            [
            'nit' => $this->nit,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
        ]);
      

        LivewireAlert::title('¡Caja Actualizada!')->success()->show();

        $this->closeModal();
        
    }

    public function mount($arlid = null)
    { 
        $this->arl = $arlid;
        $this->TDocumentos = TDocumento::all();
    } 

    public function render()
    {
        $cajas = Caja::find($this->cajaid);

        return view('livewire.cajas.edit-caja', [
            $this->nit = $cajas->nit,
            $this->t_documento_id = $cajas->t_documento_id,
            $this->nombre = $cajas->nombre,
            $this->codigo = $cajas->codigo,
            
        ]);
    }
}
