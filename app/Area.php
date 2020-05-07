<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table ='area';
    protected $fillable = ['id','nombre','created_at','updated_at','id_categoria'];
}