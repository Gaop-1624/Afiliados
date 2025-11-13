<?php

namespace Database\Seeders;

use App\Models\Arl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arl1 = new Arl();
        $arl1->t_documento_id  = "3";
        $arl1->nit ="860002183";  
        $arl1->codigo ="14-4";
        $arl1->nombre ="A.R.L. Seguros de Vida Colpatria S.A.";
        $arl1 ->save(); 

        
        $arl2 = new Arl();
        $arl2->t_documento_id  = "3";
        $arl2->nit ="860002503";  
        $arl2->codigo ="14-7";
        $arl2->nombre ="Compañía de Seguros Bolívar S.A.";
        $arl2 ->save();

        
        $arl3 = new Arl();
        $arl3->t_documento_id  = "3";
        $arl3->nit ="860022137";  
        $arl3->codigo ="14-8";
        $arl3->nombre ="Seguros de Vida Aurora";
        $arl3 ->save();

        
        $arl4 = new Arl();
        $arl4->t_documento_id  = "3";
        $arl4->nit ="860503617";  
        $arl4->codigo ="14-17";
        $arl4->nombre ="ARP Alfa";
        $arl4 ->save();

        
        $arl5 = new Arl();
        $arl5->t_documento_id  = "3";
        $arl5->nit ="860008645";  
        $arl5->codigo ="14-18";
        $arl5->nombre ="Liberty Seguros de Vida S.A.";
        $arl5 ->save();

        
        $arl6 = new Arl();
        $arl6->t_documento_id  = "3";
        $arl6->nit ="860011153";  
        $arl6->codigo ="14-23";
        $arl6->nombre ="Positiva Compañía de Seguros";
        $arl6 ->save();

        
        $arl7 = new Arl();
        $arl7->t_documento_id  = "3";
        $arl7->nit ="800226175";  
        $arl7->codigo ="14-25";
        $arl7->nombre ="COLMENA";
        $arl7 ->save();

        
        $arl8 = new Arl();
        $arl8->t_documento_id  = "3";
        $arl8->nit ="800256161";  
        $arl8->codigo ="14-28";
        $arl8->nombre ="ARL Sura";
        $arl8 ->save();

        
        $arl9 = new Arl();
        $arl9->t_documento_id  = "3";
        $arl9->nit ="830008686";  
        $arl9->codigo ="14-29";
        $arl9->nombre ="La Equidad Seguros de Vida";
        $arl9 ->save();

        
        $arl10 = new Arl();
        $arl10->t_documento_id  = "3";
        $arl10->nit ="830054904";  
        $arl10->codigo ="14-30";
        $arl10->nombre ="Mapfre Colombia Vida Seguros S.A";
        $arl10 ->save();
    }
}
