<?php

namespace App\Livewire\Empresa;

use App\Models\Arl;
use App\Models\Caja;
use App\Models\Ciudade;
use App\Models\Empresa;
use App\Models\TDocumento;
use Livewire\Component;

class EmpresaShow extends Component
{
    public $empresaId, $TDocumentos, $Ciudades, $empresal, $Arl, $caja;
    public $t_documento_id;

    public function mount($empresaId = null)
    { 
        $this->empresaId=$empresaId;
        $this->TDocumentos = TDocumento::all();
        $this->Ciudades = Ciudade::all();
        $this->Arl = Arl::all();
        $this->caja = Caja::all();
    }

    public function render()
    {
        $empresa = Empresa::find($this->empresaId);

        return view('livewire.empresa.empresa-show', [
            'empresa' => $empresa,
        ]);
    }
}
