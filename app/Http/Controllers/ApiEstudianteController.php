<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Persona;

class ApiEstudianteController extends Controller
{
    public function loginPerfilEstudiante(Request $request){
        $persona=Persona::find($request->id_persona);
        if (!is_null($persona)){
            $estudianteExists=Estudiante::where('id_persona','=',$request->id_persona)->first();
            if (is_null($estudianteExists)){
                $estudiante=Estudiante::create($request->id_persona);
                return response()->json($estudiante,200);
            }else{
                return response()->json($estudianteExists,200);
            }
        }else{
            return response()->json('Error no existe esa persona',500);
        }
    }
}
