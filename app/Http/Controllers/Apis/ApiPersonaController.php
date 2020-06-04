<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Persona;
use App\Estudiante;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ApiPersonaController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return Persona::all();
    }


    public function store(Request $request)
    {
       /* return Persona::insert('insert into persona (nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento
        ,password) values (?,?,?,?,?,?,?,?,?)', [$request->nombre,$request->apellido,$request->nombre_usuario
        ,$request->telefono,$request->sexo,$request->email,$request->direccion,$request->fecha_nacimiento
        ,$request->password]);
        */

        if (is_null($request->nombre) || is_null($request->apellido) || is_null($request->nombre_usuario) 
        || is_null($request->telefono) || is_null($request->sexo) || is_null($request->email)
        || is_null($request->direccion) || is_null($request->fecha_nacimiento) || is_null($request->password)){
             return response()->json($request,500);
        }


        $email=Persona::where('email',$request->email)->first();
        $nombre_usuario=Persona::where('nombre_usuario',$request->nombre_usuario)->first();

        if (!is_null($email)){
            return response()->json('Ya existe este email',500);
        }
        if (!is_null($nombre_usuario)){
            return response()->json('Ya existe este nombre de usuario',500);  
        }

        if ($request->password==$request->confirm_password){
            
        }else{
            return response()->json('La confirmacion de la contraseña es incorrecta',500);  
        }

        $datos=["nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        "nombre_usuario" =>$request->nombre_usuario,
        "telefono"=>$request->telefono,
        "sexo"=>$request->sexo,
        "email"=>$request->email,
        "direccion"=>$request->direccion,
        "fecha_nacimiento"=>$request->fecha_nacimiento,
        "password"=>Hash::make($request->password),
        "foto_perfil"=>""
        ];

        $persona=Persona::create($datos);

         if (is_null($persona)){  
         return response()->json('Error al hacer la peticion de los datos',500);
        }
         else{
            $datosPersona=['id_persona'=>$persona->id_persona];
            Alumno::create($datosPersona);
            return response()->json($persona,200);  
         }

    }


    public function login(Request $request){
        $persona=Persona::where('nombre_usuario',$request->nombre_usuario)->first();
        if (is_null($persona)){
            return response()->json('El nombre de usuario es incorrecto',500);  
        }

        if (Hash::check($request->password, $persona->password)){
            return response()->json($persona,200); 
        }

        return response()->json('La clave es incorrecta',500);  
    }

    public function cambiarPassword(Request $request){
        $persona=Persona::where('id',$request->id)->first();
        if (is_null($persona)){
            return response()->json('El id usuario no existe',500);  
        }

        if (Hash::check($request->password, $persona->password)){
            if ($request->new_password==$request->confirm_new_password){
            
            }else{
                return response()->json('La confirmacion de la contraseña es incorrecta',500);  
            }
        }else{
            return response()->json('La contraseña es incorrecta',500);  
        }

        if (Hash::check($request->new_password,$persona->password)){
            return response()->json('La contraseña no puede ser igual a la anterior',500);  
        }

        $password=[
            "password"=>Hash::make($request->new_password)
        ];

        $persona=Persona::where('id',$request->id)->update($password);
        $persona=Persona::where('id',$request->id)->first();
        return response()->json($persona,200);
    }

    public function cambiarFotoPerfil(Request $request){

        $persona=Persona::where('id',$request->id)->first();

        $datos=["foto_perfil"=>""];
        if (!is_null($persona)){
            if ($request->has('foto_perfil')) {
                Storage::delete($persona->foto_perfil);
                $datos["foto_perfil"] = $request->foto_perfil->store('images/perfil');
                Persona::where('id',$request->id)->update($datos);
                $persona=Persona::where('id',$request->id)->first();
            }else{
                return response()->json('No se ha adjuntado ninguna foto',500);  
            } 
        }else{
            return response()->json('El id de la persona no existe',500);  
        }

        return response()->json($persona,200);  
    }

}
