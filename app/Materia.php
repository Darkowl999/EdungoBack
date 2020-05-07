<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table ='materia';
    protected $fillable = ['id','nombre','created_at','updated_at','id_area'];
}