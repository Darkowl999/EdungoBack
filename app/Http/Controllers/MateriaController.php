<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Materia;
use App\Area;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getMaterias(){
        $Materias=DB::select('select materia.id,materia.nombre as nombreMateria,area.nombre as nombreArea
        from materia,area
        where materia.id_area=area.id');
        $Areas=Area::get();
        return view('materias',compact('Materias'),compact('Areas'));
    }

    public function ingresarMateria(Request $request){

        $nombreMateria=$request->nombreMateriaIngresada;
        $idArea=$request->idAreaIngresada;
        if (!is_null($nombreMateria) && !is_null($idArea)){
        Materia::insert(['nombre'=> $nombreMateria ,'id_area'=>$idArea]);
        }
        return redirect('administrar_materias');
    }

    public function modificarMateria(Request $request){

        $idMateria=$request->idMateriaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idArea=$request->idAreaModificada;
        if (!is_null($idArea)){
            if (is_null($nuevoNombre)){
                Materia::where('id',$idMateria)->update(['id_area'=>$idArea]);
            }else{
                Materia::where('id',$idMateria)->update(['nombre'=>$nuevoNombre,'id_area'=>$idArea]);
            }
        }
        return redirect('administrar_materias');
    }

    public function eliminarMateria(Request $request){

        $idMateria=$request->idMateriaEliminada;
        if (!is_null($nombreMateria)){
        Materia::where('nombre',$idMateria)->delete();
        }
        return redirect('administrar_materias');
    }

}
