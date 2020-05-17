<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MateriaAuxiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_auxiliar', function (Blueprint $table) {
            $table->id();
            $table->boolean('esAuxiliarOficial');
            $table->unsignedBigInteger('id_materia')->unique();
            $table->unsignedBigInteger('id_auxiliar')->unique();
            $table->foreign('id_materia')->references('id')->on('materia')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_auxiliar')->references('id_persona')->on('auxiliar')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('materia_auxiliar');
    }
}
