<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class ApiConfiguracionController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        return Configuracion::all();
    }



}
