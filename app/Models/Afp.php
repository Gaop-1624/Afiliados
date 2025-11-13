<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    protected $table = 'afps';

    protected $fillable = [
        't_documento_id', 'nit', 'nombre', 'codigo', 'empresa_id'
    ];

    //Relacion uno a uno con la tabla tipo documento
     public function tipodocumento(){
        return $this->hasOne(TDocumento::class);
    }

      public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'afp_id');
    }

    public function contratos(){
        return $this->hasMany(Contrato::class, 'afp_id', 'id');
    }
}
