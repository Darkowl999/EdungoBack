<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Administrador;

class ApiPersonaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        return Administrador::all();
    }

    public function store(Request $request){
        return PersonaDB::insert('insert into persona (nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento
            ,password) values (?,?,?,?,?,?,?,?,?)', [$request->nombre,$request->apellido,$request->nombre_usuario
            ,$request->telefono,$request->sexo,$request->email,$request->direccion,$request->fecha_nacimiento
            ,$request->password])->get();
    }

    



}
