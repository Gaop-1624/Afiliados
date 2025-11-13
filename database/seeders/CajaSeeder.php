<?php

namespace Database\Seeders;

use App\Models\Caja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caja1 = new Caja();
        $caja1->t_documento_id  = "3";
        $caja1->nit ="890303093";  
        $caja1->codigo ="CCF56";
        $caja1->nombre ="COMFENALCO VALLE";
        $caja1->tarifacaja ="0.04";
        $caja1->dpto ="VALLE";
        $caja1->ciudad ="CALI";
        $caja1 ->save();

        $caja2 = new Caja();
        $caja2->t_documento_id  = "3";
        $caja2->nit ="890303208";  
        $caja2->codigo ="CCF57";
        $caja2->nombre ="COMFANDI";
        $caja2->tarifacaja ="0.04";
        $caja2->dpto ="VALLE";
        $caja2->ciudad ="CALI";
        $caja2 ->save();

        $caja3 = new Caja();
        $caja3->t_documento_id  = "3";
        $caja3->nit ="000000000";  
        $caja3->codigo ="CCF69";
        $caja3->nombre ="COMCAJA";
        $caja3->tarifacaja ="0.04";
        $caja3->dpto ="VICHADA";
        $caja3->ciudad ="LA PRIMAVERA";
        $caja3->save();
    }
}
