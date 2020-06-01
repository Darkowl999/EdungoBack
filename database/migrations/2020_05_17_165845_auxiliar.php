<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Auxiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxiliar', function (Blueprint $table) {
            $table->unsignedBigInteger('id_persona');
            $table->unsignedInteger('ci')->unique();
            $table->string('foto_carnet');
            $table->unsignedInteger('ganancia');
            $table->boolean('habilitado');
            $table->boolean('recepcionado');
            $table->foreign('id_persona')->references('id')->on('persona')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id_persona');
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
        Schema::dropIfExists('auxiliar');
    }
}
