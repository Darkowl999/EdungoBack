<?php

//namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Administrador;

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
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user) ? : 0;
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrador'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    
    protected function create(array $data)
    {
        return Administrador::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
