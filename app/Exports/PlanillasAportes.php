<?php

namespace App\Exports;

use App\Models\Planillas;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PlanillasAportes implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   /*  public function collection()
    {
        return DetallePlanillas::all();
    } */
    protected $id;

    function __construct($id) {
        
            $this->id = $id;
           
    }


    public function view(): View
    {
      //  $planillas = Planillas::with('Detalleplanillas')->where('id',  $this->id)->get();
       // dd($planillas);
       // $contador = 1;
       $planillaConDetalles = Planillas::with('Detalleplanillas')->find($this->id);
      // dd($planillaConDetalles);
        $detalles = $planillaConDetalles->Detalleplanillas;
        //dd($detalles);
        return view('Planillas.PlanillasAportes', [
            'planillas' => $planillaConDetalles,
            'detalles' => $detalles
          //  'contador' => $contador
        ]);  
    }

/*     function columnWidths(): array
    {
        return[
            'A' => 4,
            'B' => 4,
            'C' => 14,
            'D' => 14,
            'E' => 15,
            'F' => 14,
            'G' => 15,
            'H' => 14,
            'J' => 16,
            'I' => 14,
            'K' => 60,
            'L' => 16,
            'M' => 4,
            'M' => 20,
            'Q' => 14,
            'AX' => 14,
            'BK' => 14,
            'BV' => 14,
            'CE' => 20,
        ]; 
    
    }*/
}
