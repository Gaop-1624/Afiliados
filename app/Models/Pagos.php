<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
            'codigo',
            'afiliado_id',
            'total_pagado',
            'fecha_pago',
            'user_id',
            'periodo',
            'contrato_id',
            'novedad',
            'salario',
            'dias',
            'nplanilla'
    ];

    //Relacion uno a muchos con la tabla contrato
    public function contrato(){
        return $this->belongsTo(Contrato::class, 'contrato_id', 'id');
    } 

    //Relacion muchos a muchos con la tabla afiliado
   /*  public function planillas(){
        return $this->belongsToMany(Planillas::class, 'pagos_planilla', 'planilla_id', 'pago_id');
    } */

     public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'afiliado_id', 'id');
    }
}
