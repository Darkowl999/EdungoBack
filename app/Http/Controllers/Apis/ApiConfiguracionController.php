<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Configuracion;

class ApiConfiguracionController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        $configuracion= Configuracion::all();
        return response()->json($configuracion,200);  
    }



}
