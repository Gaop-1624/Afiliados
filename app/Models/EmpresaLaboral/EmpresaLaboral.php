<?php

namespace App\Models\EmpresaLaboral;

use App\Models\Afiliado;
use App\Models\IngresosEgresos;
use Illuminate\Database\Eloquent\Model;

class EmpresaLaboral extends Model
{
   
    protected $table = 'empresa_laborals';

    protected $fillable = [
        'nombre', 'telefono', 'celular', 'direccion', 'email'
    ];

 
   public function afiliados(){
        return $this->hasMany(Afiliado::class, 'empresalaboral_id');
    }

  
}