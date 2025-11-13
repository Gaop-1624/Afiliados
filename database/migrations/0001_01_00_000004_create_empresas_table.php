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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('t_documento_id')->constrained();
            $table->string('nit', 20);
            $table->string('dev', 2);
            $table->string('nombre', 100);
            $table->string('direccion', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('celular', 20);
            $table->string('email', 100);
            $table->string('Pagina_web', 100)->nullable();
            $table->foreignId('ciudad_id')->constrained()->on('ciudades')->nullable();
            $table->foreignId('arl_id')->constrained()->on('arls')->nullable();
            $table->foreignId('caja_id')->constrained()->on('cajas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
