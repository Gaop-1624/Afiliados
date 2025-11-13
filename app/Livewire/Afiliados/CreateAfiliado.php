<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use App\Models\Afp;
use App\Models\Arl;
use App\Models\Ciudade;
use App\Models\contrato;
use App\Models\Empresa;
use App\Models\EmpresaLaboral\EmpresaLaboral;
use App\Models\Ep;
use App\Models\IngresosEgresos;
use App\Models\Pagos;
use App\Models\Salario;
use App\Models\TDocumento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateAfiliado extends Component
{
    public $tdocumento, $documento, $pnombre, $snombre, $papellido, $sapellido, $email, $telefono, $direccion;
    public $TDocumentos, $Ciudades, $ciudad_id, $celular, $fecha_nac, $genero, $Eps, $Arl, $Afps, $caja_id;
    public $eps_id, $arl_id, $afp_id, $riesgo, $empresal, $empresal_id, $salario, $VAfiliacion, $afiliadoid;
    public $sexo, $claseArl, $empresa_id, $empresaA, $empresaA_id;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afiliados');
    }

    public function Rules(){
        return [
            'tdocumento' => [
                'required',
                'string',
            ],
            'pnombre' => [
                'required',
                'string',
            ],
            'snombre' => [
                'nullable',
                'string',
            ],
            'papellido' => [
                'required',
                'string',
            ],  
            'sapellido' => [
                'nullable',
                'string',
            ],  
            'documento' => [
                  'required',
                  'numeric',
                  'unique:afiliados,documento,'.$this->afiliadoid
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
            'eps_id' => [
                  'required',
            ],
           
            'afp_id' => [
                  'required',
            ],

            'fecha_nac' => [
                  'required',
            ],
            
            'riesgo' => [
                  'required',
            ], 
            
            'empresal_id' => [
                  'required',
            ], 
            'salario' => [
                  'required',
                  'numeric'
            ], 
            'VAfiliacion' => [
                  'required',
                  'numeric'
            ], 
        ];
    }

    public function create(){
        $this->validate($this->Rules());
        
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
                            if($this->riesgo == "0.0696"){
                            $claseArl = 5;
                        }
                    }
                } 
            }   
        }

        DB::beginTransaction();
        try {   
            $afiliado =  Afiliado::updateOrCreate(
                    ['id' => $this->afiliadoid], 
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

                    $userall = User::find(Auth::user()->id);
                    $mes = now()->month;
                    $ano = now()->year;
                    $perido = $ano."-".$mes;
                    $fecha = now();
                    $dia = $fecha->day;
                    $ultimodia = 31;
                    $dias = $ultimodia - $dia;
                    //$dias = $fecha->addDays(1)->format('d');
//dd($user);
                    $contrato = contrato::create([
                        'fecha_ingreso' => $fecha,
                        'afiliado_id' => $afiliado->id,
                        'periodo' => $perido,
                        'eps_id' => $this->eps_id,
                        'afp_id' => $this->afp_id,
                        'caja_id' => $caja,
                        'status' => 3,
                        'riesgo' => $this->riesgo,
                        'claseArl' => $claseArl,
                        'salario' => $this->salario,
                        'empresa_id' => $this->empresaA_id,
                        'user_id' => $userall->id,
                    ]);

                    $ncodigo = Pagos::latest()->first();

                    if($ncodigo){
                        $codigo = $ncodigo->codigo + 1;
                    }else{
                        $codigo = 1;
                    } 

                    $codigo1 = str_pad($codigo, 4, '0', STR_PAD_LEFT);
                    $user = Auth::id();
                    
                    $pago = Pagos::create([
                        'codigo' => $codigo1,
                        'total_pagado' => $this->VAfiliacion,
                        'fecha_pago' => now(),
                        'periodo' => $perido,
                        'user_id' => $user,
                        'novedad' => 'Todos los sistemas (ARL, AFP, CCF, EPS)',
                        'dias' => $dias,
                        'contrato_id' => $contrato->id,
                        'salario' => $this->salario,
                        'nplanilla' => 'Afiliación'
                    ]); 

                    $user = User::find(Auth::user()->id);
                    $empresa = $user->empresa_id;
                    $IngresosEgresos = IngresosEgresos::latest()->first();
                    $valortotal = $IngresosEgresos->total ?? 0;
                    $valortotal = $IngresosEgresos ? $IngresosEgresos->total : 0;
                   
                    $total = $valortotal + $this->VAfiliacion;

                    $IngresoEgreso = IngresosEgresos::create([
                         'fecha_ingreso' => now(),
                         'mes' => now()->month,
                         'tipo' => 0,
                         'detalle' => "Nueva Afiliacion",
                         'entrada' => $this->VAfiliacion,
                         'salida' => 0,
                         'total' => $total,
                         'empresa_id' => $empresa,
                         'user_id' => $userall->id,
                    ]);

                    LivewireAlert::title('¡Afiliado Creado!')
                    ->success()
                    ->show();

                    $this->closeModal();

              } catch (\Throwable $th) {
                    DB::rollBack();
                    LivewireAlert::title('¡Error al Crear al Afiliado!')
                        ->error()
                        ->timer(3000)
                        ->show();
        }   
           
        DB::commit();      
    } 

    public function mount()
    {
        $this->TDocumentos = TDocumento::all();
        $this->Ciudades = Ciudade::all();
        $this->Eps = Ep::all();
        $this->Arl = Arl::all();
        $this->Afps = Afp::all();
        $this->empresal = EmpresaLaboral::all();
        $this->empresaA = Empresa::all();
    }

    public function render()
    {
        return view('livewire.afiliados.create-afiliado');
    }
}
