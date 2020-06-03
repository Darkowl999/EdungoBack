<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peticion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticion', function (Blueprint $table) {
            $table->id();
            $table->boolean('aceptado');
            $table->string('comentario',500);
            $table->unsignedFloat('precio_deseado');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_materia_auxiliar');
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estudiante')->references('id_persona')->on('estudiante')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_materia_auxiliar')->references('id')->on('materia_auxiliar')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticion');
    }
}
