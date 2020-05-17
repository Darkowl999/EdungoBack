<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Administrador;

//use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiPersonaController extends Controller
{
    use RegistersUsers;

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(Request $request){
        return Administrador::all();
    }

   /* public function store(Request $request){
        return Persona::insert('insert into persona (nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento
            ,password) values (?,?,?,?,?,?,?,?,?)', [$request->nombre,$request->apellido,$request->nombre_usuario
            ,$request->telefono,$request->sexo,$request->email,$request->direccion,$request->fecha_nacimiento
            ,$request->password])->get();
    }*/

    public function store(Request $request)
    {
        $this->register($request);

        return 0;
    }



}
