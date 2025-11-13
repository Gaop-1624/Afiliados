<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use App\Models\Afp;
use App\Models\Arl;
use App\Models\Ciudade;
use App\Models\EmpresaLaboral\EmpresaLaboral;
use App\Models\Ep;
use App\Models\Pagos;
use App\Models\TDocumento;
use Livewire\Component;
use Livewire\WithPagination;

class VerAfiliado extends Component
{
    use WithPagination;

    public $afiliadoId, $TDocumentos, $Ciudades, $Eps, $Arl, $Afps, $empresal, $id;
    public $pago = [];

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afiliados');
    }

    public function ContratosActivos(){
        
        $afiliado = Afiliado::find($this->afiliadoId);
       
        $ultimoContrato = $afiliado->contratos->last();
        if ($ultimoContrato) {
            $id = $ultimoContrato->id; 
        }

       $pago = Pagos::where('contrato_id', $id)->paginate(6);
      // $pago = Pagos::all();
        dd($pago);
     $this->$pago;
    
    }
    
    public function mount($afiliadoId = null)
    { 
        $this->afiliadoId=$afiliadoId;
        $this->TDocumentos = TDocumento::all();
        $this->Ciudades = Ciudade::all();
        $this->empresal = EmpresaLaboral::all();
        $this->Eps = Ep::all();
        $this->Arl = Arl::all();
        $this->Afps = Afp::all();
    }
    
    public function render()
    {
        $afiliado = Afiliado::find($this->afiliadoId);
      //$pagos = $this->ContratosActivos();
      
         $ultimoContrato = $afiliado->contratos->last();
        if ($ultimoContrato) {
            $id = $ultimoContrato->id; 
        }

        $pagos = Pagos::where('contrato_id', $id)->paginate(6);      
        return view('livewire.afiliados.ver-afiliado',[
            'afiliados' => $afiliado,
            'pagos' => $pagos,
        ]);
    }
}
