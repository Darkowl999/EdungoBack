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
            if ($existeCalifica->favorito=='1'){
                Califica::where('id',$existeCalifica->id)->update(['favorito'=>'0']);
            }else{
                Califica::where('id',$existeCalifica->id)->update(['favorito'=>'1']);
            }
        }else{
            $datos=[
                'id_estudiante'=>$id_estudiante,
                'id_auxiliar'=>$id_auxiliar,
                'favorito'=>'1'
            ];
            $califica=Califica::create($datos);
        }
        return ApiMateriaAuxiliarController::getAuxiliaresMateria($request);
    }


    public function calificarAuxiliar(Request $request){

    }

}
