<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table ='estudiante';
    protected $primaryKey="id_persona";
    protected $fillable = ['id_persona','created_at','updated_at'];
}
