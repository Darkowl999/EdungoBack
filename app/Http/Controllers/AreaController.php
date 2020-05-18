<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getAreas(){
        $Areas=DB::select('select area.id,area.nombre as nombreArea,categoria.nombre as nombreCategoria
         from area,categoria
         where area.id_categoria=categoria.id');
        $Categorias=Categoria::get();
        return view('areas',compact('Areas'),compact('Categorias'));
    }

    public function ingresarArea(Request $request){

        $nombreArea=$request->nombreAreaIngresada;
        $idCategoria=$request->idCategoriaIngresada;

        if (!is_null($nombreArea) && !isnull($idCategoria)){
            Area::insert(['nombre'=> $nombreArea ,'id_categoria'=>$idCategoria]);
        }

        return redirect('administrar_areas');
    }

    public function modificarArea(Request $request){

        $idArea=$request->idAreaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idCategoria=$request->idCategoriaModificada;
        if (!is_null($idCategoria)){
            if (is_null($nuevoNombre)){
                Area::where('id',$idArea)->update(['id_categoria'=>$idCategoria]);
            }else{
                Area::where('id',$idArea)->update(['nombre'=>$nuevoNombre,'id_categoria'=>$idCategoria]);
            }
        }
        return redirect('administrar_areas');
    }

    public function eliminarArea(Request $request){

        $idArea=$request->idAreaEliminada;
        if (!is_null($idArea)){
            Area::where('id',$idArea)->delete();
        }

        return redirect('administrar_areas');
    }

}
