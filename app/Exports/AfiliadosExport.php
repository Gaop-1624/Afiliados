<?php

namespace App\Exports;

use App\Models\Afiliado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;

class AfiliadosExport implements FromCollection, WithHeadings, WithColumnWidths, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Afiliado::all();
    }

    public function map($Afiliado): array
    {
        return [
            $Afiliado->id,
            $Afiliado->tdocumentos->alias,
            $Afiliado->documento,
            $Afiliado->snombre,
            $Afiliado->pnombre,
            $Afiliado->papellido,
            $Afiliado->sapellido,
            $Afiliado->direccion,
            $Afiliado->ciudad->nombre,
            $Afiliado->telefono,
            $Afiliado->celular,
            $Afiliado->email,
            $Afiliado->fecha_nac,
            $Afiliado->sexo == '2' ? 'Masculino' : 'Femenino',
            $Afiliado->users_id,
            $Afiliado->empresalaboral->nombre,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tipo',
            'Nombre','','','','',
            'Direccion',
            'Ciudad',
            'Telefono',
            'Celular',
            'Correo Electrónico',
            'Fecha de Nacimiento',
            'Sexo',
            'Usuario',
            'Empresa Laboral'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 5,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 20,
            'I' => 30,
            'J' => 15,
            'K' => 15,
            'L' => 30,
            'M' => 15,
            'N' => 15,
            'O' => 30,
            'P' => 30,
        ];
    }
}
