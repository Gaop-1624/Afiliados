<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Empresa = new Empresa();
        $Empresa->nit = "901923262";
        $Empresa->dev = "2";
        $Empresa->nombre = "INTEGRALES GROUP JG SAS";
        $Empresa->direccion = "MZ 7 CS 11B CR 17 D 21 23";
        $Empresa->telefono = "3217180279";
        $Empresa->celular = "3228466724";
        $Empresa->email = "integralesgroupjgsas@gmail.com";
        $Empresa->ciudad_id = "1037";
        $Empresa->t_documento_id  = "3";
        $Empresa->Pagina_web  = "www.integralesgroupjgsas.com";
        $Empresa->arl_id  = "7";
        $Empresa->caja_id  = "1";
        $Empresa->save();

        
        $Empresa1 = new Empresa();
        $Empresa1->nit = "901413398";
        $Empresa1->dev = "7";
        $Empresa1->nombre = 'INGENIERIA GA&DA SAS';
        $Empresa1->celular = '3127899689';
        $Empresa1->direccion = 'CLL 11 N 1-03';
        $Empresa1->telefono = "3217180279";
        $Empresa1->email = 'ingenieriagaydasas@gmail.com';
        $Empresa1->ciudad_id = "1037";
        $Empresa1->t_documento_id  = "3";
        $Empresa1->Pagina_web  = "www.ingenieriagaydasas.com";
        $Empresa1->arl_id  = "6";
        $Empresa1->caja_id  = "1";
        $Empresa1->save();

        $Empresa2 = new Empresa();
        $Empresa2->nit = "901213214";
        $Empresa2->dev = "2";
        $Empresa2->nombre = 'DYG DISTRIBUIDORA SAS';
        $Empresa2->celular = '3127899689';
        $Empresa2->direccion = 'CLL 11 N 1-03';
        $Empresa2->telefono = "3217180279";
        $Empresa2->email = 'dygdistribuidora@gmail.com';
        $Empresa2->ciudad_id = "1037";
        $Empresa2->t_documento_id  = "3";
        $Empresa2->Pagina_web  = "www.dygdistribuidora.com";
        $Empresa2->arl_id  = "1";
        $Empresa2->caja_id  = "1";
        $Empresa2->save();

        $Empresa3 = new Empresa();
        $Empresa3->nit = "900908186";
        $Empresa3->dev = "4";
        $Empresa3->nombre = 'DISEÑO Y PLANEACION PAP SAS';
        $Empresa3->celular = '3127899689';
        $Empresa3->direccion = 'CLL 11 N 1-03';
        $Empresa3->telefono = "3217180279";
        $Empresa3->email = 'disenoyplaneacionpapsas@gmail.com';
        $Empresa3->ciudad_id = "1037";
        $Empresa3->t_documento_id  = "3";
        $Empresa3->Pagina_web  = "www.'disenoyplaneacionpapsas.com";
        $Empresa3->arl_id  = "1";
        $Empresa3->caja_id  = "1";
        $Empresa3->save();

        $Empresa4 = new Empresa();
        $Empresa4->nit = "90695792";
        $Empresa4->dev = "2";
        $Empresa4->nombre = 'DISEÑO Y ARQUITECTURAS AYG SAS';
        $Empresa4->celular = '3127899689';
        $Empresa4->direccion = 'CLL 11 N 1-03';
        $Empresa4->telefono = "3217180279";
        $Empresa4->email = 'disenoyarquitecturasyagsas@gmail.com';
        $Empresa4->ciudad_id = "1037";
        $Empresa4->t_documento_id  = "3";
        $Empresa4->Pagina_web  = "www.disenoyarquitecturasyagsas.com";
        $Empresa4->arl_id  = "1";
        $Empresa4->caja_id  = "1";
        $Empresa4->save();
    }
}
