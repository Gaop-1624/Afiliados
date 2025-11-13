<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{

    protected $table = 'arls';

    protected $fillable = [
        't_documento_id', 'nit', 'nombre', 'codigo', 'empresa_id'
    ];

//    public function afiliados(){
//         return $this->hasMany(Afiliado::class, 'id', 'caja_id');
//     }

    //Relacion uno a uno con la tabla empresa 
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    }

    //Relacion uno a uno con la tabla tipo documento
     public function tipodocumento(){
        return $this->hasOne(TDocumento::class);
    }

    public function contratos(){
        return $this->hasMany(Contrato::class, 'arl_id', 'id');
    }
}
