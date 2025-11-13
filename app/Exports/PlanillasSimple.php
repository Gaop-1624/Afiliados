<?php

namespace App\Exports;

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
        $planillas = Planillas::with('Detalleplanillas')->where('id',  $this->id)->get();
        $contador = 1;
        $empresa = Empresa::all();
        //dd($empresa);
        return view('Planillas.PlanillasPagoSimple', [
            'planillas' => $planillas,
            //'contador' => $contador,
            'empresa' => $empresa
        ]);  
    }
}
