<?php

namespace Database\Seeders;

use App\Models\Afp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AfpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $afp1 = new Afp();
        $afp1->t_documento_id  = "3";
        $afp1->nit ="800229739";  
        $afp1->codigo ="230201";
        $afp1->nombre ="PROTECCION";
        $afp1->subtipo ="NINGUNO";
        $afp1->tarifaafp ="0.16";
        $afp1 ->save();

        
        $afp2 = new Afp();
        $afp2->t_documento_id  = "3";
        $afp2->nit ="800224808";  
        $afp2->codigo ="230301";
        $afp2->nombre ="PORVENIR";
        $afp2->subtipo ="NINGUNO";
        $afp2->tarifaafp ="0.16";
        $afp2 ->save();

        
        $afp3 = new Afp();
        $afp3->t_documento_id  = "3";
        $afp3->nit ="800253055";  
        $afp3->codigo ="230901";
        $afp3->nombre ="SKANDIA";
        $afp3->subtipo ="NINGUNO";
        $afp3->tarifaafp ="0.16";
        $afp3 ->save();

        
        $afp4 = new Afp();
        $afp4->t_documento_id  = "3";
        $afp4->nit ="830125132";  
        $afp4->codigo ="230904";
        $afp4->nombre ="SKANDIA ALTERNATIVO";
        $afp4->subtipo ="NINGUNO";
        $afp4->tarifaafp ="0.16";
        $afp4 ->save();

        
        $afp5 = new Afp();
        $afp5->t_documento_id  = "3";
        $afp5->nit ="800227940";  
        $afp5->codigo ="231001";
        $afp5->nombre ="COLFONDOS";
        $afp5->subtipo ="NINGUNO";
        $afp5->tarifaafp ="0.16";
        $afp5 ->save();

        
        $afp6 = new Afp();
        $afp6->t_documento_id  = "3";
        $afp6->nit ="860007379";  
        $afp6->codigo ="25-2";
        $afp6->nombre ="CAXDAC";
        $afp6->subtipo ="NINGUNO";
        $afp6->tarifaafp ="0.16";
        $afp6 ->save();

        
        $afp7 = new Afp();
        $afp7->t_documento_id  = "3";
        $afp7->nit ="899999734";  
        $afp7->codigo ="25-3";
        $afp7->nombre ="FONPRECON";
        $afp7->subtipo ="NINGUNO";
        $afp7->tarifaafp ="0.16";
        $afp7 ->save();

        
        $afp8 = new Afp();
        $afp8->t_documento_id  = "3";
        $afp8->nit ="800216278";  
        $afp8->codigo ="25-7";
        $afp8->nombre ="PENSIONES DE ANTIOQUIA";
        $afp8->subtipo ="NINGUNO";
        $afp8->tarifaafp ="0.16";
        $afp8 ->save();

        
        $afp9 = new Afp();
        $afp9->t_documento_id  = "3";
        $afp9->nit ="900336004";  
        $afp9->codigo ="25-14";
        $afp9->nombre ="COLPENSIONES";
        $afp9->subtipo ="NINGUNO";
        $afp9->tarifaafp ="0.16";
        $afp9 ->save();

        $afp10 = new Afp();
        $afp10->t_documento_id  = "3";
        $afp10->nit ="000000000";  
        $afp10->codigo ="00-00";
        $afp10->nombre ="NO OBLIGADO A COTIZACIÓN A PENSIONES POR EDAD";
        $afp10->subtipo ="2. COTIZANTE NO OBLIGADO A COTIZACIÓN A PENSIONES POR EDAD";
        $afp10->tarifaafp ="0.00";
        $afp10 ->save();

        $afp11 = new Afp();
        $afp11->t_documento_id  = "3";
        $afp11->nit ="000000001";  
        $afp11->codigo ="00-01";
        $afp11->nombre ="PENSIONADO";
        $afp11->subtipo ="1. DEPENDIENTE PENSIONADO ACTIVO";
        $afp11->tarifaafp ="0.00";
        $afp11 ->save();

        $afp12 = new Afp();
        $afp12->t_documento_id  = "3";
        $afp12->nit ="000000002";  
        $afp12->codigo ="00-02";
        $afp12->nombre ="CON REQUISITOS CUMPLIDOS PARA PENSION";
        $afp12->subtipo ="3. DEPENDIENTE CON REQUISITOS CUMPLIDOS PARA PENSION";
        $afp12->tarifaafp ="0.00";
        $afp12 ->save();
    }
}
