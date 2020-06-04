<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inscribe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscribe', function (Blueprint $table) {
            $table->id();
            $table->string('observacion',500);
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_estudiante')->references('id_persona')->on('estudiante')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('inscribe');
    }
}
