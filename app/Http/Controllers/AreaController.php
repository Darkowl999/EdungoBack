<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Categoria;

class AreaController extends Controller
{
    public function getAreas(){
        $Areas=Area::get();
        $Categorias=Categoria::get();
        return view('areas',compact('Areas'),compact('Categorias'));
    }

    public function ingresarArea(Request $request){

        $nombreArea=$request->nombreAreaIngresada;
        $idCategoria=$request->idCategoriaIngresada;

        Area::insert(['nombre'=> $nombreArea ,'id_categoria'=>$idCategoria]);

        return redirect('administrar_areas');
    }

    public function modificarArea(Request $request){

        $nombreArea=$request->nombreAreaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idCategoria=$request->idCategoriaModificada;

        Area::where('nombre',$nombreArea)->update(['nombre'=>$nuevoNombre,'id_categoria'=>$idCategoria]);

        return redirect('administrar_areas');
    }

    public function eliminarArea(Request $request){

        $nombreArea=$request->nombreAreaEliminada;

        Area::where('nombre',$nombreArea)->delete();

        return redirect('administrar_areas');
    }

}
