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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->double('total_pagado', 10, 2);
            $table->date('fecha_pago');
            $table->string('periodo');
            $table->double('salario', 10, 2);
            $table->string('nplanilla')->nullable();
            $table->string('novedad')->nullable();
            $table->string('dias');
           /*  $table->string('diasAFP');
            $table->double('IbcAFP', 10, 2);
            $table->double('IbcCCF', 10, 2); */
            $table->foreignId('contrato_id')->constrained()->on('contratos')->nullable();
           /*  $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable(); */
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
