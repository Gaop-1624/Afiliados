<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use App\Models\Afp;
use App\Models\Arl;
use App\Models\Ciudade;
use App\Models\contrato;
use App\Models\EmpresaLaboral\EmpresaLaboral;
use App\Models\Ep;
use App\Models\Pagos;
use App\Models\TDocumento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditAfiliado extends Component
{
    public $afiliadoId, $TDocumentos, $Ciudades, $Eps, $Arl, $Afps, $empresal, $tdocumento, $riesgo, $fecha_nac, $sexo, $caja;
    public $pnombre, $snombre, $papellido, $sapellido, $documento, $direccion, $telefono, $celular, $email, $ciudad_id;
    public $eps_id, $afp_id, $empresal_id, $caja_id, $afiliadoid, $salario;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afiliados');
    }

    public function create(){

        $user = Auth::user()->id;

        if($this->caja_id == "true"){
            $caja = 1;
            $ibcCaja = 1423500;
            $cotizacionCaja = Null;
        }else{
            $caja = 3;
            $ibcCaja = 100;
            $cotizacionCaja = 100;
        }
        if($this->riesgo == "0.00522"){
                $claseArl = 1;
        }else{
              if($this->riesgo == "0.01044"){
                    $claseArl = 2;
              }else{
                    if($this->riesgo == "0.02436"){
                        $claseArl = 3;
                    }else{
                        if($this->riesgo == "0.0435"){
                            $claseArl = 4;
                        }else{
                            if($this->riesgo == "0.696"){
                            $claseArl = 5;
                        }
                    }
                } 
            }   
        }

        DB::beginTransaction();

        try {  
        
            $afiliado =  Afiliado::updateOrCreate(
                    ['id' => $this->afiliadoId], 
                    [
                        'tdocumento' => $this->tdocumento,
                        'documento' => $this->documento,
                        'pnombre' => $this->pnombre,
                        'snombre' => $this->snombre,
                        'papellido' => $this->papellido,
                        'sapellido' => $this->sapellido,
                        'fecha_nac' => $this->fecha_nac,
                        'direccion' => $this->direccion, 
                        'telefono' => $this->telefono,
                        'celular' => $this->celular,
                        'ciudad_id' => $this->ciudad_id,
                        'email' => $this->email,
                        'sexo' => $this->sexo,
                        'user_id' => $user,
                        'empresalaboral_id' => $this->empresal_id,
                  ]);

                
                                  
                   contrato::updateOrCreate(
                    ['afiliado_id' => $afiliado->id],
                    [
                     //   'fecha_ingreso' => $afiliado->contratos->fecha_ingreso,
                       'empresa_id' => $afiliado->contratos->empresa_id,
                      //   'afiliado_id' => $afiliado->id,
                       /*  'novedad' => $afiliado->contratos->novedad,
                        'periodo' => $afiliado->contratos->periodo, */
                        'eps_id' => $this->eps_id,
                        'afp_id' => $this->afp_id,
                        'salario' => $this->salario,
                        'caja_id' => $caja,
                       // 'status' => $afiliado->contratos->status,
                        'salario' => $this->salario,
                        'riesgo' => $this->riesgo,
                        'claseArl' => $claseArl,
                    ]);

                       
                    LivewireAlert::title('¡Afiliado Actualizado!')
                    ->success()
                    ->show();

                    $this->closeModal();

         } catch (\Throwable $th) {
                    DB::rollBack();
                    LivewireAlert::title('¡Error al Actualizar al Afiliado!')
                        ->error()
                        ->timer(3000)
                        ->show();
        }  
           
        DB::commit();        
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
        $afiliado = Afiliado::with('contratos')->find($this->afiliadoId);
      // dd($afiliado);

        return view('livewire.afiliados.edit-afiliado', [
            $this->tdocumento = $afiliado->tdocumento,
            $this->pnombre = $afiliado->pnombre,
            $this->snombre = $afiliado->snombre,
            $this->papellido = $afiliado->papellido,
            $this->sapellido = $afiliado->sapellido,
            $this->documento = $afiliado->documento,
            $this->direccion = $afiliado->direccion,
            $this->telefono = $afiliado->telefono,
            $this->celular = $afiliado->celular,
            $this->email = $afiliado->email,
            $this->ciudad_id = $afiliado->ciudad_id,
            $this->riesgo = $afiliado->contratos->last()->riesgo,
            $this->fecha_nac = $afiliado->fecha_nac,
            $this->sexo = $afiliado->sexo,
            $this->caja = $afiliado->contratos->last()->caja_id,
            $this->salario = $afiliado->contratos->last()->salario,
            $this->empresal_id = $afiliado->empresalaboral_id,
            $this->eps_id = $afiliado->contratos->last()->eps->id,
            $this->afp_id = $afiliado->contratos->last()->afp->id,  
           
        ]);
    }
}
