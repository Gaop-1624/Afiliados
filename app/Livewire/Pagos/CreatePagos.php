<?php

namespace App\Livewire\Pagos;

use App\Models\Afiliado;
use App\Models\IngresosEgresos;
use App\Models\Pagos;
use App\Models\Salario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

class CreatePagos extends Component
{
    public $search, $pnombre, $snombre, $papellido, $sapellido, $salario, $ValorEps, $ValorAfp, $ValorRiesgo, $ValorCaja, $ValorAdm, $total;
    public $eps_id, $afp_id, $riesgo, $caja_id, $nombreCompleto, $subTotal, $adm, $id, $dias;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Pagos.Pagos');
    }

    public function limpiarModal(){
        $this->resetValidation();
        $this->reset(['search','pnombre','snombre','papellido','sapellido','salario','eps_id','afp_id','riesgo','caja_id', 'nombreCompleto', 'subTotal', 'adm', 'total', 'dias']);
    }

    public function ScanningId(){

        $afiliado = Afiliado::where('documento', $this->search)->first();
        $salario = Salario::latest()->first()->salario; 

        if($afiliado){

            if ($afiliado->contratos->last()->status == 3) {
                $diascontrato =$afiliado->contratos->last()->pagos[0]->dias;
                $ibc = ($salario / 30) * $diascontrato;
            } else {
                $ibc = ($salario / 30) * 30;
                $diascontrato = 30;
            }

      // dd($diascontrato);
            $this->nombreCompleto =  $afiliado->pnombre . ' ' . $afiliado->snombre . ' ' . $afiliado->papellido . ' ' . $afiliado->sapellido;
            $this->eps_id = $afiliado->contratos->last()->eps->nombre;
            $this->salario = $ibc;
            $this->dias = $diascontrato;
            $this->afp_id = $afiliado->contratos->last()->afp->nombre;
            $this->riesgo = $afiliado->contratos->last()->claseArl;
           
            if ($afiliado->contratos->last()->cajas->id == 1) {
                $this->caja_id = $afiliado->contratos->last()->cajas->nombre;
            } else {
                $this->caja_id = 'NINGUNA CAJA';
            }

            $riesgo = $afiliado->contratos->last()->riesgo;
            $afp = $afiliado->contratos->last()->afp->tarifaafp;
            $eps = $afiliado->contratos->last()->eps->tarifaeps;
          //  $caja = $afiliado->contratos->last()->cajas->tarifacaja;
            $caja = $afiliado->contratos->last()->caja_id;
            $ValorEps = $this->salario * $eps;
            $ValorAfp = $this->salario * $afp;
            $ValorRiesgo = $this->salario * $riesgo;

            if ($caja == 3) {
                $ValorCaja = 0;
            } else {
               $ValorCaja = $this->salario * $afiliado->contratos->last()->cajas->tarifacaja;
            }
             
            $ValorAdm = Salario::latest()->first()->administracion;
        
            $total1 = round($ValorEps + $ValorAfp + $ValorRiesgo + $ValorCaja + $ValorAdm);
            $total = round($total1 / 100) * 100;

            $this->subTotal = number_format($ValorEps + $ValorAfp + $ValorRiesgo + $ValorCaja);
            $this->adm = number_format($ValorAdm);
            $this->total = number_format($total);

        }else{
            LivewireAlert::title('¡Afiliado No Encontrado!')
            ->error()
            ->show();
            $this->limpiarModal();
        }
    }

    public function updateSalary(){

            $afiliado = Afiliado::where('documento', $this->search)->first();

            if($afiliado){
                $this->nombreCompleto =  $afiliado->pnombre . ' ' . $afiliado->snombre . ' ' . $afiliado->papellido . ' ' . $afiliado->sapellido;
                $this->eps_id = $afiliado->contratos->last()->eps->nombre;
                $this->dias = 30;
                $this->afp_id = $afiliado->contratos->last()->afp->nombre;
                $this->riesgo = $afiliado->contratos->last()->claseArl;
                if ($afiliado->contratos->last()->cajas->id == 1) {
                    $this->caja_id = $afiliado->contratos->last()->cajas->nombre;
                } else {
                    $this->caja_id = 'NINGUNA CAJA';
                }

                $riesgo = $afiliado->contratos->last()->riesgo;
                $afp = $afiliado->contratos->last()->afp->tarifaafp;
                $eps = $afiliado->contratos->last()->eps->tarifaeps;
                $caja = $afiliado->contratos->last()->cajas->tarifacaja;

                $ValorEps = $this->salario * $eps;
                $ValorAfp = $this->salario * $afp;
                $ValorRiesgo = $this->salario * $riesgo;
                $ValorCaja = $this->salario * $caja;
                $ValorAdm = Salario::latest()->first()->administracion;
                
                $total1 = round($ValorEps + $ValorAfp + $ValorRiesgo + $ValorCaja + $ValorAdm);
                $total = round($total1 / 100) * 100;

                $this->subTotal = number_format($ValorEps + $ValorAfp + $ValorRiesgo + $ValorCaja);
                $this->adm = number_format($ValorAdm);
                $this->total = number_format($total);

                LivewireAlert::title('¡Salario actualizado!')
                ->success()
                ->show();

            }else{
                    LivewireAlert::title('¡Afiliado No Encontrado!')
                    ->error()
                    ->show();
                    $this->limpiarModal();
            }
    }

    public function Rules(){
        return [
                'search' => [
                            'required',
                            'numeric',
                ]
               /*  'salario' => [
                            'min:$salarioAnual',
                            'numeric',
                ] */
        ];
    }

     public function Create(){
        
        $this->validate($this->Rules());
   
        $ncodigo = Pagos::latest()->first();
     
        if ($ncodigo) {
            $codigo = $ncodigo->id + 1;
        } else {
            $codigo = 1;
        }

        $codigo1 = str_pad($codigo, 4, '0', STR_PAD_LEFT);
         
        $afiliadoId = Afiliado::where('documento', $this->search)->get();
        $contratoId = $afiliadoId[0]->contratos->last()->id;
        $periodo = Pagos::where('contrato_id', $contratoId)->latest('created_at')->first();
        $ultimoPeriodo = $periodo->periodo;

        $user = Auth::id();
        $mes = now()->month;
        $ano = now()->year;
        $periodo = $ano."-".$mes;
        
        $fechaIngreso = $afiliadoId[0]->contratos->last()->fecha_ingreso;

        $carbonDate = Carbon::parse($fechaIngreso);
        $mesingreso = $carbonDate->month + 1;

        if ($mesingreso == $mes) {
           $novedad = "ING";
        } else {
           $novedad = null;
        }
        
        $empresaid = $afiliadoId[0]->contratos->last()->empresa_id;

        if ($ultimoPeriodo == $periodo ?? "") {

            LivewireAlert::title('¡El Afiliado Ya Pago Este Periodo!')
            ->error()
            ->show();
            $this->limpiarModal();

        } else {
             DB::beginTransaction();
                try { 
                      
                        $pago = Pagos::create([
                            'codigo' => $codigo1,
                            'total_pagado' => str_replace(',', '', $this->total),
                            'fecha_pago' => now(),
                            'salario' => $this->salario,
                            'contrato_id' => $contratoId,
                            'periodo' => $periodo,
                            'user_id' => $user,
                            'dias' => $this->dias,
                            'nplanilla' => $empresaid,
                            'novedad' => $novedad
                        ]); 

                        $contrato = $afiliadoId[0]->contratos->last()->update([
                            'status' => '1',
                        ]);


                        $user = User::find(Auth::user()->id);
                        $empresa = $user->empresa_id;
                        $IngresosEgresos = IngresosEgresos::latest()->first();
                        $valortotal = $IngresosEgresos->total ?? 0;
                        $valortotal = $IngresosEgresos ? $IngresosEgresos->total : 0;
                        
                        $salario = Salario::latest()->first();
                      
                        $total = $valortotal + str_replace(',', '', $this->total);
                        $userall = User::find(Auth::user()->id);
                        
                        $IngresoEgreso = IngresosEgresos::create([
                            'fecha_ingreso' => now(),
                            'mes' => now()->month,
                            'tipo' => 0,
                            'detalle' => "Pago Recibo No: ".$codigo1,
                            'entrada' => str_replace(',', '', $this->total),
                            'salida' => 0,
                            'total' => $total,
                            'empresa_id' => $empresa,
                            'user_id' => $userall->id,
                        ]); 

                       // return redirect()->route('Reports.Pagos.Recibo', ['id' => $pago->id]);

                        LivewireAlert::title('¡Pago Registrado Con Exito!')
                        ->success()
                        ->show();
                        $this->limpiarModal();


                  } catch (\Throwable $th) {
                        DB::rollBack();
                        LivewireAlert::title('¡Error al Hacer el Pago!')
                            ->error()
                            ->timer(3000)
                            ->show();
                }   
                
                DB::commit();   
            }

    }

    public function render()
    {
        return view('livewire.pagos.create-pagos');
    }
}
