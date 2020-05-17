<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaAuxiliar extends Model
{
    protected $table ='materia_auxiliar';
    protected $fillable = ['id','esAuxiliarOficial','id_materia','id_auxiliar'];
}
