<?php

namespace App\Exports;

use App\Models\Pagos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PagosExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pagos::all();
    }

    public function map($Pagos): array
    {
        return [
            $Pagos->id,
            $Pagos->contrato->afiliado->tdocumentos->alias,
            $Pagos->contrato->afiliado->documento,
            $Pagos->contrato->afiliado->snombre,
            $Pagos->contrato->afiliado->pnombre,
            $Pagos->contrato->afiliado->papellido,
            $Pagos->contrato->afiliado->sapellido,
            $Pagos->periodo,
            $Pagos->codigo,
           // $Pagos->nplanilla,
            $Pagos->fecha_pago,
            $Pagos->total_pagado,

        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tipo',
            'Documento',
            'Nombre', '','','',
            'Periodo',
            'Recibo',
          //  'Numero Planilla',
            'Fecha de Pago',
            'Valor Pagado',
        ];
    }

        public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 5,
            'C' => 15,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
            'I' => 10,
            'J' => 15,
            'K' => 15,
            'L' => 15,
        ];
    }
}
