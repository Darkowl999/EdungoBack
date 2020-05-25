<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materia;
use App\Auxiliar;
use App\MateriaAuxiliar;
use App\Califica;
use Illuminate\Support\Facades\DB;

class ApiMateriaAuxiliarController extends Controller
{
    public function getAuxiliaresMateria(Request $request){

        $materia=Materia::find($request->id_materia);
        if (is_null($materia)){
            return response()->json('La materia de la peticion no existe',500);
        }
        $auxiliares=DB::table('materia')
        ->join('materia_auxiliar','materia.id','materia_auxiliar.id_materia')
        ->join('auxiliar','auxiliar.id_persona','materia_auxiliar.id_auxiliar')
        ->where('materia.id',$request->id_materia)->get();
                    
        return response()->json($auxiliares,200);  
    }

    public function setMateriaAuxiliar(Request $request){

        $materias_auxiliares=MateriaAuxiliar::where('id_materia','=',$request->id_materia)
        ->where('id_auxiliar','=',$request->id_auxiliar)->first();

        if ( !is_null($materias_auxiliares)){
            return response()->json('Ya es auxiliar de esa materia',500);  
        }


        $materia=Materia::where('id',$request->id_materia)->first();
        $auxiliar=DB::table('auxiliar')->where('id_persona',$request->id_auxiliar)->first();

        if (is_null($materia) || is_null($auxiliar)){
            return response()->json('alguno de los datos enviados es invalido',500);  
        }

        $datos=[
            'esAuxiliarOficial'=>'0',
            'id_materia'=>$request->id_materia,
            'id_auxiliar'=>$request->id_auxiliar
        ];
        $materia_auxiliar=MateriaAuxiliar::create($datos);

        return response()->json($materia_auxiliar,200);  
    }

}
