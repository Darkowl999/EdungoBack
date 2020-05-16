<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Persona as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Persona extends Authenticatable
{
    use Notifiable;

    protected $table ='persona';
    protected $guard='persona';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['nombre','apellido','nombre_usuario',
        'telefono','sexo','email','direccion','fecha_nacimiento','password','created_at',
        'updated_at'];

    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];
    
        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

}