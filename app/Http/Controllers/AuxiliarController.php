<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auxiliar;
use App\Persona;

class AuxiliarController extends Controller
{

    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getSolicitudesAuxiliar(Request $request){
        $Auxiliares=Auxiliar::where('habilitado','0')->get();
        return view('solicitudes',compact('Auxiliares'));
    }
}
