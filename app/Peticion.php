<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    protected $table ='peticion';
    protected $fillable = ['id','aceptado','comentario','precio_deseado','created_at','updated_at','id_grupo'
    ,'id_estudiante','id_materia_auxiliar'];

}
