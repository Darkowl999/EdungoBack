<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
            $table->id();
            $table->boolean('cancelado');
            $table->string('dia',12);
            $table->boolean('disponible');
            $table->time('duracion');
            $table->boolean('es_particular');
            $table->date('fechafin');
            $table->date('fechaini');
            $table->time('hora');
            $table->boolean('modalidad_virtual');
            $table->string('nombre',120);
            $table->unsignedFloat('precio');
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
        Schema::dropIfExists('grupo');
    }
}
