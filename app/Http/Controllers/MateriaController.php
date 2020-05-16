<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Materia;
use App\Area;

class MateriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getMaterias(){
        $Materias=Materia::get();
        $Areas=Area::get();
        return view('Materias',compact('Materias'),compact('Areas'));
    }

    public function ingresarMateria(Request $request){

        $nombreMateria=$request->nombreMateriaIngresada;
        $idArea=$request->idAreaIngresada;

        Materia::insert(['nombre'=> $nombreMateria ,'id_area'=>$idArea]);

        return redirect('administrar_materias');
    }

    public function modificarMateria(Request $request){

        $nombreMateria=$request->nombreMateriaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idArea=$request->idAreaModificada;

        Materia::where('nombre',$nombreMateria)->update(['nombre'=>$nuevoNombre,'id_area'=>$idArea]);

        return redirect('administrar_materias');
    }

    public function eliminarMateria(Request $request){

        $nombreMateria=$request->nombreMateriaEliminada;

        Materia::where('nombre',$nombreMateria)->delete();

        return redirect('administrar_materias');
    }

}
