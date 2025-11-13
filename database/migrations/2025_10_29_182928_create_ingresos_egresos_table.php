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
        Schema::create('ingresos_egresos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->string('mes');
            $table->integer('tipo')->default('0');//0 Ingreso 1 Gasto
            $table->string('detalle');
            $table->double('entrada', 10, 2)->nullable();
            $table->double('salida', 10, 2)->nullable();
            $table->double('total', 10, 2);
            $table->foreignId('empresa_id')->nullable()->on('empresas');
            $table->foreignId('user_id')->constrained()->on('users')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos_egresos');
    }
};
