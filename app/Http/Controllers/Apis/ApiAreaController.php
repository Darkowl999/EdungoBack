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
        return Area::where('id_categoria',$request->idCategoria)->get();
    }



}
