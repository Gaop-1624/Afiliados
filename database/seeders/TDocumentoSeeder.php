<?php

namespace Database\Seeders;

use App\Models\TDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TDocuemnto1 = new TDocumento();
        $TDocuemnto1->nombre = "Cedula de Ciudania";
        $TDocuemnto1->alias = "CC";
        $TDocuemnto1->save();
  
        $TDocuemnto2 = new TDocumento();
        $TDocuemnto2->nombre = "Cedula de Extranjeria";
        $TDocuemnto2->alias = "Ce";
        $TDocuemnto2->save();

        $TDocuemnto3 = new TDocumento();
        $TDocuemnto3->nombre = "Numero Identificacion Tributaria";
        $TDocuemnto3->alias = "NIT";
        $TDocuemnto3->save();
  
        $TDocuemnto4 = new TDocumento();
        $TDocuemnto4->nombre = "Tarjeta de Identidad";
        $TDocuemnto4->alias = "TI";
        $TDocuemnto4->save();
  
        $TDocuemnto5 = new TDocumento();
        $TDocuemnto5->nombre = "Rejistro Civil";
        $TDocuemnto5->alias = "RC";
        $TDocuemnto5->save();
  
        $TDocuemnto6 = new TDocumento();
        $TDocuemnto6->nombre = "Pasaporte";
        $TDocuemnto6->alias = "PAS";
        $TDocuemnto6->save();
  
        $TDocuemnto7 = new TDocumento();
        $TDocuemnto7->nombre = "Carnet Diplomatico ";
        $TDocuemnto7->alias = "CD";
        $TDocuemnto7->save();
  
        $TDocuemnto8 = new TDocumento();
        $TDocuemnto8->nombre = "Salvoconducto de Permanencia";
        $TDocuemnto8->alias = "SP";
        $TDocuemnto8->save();
  
        $TDocuemnto9 = new TDocumento();
        $TDocuemnto9->nombre = "Permiso de Proteccion Temporal";
        $TDocuemnto9->alias = "PPT";
        $TDocuemnto9->save();
  
        $TDocuemnto10 = new TDocumento();
        $TDocuemnto10->nombre = "Permiso Especial de Permanencia";
        $TDocuemnto10->alias = "PEP";
        $TDocuemnto10->save();
    }
}
