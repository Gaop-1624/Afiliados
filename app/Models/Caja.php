<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'cajas';

    protected $fillable = [
        't_documento_id', 'nit', 'nombre', 'codigo', 'empresa_id', 'tarifacaja', 'dpto', 'ciudad'
    ];

   //Relacion uno a uno con la tabla tipo documento
     public function tipodocumento(){
        return $this->hasOne(TDocumento::class);
    }

     public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'caja_id');
    }

    public function contratos(){
        return $this->hasMany(Contrato::class, 'id', 'caja_id');
    }

    //Relacion uno a uno con la tabla empresa 
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    }
}
