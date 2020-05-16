<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Materia;
use App\Area;

class ApiMateriaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        return Materia::where('id_area',$request->idArea)->get();
    }

}
