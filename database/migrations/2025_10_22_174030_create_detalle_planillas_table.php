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
        Schema::create('detalle_planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planilla_id')->constrained()->on('planillas')->nullable();
            $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable();
            $table->double('salario', 10, 2)->nullable();
            $table->double('pago_id')->nullable();
            $table->double('total_pagado', 10, 2)->nullable();
           // $table->string('dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_planillas');
    }
};
