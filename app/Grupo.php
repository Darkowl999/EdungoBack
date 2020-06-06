<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table ='grupo';
    protected $fillable = ['id','cancelado','dia','disponible','duracion','es_particular','fechafin','fechaini',
    'hora','modalidad_virtual','nombre','precio','created_at','updated_at','id_materia_auxiliar'];

}
