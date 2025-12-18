<?php

namespace App\Exports;

use App\Models\Afiliado;
use App\Models\Empresa;
use App\Models\Planillas;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PlanillasSimple implements FromView
//class PlanillasSimple implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    function __construct($id) {
        
            $this->id = $id;
           
    }

    

   public function view(): View
    {
       
       /*  $planillas = Planillas::with([
                'Detalleplanillas.afiliado.empresaLaboral',     // empresa laboral directa
                'Detalleplanillas.afiliado.contratos.empresa'  // empresa via contrato
        ])->where('id', $this->id)->get();


        foreach($planillas as $planilla) {
            foreach($planilla->Detalleplanillas as $detalle)
            {
                $empresNombre = optional($detalle->afiliado->contratos->first()->empresa)->nombre 
                                ?? 'Sin Empresa';
                $empresaNit = optional($detalle->afiliado->contratos->first()->empresa)->nit 
                                ?? 'Sin Nit';
                $empresaDev = optional($detalle->afiliado->contratos->first()->empresa)->dev 
                                ?? 'Sin Dev';
            }
        } */

       // $planillas = Planillas::with('Detalleplanillas')->where('id',  $this->id)->get();
      /*   $contador = 1;
        $empresa = Empresa::all(); */

         $afiliados = Afiliado::with([
            'contratos' => function($q) { $q->latest('created_at')->limit(1); },
            'contratos.empresa.arl'
        ])->get();
//dd($afiliados);
        foreach ($afiliados as $af) {
            $arlNombre = optional($af->contratos->first()->empresa->arl)->nombre ?? 'Sin ARL';
            $empresNombre = optional($af->contratos->first()->empresa)->nombre ?? 'Sin Empresa';
            $empresaNit = optional($af->contratos->first()->empresa)->nit ?? 'Sin Nit';
            $empresaDev = optional($af->contratos->first()->empresa)->dev ?? 'Sin Dev';
            $codigoArl = optional($af->contratos->first()->empresa->arl)->codigo ?? 'Sin Código ARL';
        }
      dd($arlNombre, $empresNombre, $empresaNit, $empresaDev, $codigoArl);
        $planillaConDetalles = Planillas::with('Detalleplanillas')->find($this->id);
        $detalles = $planillaConDetalles->Detalleplanillas;
        
        return view('Planillas.PlanillasPagoSimple', [
            'planillas' => $planillaConDetalles,
            'detalles' => $detalles,
            'arlNombre' => $arlNombre,
            'empresaNombre' => $empresNombre,
            'empresaNit' => $empresaNit,
            'empresaDev' => $empresaDev,
            'codigoArl' => $codigoArl,
        ]);  
    }
}

