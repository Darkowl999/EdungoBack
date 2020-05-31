<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auxiliar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiAuxiliarController extends Controller
{

    public function index(){
        return response()->json(Auxiliar::all(),200);
    }

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

        $existeAux=Auxiliar::where('id_persona',$request->id_persona)->first();

        if (is_null($request->id_persona) || is_null($request->ci) || is_null($request->foto_carnet)){
            response()->json('Error al insertar los datos',500);
        }

        if ($existeAux){
            Storage::delete($existeAux->foto_carnet);
            if ($request->has('foto_carnet')) {
                $datos['foto_carnet'] = $request->foto_carnet->store('ci');
            } 
            $auxiliar=Auxiliar::where('id_persona',$existeAux->id_persona)->update($datos);
            $auxiliar=Auxiliar::where('id_persona',$existeAux->id_persona)->first();
        }else{
            if ($request->has('foto_carnet')) {
                $datos['foto_carnet'] = $request->foto_carnet->store('ci');
            } 
            $auxiliar=Auxiliar::create($datos);
        }


        return (is_null($auxiliar))? 
        response()->json('Error al insertar los datos',500)
        : response()->json($auxiliar,200);   
    }
}
