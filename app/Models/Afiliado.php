<?php

namespace App\Models;

use App\Models\EmpresaLaboral\EmpresaLaboral;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';

    protected $fillable = [
        'tdocumento', 'documento', 'pnombre', 'snombre', 'papellido', 'sapellido', 'sexo', 'user_id',  
        'fecha_nac', 'direccion', 'telefono', 'email', 'empresalaboral_id', 'celular', 'ciudad_id',
    ];

    //Relacion uno a uno con la tabla tipo documento
    public function tdocumentos(){
        return $this->belongsTo(TDocumento::class, 'tdocumento', 'id');
    }

    //Relacion uno a uno con la tabla caja
     public function ciudad(){
        return $this->belongsTo(Ciudade::class);
    }

     //Relacion uno a muchos con el usuario
    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    } 

     //Relacion uno a uno con la tabla tipo documento
   /*   public function empresalaboral(){
        return $this->belongsTo(EmpresaLaboral::class);
    } */

    //Relacion uno a muchos con el contracto
    public function contratos(){
        return $this->hasMany(Contrato::class, 'afiliado_id', 'id');
    }

    // Devuelve el contrato más reciente (o null)
    public function contratoActual()
    {
        return $this->contratos()->latest('created_at')->first();
    }

    // Devuelve la empresa asociada (prioriza empresaLaboral, si no existe usa la empresa del contrato actual)
        public function empresaAsignada()
        {
            if ($this->empresaLaboral) {
                return $this->empresaLaboral;
            }

            $contrato = $this->contratoActual();
            return $contrato ? $contrato->empresa : null;
        }

        // Accesor para usar en Blade: $afiliado->empresa_nombre
        public function getEmpresaNombreAttribute()
        {
            return optional($this->empresaAsignada())->nombre;
        }

       //Relacion uno a uno con la tabla Caja
   /*  public function cajas(){
        return $this->belongsTo(Caja::class, 'caja_id', 'id');
    } */

      //Relacion muchos a muchos con la tabla planillas
/*     public function planillas(){
        return $this->belongsToMany(Planillas::class, 'afiliado_planilla', 'planillas_id', 'afiliados_id');
    }
 */
     //Relacion uno a muchos con el detalle_planillas
     public function Detalleplanillas(){
        return $this->hasMany(DetallePlanillas::class, 'afiliado_id', 'id');
    } 
    
     public function pagos(){
        return $this->hasMany(Pagos::class);
    } 

    //Relacion uno a muchos con el prestamo
     public function planillas(){
        return $this->hasMany(planillas::class, 'afiliado_id', 'id');
    } 
    
    public function empresaLaboral()
{
    return $this->belongsTo(\App\Models\Empresa::class, 'empresalaboral_id', 'id');
}


   //Relacion uno a muchos con el 
   /*  public function pagos(){
        return $this->hasMany(Pagos::class, 'afiliado_id');
    } */
/*
    //Relacion uno a uno con la tabla salario
    public function salario(){
        return $this->belongsTo(Salario::class, 'id');
    }

  //Relacion uno a muchos con el prestamo
     public function planillas(){
        return $this->hasMany(Planilla::class, 'afiliado_id', 'id');
    }  
    //Relacion uno a muchos con el prestamo
     public function afiliadoplanillas(){
        return $this->hasMany(Planilla::class, 'afiliado_id', 'id');
    }  

     //Relacion uno a muchos con el prestamo
     public function Detalleplanillas(){
        return $this->hasMany(DetallePlanilla::class, 'id', 'afiliado_id');
    }  
*/
 

} 
