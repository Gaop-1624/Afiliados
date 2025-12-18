<?php

namespace App\Exports;

use App\Models\Afiliado;
use App\Models\Planillas;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PlanillasAportes implements FromView
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
        $afiliados = Afiliado::with([
            'contratos' => function($q) { $q->latest('created_at')->limit(1); },
            'contratos.empresa.arl'
        ])->get();

        foreach ($afiliados as $af) {
            $arlNombre = optional($af->contratos->first()->empresa->arl)->nombre ?? 'Sin ARL';
        }
       
        $planillaConDetalles = Planillas::with('Detalleplanillas')->find($this->id);
        $detalles = $planillaConDetalles->Detalleplanillas;
        
        return view('Planillas.PlanillasAportes', [
            'planillas' => $planillaConDetalles,
            'detalles' => $detalles,
            'arlNombre' => $arlNombre
        ]);  
    }
}
