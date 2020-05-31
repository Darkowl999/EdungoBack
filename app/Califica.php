<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Califica extends Model
{
    protected $table ='califica';
    protected $fillable = ['id','comentario','estrellas','favorito','id_estudiante','id_auxiliar'
        ,'created_at','updated_at'];
}
