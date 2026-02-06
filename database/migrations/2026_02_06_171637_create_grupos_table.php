<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_grupos_table.php
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('turno_id');
            $table->unsignedBigInteger('grado_id');
            $table->string('clave');
            $table->integer('numero_grupo');
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('turno_id')->references('id')->on('turnos');
            $table->foreign('grado_id')->references('id')->on('grados');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
