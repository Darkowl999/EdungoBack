<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    protected $table ='auxiliar';
    protected $primaryKey='id_persona';
    protected $fillable = ['id_persona','ci','foto_carnet','ganancia','habilitado','datos_enviados'
        ,'created_at','updated_at'];
}
