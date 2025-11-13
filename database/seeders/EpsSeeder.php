<?php

namespace Database\Seeders;

use App\Models\Ep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eps3 = new Ep();
        $eps3->t_documento_id  = "3";
        $eps3->nit =  "830113831-0";
        $eps3->codigo = "EPS001";
        $eps3->nombre = "ALIANSALUD EPS (ANTES COLMEDICA)";
        $eps3->tarifaeps = "0.04";
        $eps3 ->save();
    
        $eps4 = new Ep();
        $eps4->t_documento_id  = "3";
        $eps4->nit =  "800130907-4";
        $eps4->codigo = "EPS002";
        $eps4->nombre = "SALUD TOTAL";
        $eps4->tarifaeps = "0.04";
        $eps4 ->save();

        $eps5 = new Ep();
        $eps5->t_documento_id  = "3";
        $eps5->nit =  "800140949-6";
        $eps5->codigo = "EPS003";
        $eps5->nombre = "CAPITAL SALUD";
        $eps5->tarifaeps = "0.04";
        $eps5 ->save();

        $eps6 = new Ep();
        $eps6->t_documento_id  = "3";
        $eps6->nit =  "800251440-6";
        $eps6->codigo = "EPS005";
        $eps6->nombre = "SANITAS";
        $eps6->tarifaeps = "0.04";
        $eps6 ->save();
    
        $eps7 = new Ep();
        $eps7->t_documento_id  = "3";
        $eps7->nit =  "860066942-7";
        $eps7->codigo = "EPS008";
        $eps7->nombre = "COMPENSAR";
        $eps7->tarifaeps = "0.04";
        $eps7 ->save();
       
        $eps8 = new Ep();
        $eps8->t_documento_id  = "3";
        $eps8->nit =  "800088702-2";
        $eps8->codigo = "EPS010";
        $eps8->nombre = "EPS SURA (ANTES SUSALUD)";
        $eps8->tarifaeps = "0.04";
        $eps8 ->save();

        $eps9 = new Ep();
        $eps9->t_documento_id  = "3";
        $eps9->nit =  "890303093-5";
        $eps9->codigo = "EPS012";
        $eps9->nombre = "COMFENALCO VALLE";
        $eps9->tarifaeps = "0.04";
        $eps9 ->save();
        
        $eps10 = new Ep();
        $eps10->t_documento_id  = "3";
        $eps10->nit =  "805000427-1";
        $eps10->codigo = "EPS016";
        $eps10->nombre = "COOMEVA";
        $eps10->tarifaeps = "0.04";
        $eps10 ->save();
       
        $eps11 = new Ep();
        $eps11->t_documento_id  = "3";
        $eps11->nit =  "830003564-7";
        $eps11->codigo = "EPS017";
        $eps11->nombre = "FAMISANAR";
        $eps11->tarifaeps = "0.04";
        $eps11 ->save();
      
        $eps12= new Ep();
        $eps12->t_documento_id  = "3";
        $eps12->nit =  "805001157-2";
        $eps12->codigo = "EPS018";
        $eps12->nombre = "S.O.S. SERVICIO OCCIDENTAL DE SALUD S.A.";
        $eps12->tarifaeps = "0.04";
        $eps12 ->save();
      
        $eps13 = new Ep();
        $eps13->t_documento_id  = "3";
        $eps13->nit =  "830009783-0";
        $eps13->codigo = "EPS023";
        $eps13->nombre = "CRUZ BLANCA";
        $eps13->tarifaeps = "0.04";
        $eps13 ->save();
        
        $eps14 = new Ep();
        $eps14->t_documento_id  = "3";
        $eps14->nit =  "830074184-5";
        $eps14->codigo = "EPS033";
        $eps14->nombre = "Saludvida S.A EPS";
        $eps14->tarifaeps = "0.04";
        $eps14 ->save();
       
        $eps15 = new Ep();
        $eps15->t_documento_id  = "3";
        $eps15->nit =  "900156264-2";
        $eps15->codigo = "EPS037";
        $eps15->nombre = "NUEVA E.P.S.";
        $eps15->tarifaeps = "0.04";
        $eps15 ->save();
        
        $eps16 = new Ep();
        $eps16->t_documento_id  = "3";
        $eps16->nit =  "8001409496";
        $eps16->codigo = "EPSC03";
        $eps16->nombre = "Cafesalud Entidad  Promotora de Salud S.A";
        $eps16->tarifaeps = "0.04";
        $eps16 ->save();

        
        $eps17 = new Ep();
        $eps17->t_documento_id  = "3";
        $eps17->nit =  "899999107";
        $eps17->codigo = "EPSC22";
        $eps17->nombre = "CONVIDA";
        $eps17->tarifaeps = "0.04";
        $eps17->save();

        
        $eps18 = new Ep();
        $eps18->t_documento_id  = "3";
        $eps18->nit =  "891856000";
        $eps18->codigo = "EPSC25";
        $eps18->nombre = "CAPRESOCA";
        $eps18->tarifaeps = "0.04";
        $eps18 ->save();

        
        $eps19 = new Ep();
        $eps19->t_documento_id  = "3";
        $eps19->nit =  "900298372";
        $eps19->codigo = "EPSC34";
        $eps19->nombre = "CAPITAL SALUD";
        $eps19->tarifaeps = "0.04";
        $eps19 ->save();

        
        $eps20 = new Ep();
        $eps20->t_documento_id  = "3";
        $eps20->nit =  "824001398";
        $eps20->codigo = "EPSIC1";
        $eps20->nombre = "DUSAKAWI";
        $eps20->tarifaeps = "0.04";
        $eps20->save();

        
        $eps21 = new Ep();
        $eps21->t_documento_id  = "3";
        $eps21->nit =  "812002376";
        $eps21->codigo = "EPSIC2";
        $eps21->nombre = "ACIS";
        $eps21->tarifaeps = "0.04";
        $eps21->save();

        
        $eps22 = new Ep();
        $eps22->t_documento_id  = "3";
        $eps22->nit =  "817001773";
        $eps22->codigo = "EPSIC3";
        $eps22->nombre = "A.I.C.";
        $eps22->tarifaeps = "0.04";
        $eps22->save();

        
        $eps23 = new Ep();
        $eps23->t_documento_id  = "3";
        $eps23->nit =  "839000495";
        $eps23->codigo = "EPSIC4";
        $eps23->nombre = "Entidad Promotora de Salud Anas Wayuu EPSI";
        $eps23->tarifaeps = "0.04";
        $eps23->save();

        
        $eps24 = new Ep();
        $eps24->t_documento_id  = "3";
        $eps24->nit =  "837000084";
        $eps24->codigo = "EPSIC5";
        $eps24->nombre = "MALLAMAS";
        $eps24->tarifaeps = "0.04";
        $eps24->save();

        
        $eps25 = new Ep();
        $eps25->t_documento_id  = "3";
        $eps25->nit =  "809008362";
        $eps25->codigo = "EPSIC6";
        $eps25->nombre = "PIJAOSALUD";
        $eps25->tarifaeps = "0.04";
        $eps25 ->save();
        
        $eps26 = new Ep();
        $eps26->t_documento_id  = "3";
        $eps26->nit =  "900604350";
        $eps26->codigo = "EPS040";
        $eps26->nombre = "SAVIA SALUD";
        $eps26->tarifaeps = "0.04";
        $eps26->save();

    }
}
