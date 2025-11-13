<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'salarios';

    protected $fillable = [
            'salario',
            'ano',
            'administracion'
    ];
}
