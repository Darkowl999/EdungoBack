<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materia;
use App\Auxiliar;
use App\MateriaAuxiliar;
use Illuminate\Support\Facades\DB;

class ApiMateriaAuxiliarController extends Controller
{
    public function getAuxiliaresMateria(Request $request){
        $auxiliares=DB::table('materia')
        ->join('materia_auxiliar','materia.id','=','materia_auxiliar.id_materia')
        ->join('auxiliar','auxiliar.id_persona','=','materia_auxiliar.id_auxiliar')
        ->where('materia.id','=',$request->id_materia)->get();

        return response()->json($auxiliares,200);
    }
}
