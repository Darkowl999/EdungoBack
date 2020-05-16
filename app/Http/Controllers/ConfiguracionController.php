<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class ConfiguracionController extends Controller
{
    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getConfiguraciones(){
        $configuraciones=Configuracion::all()->first();
        return view('configuracion',compact('configuraciones'));
    }


    public function modificarTerminosCondiciones(Request $request){

        $nuevosTerminosCondiciones=$request->terminos_condiciones;

        Configuracion::where('id','1')->update(['terminos_condiciones'=>$nuevosTerminosCondiciones]);

        return redirect('/configuracion');
    }



}
