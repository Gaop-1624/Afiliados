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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tdocumento')->constrained()->on('t_documentos');
            $table->string('documento', 20);
            $table->string('pnombre', 50);
            $table->string('snombre', 50)->nullable();
            $table->string('papellido', 50);
            $table->string('sapellido', 50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('celular', 50);
            $table->string('email', 100)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->integer('sexo')->nullable();
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
            $table->foreignId('ciudad_id')->constrained()->on('ciudades')->nullable();
            $table->foreignId('empresalaboral_id')->constrained()->on('empresa_laborals')->nullable();
           /* $table->integer('status')->default(0); *///0 Ingreso 1 Activo 2 Retirado

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
