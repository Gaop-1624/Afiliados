<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePlanillas extends Model
{
     protected $table = 'detalle_planillas';

    protected $fillable = [
            'planilla_id',
            'afiliado_id',
    ];

    //Relacion uno a muchos con la tabla afiliado
    public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'afiliado_id', 'id');
    }

    //Relacion uno a muchos con la tabla planillas
    public function planilla(){
        return $this->belongsTo(Planillas::class, 'planilla_id', 'id');
    }
}
