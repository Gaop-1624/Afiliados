<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TDocumento extends Model
{
   //Relacion uno a uno con la tabla empresa 
    public function empresa(){
        return $this->hasMany(Empresa::class);
    }

    //Relacion uno a uno con la tabla empresa 
    public function arl(){
        return $this->belongsTo(Arl::class);
    }

    //Relacion uno a uno con la tabla empresa 
    public function afp(){
        return $this->belongsTo(Afp::class);
    }

    //Relacion uno a uno con la tabla empresa 
    public function eps(){
        return $this->belongsTo(Ep::class);
    }

    //Relacion uno a uno con la tabla empresa 
    public function caja(){
        return $this->belongsTo(Caja::class);
    }

    public function afiliado(){
        return $this->hasMany(Afiliado::class, 'afiliado_id');
    }
}
