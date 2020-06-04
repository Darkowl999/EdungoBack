<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Inscribe;
use App\Estudiante;
use App\Grupo;


class ApiInscribeController extends Controller
{
    public function inscribirGrupo(Request $request){

        if (is_null($request->id_estudiante) || is_null($request->id_grupo)){
            return response()->json('Datos nulos', 200);
        }

        $estudiante=Estudiante::where('id_persona',$request->id_estudiante)->first();
        $grupo=Grupo::where('id',$request->id_grupo)->first();

        if (is_null($estudiante) || is_null($grupo)){
            return response()->json('No existe el estudiante o grupo', 200);
        }

        $datos=[
            "id_estudiante"=>$estudiante->id_persona,
            "id_grupo"=>$grupo->id,
            "observacion"=>"",
        ];
        $inscribe=Inscribe::create($datos);

        return response()->json($inscribe,200);
    }
}
