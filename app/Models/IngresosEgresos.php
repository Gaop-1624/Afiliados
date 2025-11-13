<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngresosEgresos extends Model
{
    protected $table = 'ingresos_egresos';

    protected $fillable = [
            'fecha_ingreso' ,
            'tipo',
            'detalle' ,
            'entrada',
            'salida',
            'total',
            'empresa_id' ,
            'mes',
            'user_id'
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    } 

}
