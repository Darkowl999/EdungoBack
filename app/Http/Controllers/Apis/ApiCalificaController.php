<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Califica;
use App\Estudiante;
use App\Auxiliar;
use Illuminate\Support\Facades\DB;

class ApiCalificaController extends Controller
{
    public function agregarEliminarFavorito(Request $request){
        $id_estudiante=$request->id_estudiante;
        $id_auxiliar=$request->id_auxiliar;

        if (is_null(Estudiante::find($id_estudiante)) ){
            return response()->json('no existe el estudiante',500);
        }

        if (is_null(Auxiliar::find($id_auxiliar)) ){
            return response()->json('no existe el auxiliar',500);
        }

        $existeCalifica=Califica::where('id_auxiliar','=',$id_auxiliar,'and','id_estudiante','=',$id_estudiante)->first();

        if (!is_null($existeCalifica)){
            Califica::delete($existeCalifica->id);
        }else{
            $califica=Califica::create();
        }
        return ApiMateriaAuxiliarController::getAuxiliaresMateria($request);
    }


}
