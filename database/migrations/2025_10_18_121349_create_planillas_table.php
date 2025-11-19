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
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->string('nplanilla');
            $table->string('periodo_salud');
            $table->string('periodo_pension');
            $table->double('total_pagado');
            $table->integer('status')->default('0');//0 Pagar 1 Pagada
            $table->foreignId('empresa_id')->nullable()->constrained()->on('empresas');
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
