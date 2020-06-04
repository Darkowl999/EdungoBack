<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscribe extends Model
{
    protected $table ='inscribe';
    protected $fillable = ['id','observacion','created_at','updated_at','id_estudiante','id_grupo'];
}
