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

        $existeCalifica=Califica::where('id_auxiliar','=',$id_auxiliar)->where('id_estudiante','=',$id_estudiante)->first();

        $califica=$existeCalifica;
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
                'favorito'=>'1',
                'comentario'=>'',
                'estrellas'=>'0'
            ];
            $califica=Califica::create($datos);
        }
        $califica=Califica::where('id_auxiliar','=',$id_auxiliar)->where('id_estudiante','=',$id_estudiante)->first();
        return response()->json($califica,200); 
    } 


    public function calificarAuxiliar(Request $request){
        $id_estudiante=$request->id_estudiante;
        $id_auxiliar=$request->id_auxiliar;

        if (is_null(Estudiante::find($id_estudiante)) ){
            return response()->json('no existe el estudiante',500);
        }

        if (is_null(Auxiliar::find($id_auxiliar)) ){
            return response()->json('no existe el auxiliar',500);
        }

        if (is_null($request->estrellas)){
            return response()->json('Falta el parametro estrellas',500);
        }

        $existeCalifica=Califica::where('id_auxiliar','=',$id_auxiliar)->where('id_estudiante','=',$id_estudiante)->first();

        $califica=$existeCalifica;
        if (!is_null($existeCalifica)){
            Califica::where('id',$existeCalifica->id)->update(['estrellas'=>$request->estrellas]);
        }else{
            $datos=[
                'id_estudiante'=>$id_estudiante,
                'id_auxiliar'=>$id_auxiliar,
                'favorito'=>'0',
                'comentario'=>'',
                'estrellas'=>$request->estrellas
            ];
            $califica=Califica::create($datos);
        }
        $califica=Califica::where('id_auxiliar','=',$id_auxiliar)->where('id_estudiante','=',$id_estudiante)->first();
        return response()->json($califica,200);
    }

}
