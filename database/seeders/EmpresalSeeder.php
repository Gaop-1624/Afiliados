<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\EmpresaLaboral\EmpresaLaboral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Empresal = new EmpresaLaboral();
        $Empresal->nombre = 'INTEGRALES GROUP JG SAS';
        $Empresal->contacto = 'JAMILETH BEDOYA RIOS';
        $Empresal->celular = '3217180279';
        $Empresal->direccion = 'MZ 7 CS 11B CR 17 D 21 23';
        $Empresal->email = 'integralesgroupjgsas@gmail.com';
        $Empresal->save();

        $Empresal1 = new EmpresaLaboral();
        $Empresal1->nombre = 'INGENIERIA GA&DA';
        $Empresal1->contacto = 'GERMAN ALBERTO ORTIZ';
        $Empresal1->celular = '3127899689';
        $Empresal1->direccion = 'CLL 11 N 1-03';
        $Empresal1->email = 'ingenieriagaydasas@gmail.com';
        $Empresal1->save();

        $Empresal2 = new EmpresaLaboral();
        $Empresal2->nombre = 'DYG DISTRIBUIDORA';
        $Empresal2->contacto = 'DAVID ALFREDO TORREZ';
        $Empresal2->celular = '3127899689';
        $Empresal2->direccion = 'CLL 11 N 1-03';
        $Empresal2->email = 'dygdistribuidora@gmail.com';
        $Empresal->save();

        $Empresal3 = new EmpresaLaboral();
        $Empresal3->nombre = 'DISEÑO Y PLANEACION PAP SAS';
        $Empresal3->contacto = 'PAOLA ANDREA PERLAZA';
        $Empresal3->celular = '3127899689';
        $Empresal3->direccion = 'CLL 11 N 1-03';
        $Empresal3->email = 'disenoyplaneacionpapsas@gmail.com';
        $Empresal3->save();

        $Empresal4 = new EmpresaLaboral();
        $Empresal4->nombre = 'DISEÑO Y ARQUITECTURAS A Y G S.A.S';
        $Empresal4->contacto = 'PAOLA ANDREA PERLAZA';
        $Empresal4->celular = '3127899689';
        $Empresal4->direccion = 'CLL 11 N 1-03';
        $Empresal4->email = 'disenoyarquitecturasyagsas@gmail.com';
        $Empresal4->save();
    }
}
