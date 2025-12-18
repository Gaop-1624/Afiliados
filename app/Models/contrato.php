<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'afiliado_id', 'status',
        'fecha_ingreso', 'fecha_retiro',
        'periodo', 'claseArl',
        'novedad', 'eps_id',
        'afp_id', 'salario', 'empresa_id',
        'caja_id' , 'riesgo', 'user_id'   
    ];

    //Relacion uno a muchos con la tabla afiliado
     public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'afiliado_id', 'id');
    } 

    //Relacion uno a uno con la tabla Eps
    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id');
    }

    //Relacion uno a uno con la tabla Eps
    public function eps(){
        return $this->belongsTo(Ep::class, 'eps_id', 'id');
    }

    //Relacion uno a uno con la tabla Caja
    public function cajas(){
        return $this->belongsTo(Caja::class, 'caja_id', 'id');
    }

    //Relacion uno a uno con la tabla afp
    public function afp(){
        return $this->belongsTo(Afp::class);
    }

    //Relacion uno a muchos con la tabla pagos
     public function pagos(){
        return $this->hasMany(Pagos::class, 'contrato_id', 'id');
    } 

    //Relacion uno a muchos con la tabla pagos
   /*   public function empresa(){
        return $this->hasMany(Empresa::class, 'id', 'empresa_id');
    }  */

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function arl(){
        return $this->belongsTo(Arl::class, 'arl_id', 'id');
    }



}