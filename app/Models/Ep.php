<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ep extends Model
{
    protected $table = 'eps';

    protected $fillable = [
        't_documento_id', 'nit', 'nombre', 'codigo', 'empresa_id', 'tarifaeps'
    ];

    //Relacion uno a uno con la tabla tipo documento
     public function tipodocumento(){
        return $this->hasOne(TDocumento::class);
    }

   /*  public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'eps_id');
    } */

    public function contrato(){
        return $this->hasOne(Contrato::class, 'eps_id', 'id');
    }
}
