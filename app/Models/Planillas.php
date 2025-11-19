<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
    protected $table = 'planillas';

    protected $fillable = [
            'nplanilla',
            'total_pagado',
            'periodo_salud',
            'periodo_pension',
            'status',
            'empresa_id',
            'user_id'
    ];

    //Relacion muchos a muchos con la tabla afiliado
   /*  public function afiliados(){
        return $this->belongsToMany(Afiliado::class, 'afiliado_planilla', 'afiliados_id', 'planillas_id');
    } */

     //Relacion uno a muchos con el detalle_planillas
     public function Detalleplanillas(){
        return $this->hasMany(DetallePlanillas::class, 'planilla_id', 'id');
    }  

     //Relacion uno a muchos con el afiliado
    public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'id', 'afiliado_id');
    }
    
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    } 
}
