<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;
use Illuminate\Support\Facades\Hash;


class ApiPersonaController extends Controller
{


    public function __construct(){
        $this->middleware('guest');
    }

    public function index(Request $request){
        return Persona::all();
    }

   /* public function store(Request $request){

    }*/

    public function store(Request $request)
    {
       /* return Persona::insert('insert into persona (nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento
        ,password) values (?,?,?,?,?,?,?,?,?)', [$request->nombre,$request->apellido,$request->nombre_usuario
        ,$request->telefono,$request->sexo,$request->email,$request->direccion,$request->fecha_nacimiento
        ,$request->password]);
        */
        $email=Persona::find($request->email);
        $nombre_usuario=Persona::find($request->nombre_usuario);

        if (!is_null($email)){
            return response()->json('Ya existe este email',500);
        }
        if (!is_null($nombre_usuario)){
            return response()->json('Ya existe este nombre de usuario',500);  
        }

        if ($request->password!=$request->confirm_password){
            return response()->json('La confirmacion de la contraseña es incorrecta',500);  
        }

        Persona::insert('insert into persona (nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento
        ,password) values (?,?,?,?,?,?,?,?,?)', [$request->nombre,$request->apellido,$request->nombre_usuario
        ,$request->telefono,$request->sexo,$request->email,$request->direccion,$request->fecha_nacimiento
        ,$request->password]);

            return response()->json('Datos insertados correctamente :v',200);
    }


}
