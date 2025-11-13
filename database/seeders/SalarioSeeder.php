<?php

namespace Database\Seeders;

use App\Models\Salario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $salario = new Salario();
       $salario->salario = '1423500';
       $salario->ano = now()->year;
       $salario->administracion = '40000';
       $salario->save();
    }
}
