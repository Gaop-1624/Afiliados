<?php

namespace App\Livewire\Empresa;

use App\Models\Arl;
use App\Models\Caja;
use App\Models\Ciudade;
use App\Models\Empresa;
use App\Models\TDocumento;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateEmpresa extends Component
{
    public $TDocumentos, $Ciudades, $Cajas, $Arls, $ciudad_id, $email, $Pagina_web, $arl_id, $caja_id;
    public $t_documento_id, $Empresa, $nit, $dev, $nombre, $direccion, $telefono, $celular;
    public $file, $id, $afp_id;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Empresa.Index');
    }

    public function Rules(){
         return [
            't_documento_id' => [
                'required',
                'string',
            ],
             'nombre' => [
                'required',
                'string',
            ],
            'nit' => [
                'required',
                'numeric',
                 'unique:empresas,nit,'.$this->id
            ],
           'dev' => [
                'required',
                'numeric',
            ],  
             'direccion' => [
                'required',
                'string',
            ],  
            'telefono' => [
                  'nullable',
                  'numeric',
            ],  
            'celular' => [
                  'required',
                  'numeric',
            ],  
              'ciudad_id' => [
                  'required',
            ],   
            'email' => [
                  'required',
                  'email',
                 
            ],
            'Pagina_web' => [
                  'nullable',
                  'website',
            ],
           
            'arl_id' => [
                  'required',
            ],

             'caja_id' => [
                  'required',
            ],
            'file' => [
                  'nullable',
                  'image',
                  'mimes:jpeg,png,jpg,gif,svg',
                  'max:2048'
            ],  
        ]; 
    }

    public function create(){
        $this->validate($this->Rules());

         $empresa = Empresa::create([
            't_documento_id' => $this->t_documento_id,
            'nit' => $this->nit,
            'dev' => $this->dev,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'email' => $this->email,
            'ciudad_id' => $this->ciudad_id,
            'caja_id' => $this->caja_id,
            'arl_id' => $this->arl_id,
        ]); 

        LivewireAlert::title('¡Empresa Creada!')
                    ->success()
                    ->show();

        $this->closeModal();
    

    /*     if ($this->file) {
            $filePath = $this->file->store('public/logos');
            $Empresa->logo_path = str_replace('public/', 'storage/', $filePath);
        }

        $Empresa->save(); */

       $this->closeModal();
    }

    public function mount()
    {
        $this->TDocumentos = TDocumento::all();
        $this->Ciudades = Ciudade::all();
        $this->Cajas = Caja::all();
        $this->Arls = Arl::all();
    }

    public function render()
    {
        return view('livewire.empresa.create-empresa');
    }
}
