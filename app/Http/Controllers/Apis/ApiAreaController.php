<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Categoria;

class ApiAreaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        $areas=Area::where('id_categoria',$request->idCategoria)->get();
        return (is_null($areas))?  
        response()->json('La categoria de la peticion no existe',500) :
        response()->json($areas,200);  
    }



}
