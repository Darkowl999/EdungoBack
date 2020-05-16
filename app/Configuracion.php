<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table ='configuracion';
    protected $fillable = ['id','terminos_condiciones','created_at','updated_at'];
}