<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;



class ApiPersonaController extends Controller
{


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
        if (validator($request)){
            return 200;
            $this->create($request);
        }else{
            return 0;
        }
    }

    protected function validator(Request $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrador'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(Request $data)
    {
        return Administrador::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
