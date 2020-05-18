<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Materia;
use App\Area;

class ApiMateriaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        $materias= Materia::where('id_area',$request->idArea)->get();
        return (is_null($materias))?  
        response()->json('El area de la peticion no existe',500) :
        response()->json($materias,200);  
    }

}
