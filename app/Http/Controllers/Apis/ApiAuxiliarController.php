<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auxiliar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiAuxiliarController extends Controller
{

    public function existeAuxiliar(Request $request){

        $auxiliar=Auxiliar::where('id_persona',$request->id_persona)->first();

        return (is_null($auxiliar))? 
         response()->json('no existe el auxiliar',500)
         :
         response()->json($auxiliar,200);   
    }

    public function enviarSolicitud(Request $request){

        $datos=[
            "id_persona"=>$request->id_persona,
            "ci"=>$request->ci,
            "foto_carnet"=>'',
            "ganancia"=>'0',
            "habilitado"=>'0',
        ];

        if ($request->has('foto_carnet')) {
            $datos['foto_carnet'] = $request->foto_carnet->store('ci');
        } 

        return $datos;

        $auxiliar=Auxiliar::create();

        return (is_null($auxiliar))? 
        response()->json('Error al insertar los datos',500)
        : response()->json($auxiliar,200);   
    }
}
