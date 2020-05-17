<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Califica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('califica', function (Blueprint $table) {
            $table->id();
            $table->string('comentario',500);
            $table->UnsignedInteger('estrellas');
            $table->boolean('favorito');
            $table->unsignedBigInteger('id_estudiante')->unique();
            $table->unsignedBigInteger('id_auxiliar')->unique();
            $table->foreign('id_estudiante')->references('id_persona')->on('estudiante')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('califica');
    }
}
