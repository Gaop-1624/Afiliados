<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 'nit', 'direccion', 'telefono', 
        'celular', 'email', 'ciudad_id', 't_documento_id', 
        'Pagina_web', 'dev', 'tenant_id', 'arl_id', 'caja_id'
    ];

    /* public function arl(){
        return $this->hasOne(Arl::class, 'id', 'arl_id');
    }  */

        public function arl(){
            return $this->belongsTo(Arl::class, 'arl_id', 'id');
        }

    
    //Relacion uno a uno con la tabla tipo documento
    public function tdocumentos(){
        return $this->belongsTo(TDocumento::class, 't_documento_id', 'id');
    }

    //Relacion uno a uno con la tabla tipo documento
    public function ciudad(){
        return $this->hasOne(Ciudade::class);
    }

     //Relacion uno a uno con la tabla tipo documento
     public function caja(){
        return $this->hasOne(Caja::class, 'id', 'caja_id');
    }

     //Relacion uno a muchos con el usuario
     public function users(){
        return $this->hasMany(User::class, 'id', 'empresa_id');
    } 

    //Relacion uno a muchos con el contracto
     public function contrato(){
        return $this->hasMany(Contrato::class, 'empresa_id', 'id');
    }

    public function IngresoEgresos(){
        return $this->hasMany(IngresosEgresos::class, 'empresa_id', 'id');
    }

     //Relacion uno a muchos con el usuario
     public function planillas(){
        return $this->hasMany(Planillas::class, 'empresa_id', 'id');
    } 
}
