<?php

namespace App\Livewire\Empresa;

use App\Models\Arl;
use App\Models\Caja;
use App\Models\Ciudade;
use App\Models\Empresa as ModelsEmpresa;
use App\Models\TDocumento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Empresa extends Component
{
    use WithFileUploads;

    public $TDocumentos, $Ciudades, $Cajas, $Arls, $ciudad_id, $email, $Pagina_web, $arl_id, $caja_id;
    public $t_documento_id, $Empresa, $nit, $dev, $nombre, $direccion, $telefono, $celular;
    public $file, $empresaId;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Empresa.Index');
    }


    public function update(){
        $user = User::find(Auth::user()->id);
        $idEmpresa = $user->empresa_id;
        $empresa = ModelsEmpresa::find($idEmpresa);
      
       $empresa->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'email' => $this->email,
            'ciudad_id' => $this->ciudad_id,
            'caja_id' => $this->caja_id,
            'arl_id' => $this->arl_id,
        ]);

        LivewireAlert::title('¡Empresa Actualizado!')
                    ->success()
                    ->show();

        $this->closeModal();
    }

    
    public function mount($empresaId = null)
    {
        $this->empresaId = $empresaId;
        $this->TDocumentos = TDocumento::all();
        $this->Ciudades = Ciudade::all();
        $this->Cajas = Caja::all();
        $this->Arls = Arl::all();
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $IdEmpresa = $user->empresa_id;
        $empresa = ModelsEmpresa::find($this->empresaId);
        
        return view('livewire.empresa.empresa', [
             $this->t_documento_id = $empresa->t_documento_id,
             $this->nit = $empresa->nit,
             $this->dev = $empresa->dev,
             $this->nombre = $empresa->nombre,
             $this->direccion = $empresa->direccion,
             $this->telefono = $empresa->telefono,
             $this->celular = $empresa->celular,
             $this->email = $empresa->email,
             $this->ciudad_id = $empresa->ciudad_id,
             $this->Pagina_web = $empresa->Pagina_web,
             $this->caja_id = $empresa->caja_id,
             $this->arl_id = $empresa->arl_id,
        ]);
    }
}
