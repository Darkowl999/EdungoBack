<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auxiliar;
use App\Persona;
use Illuminate\Support\Facades\DB;

class AuxiliarController extends Controller
{

    public function __construct(){
       // $this->middleware('auth:administrador');
    }

    public function getSolicitudesAuxiliar(Request $request){
        $Auxiliares=DB::select('select auxiliar.id_persona,persona.foto_perfil,auxiliar.foto_carnet,auxiliar.ci
         from auxiliar,persona 
         where persona.id=auxiliar.id_persona and recepcionado = false ');
        return view('solicitudes',compact('Auxiliares'));
    }

    public function getDetalleAuxiliar(Request $request){
        $Auxiliar=Persona::where('persona.id',$request->id_persona)
        ->join('auxiliar','auxiliar.id_persona','persona.id')
        ->where('auxiliar.id_persona','=',$request->id_persona)->first();
        return view('detalle_auxiliar',compact('Auxiliar'));
    }
}
