<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudade extends Model
{
    public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'ciudad_id');
    }
}
