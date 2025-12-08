<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_retiro')->nullable();
            $table->integer('status')->default(1);//1 Activo 2 Retirado 3 Ingreso
            $table->foreignId('eps_id')->constrained()->on('eps')->nullable();
            $table->foreignId('afp_id')->constrained()->on('afps')->nullable();
            $table->double('salario', 10, 2);
            $table->foreignId('caja_id')->constrained()->on('cajas')->nullable();
            $table->integer('periodo');
            $table->double('riesgo', 10);
            $table->string('claseArl');
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
            $table->foreignId('empresa_id')->constrained()->on('empresas')->nullable();

             // $table->foreignId('salario_id')->constrained()->on('salarios')->nullable();
            // $table->foreignId('empresa_id')->nullable()->on('empresas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
