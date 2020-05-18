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
        $nombreAreaExists=Area::where('nombre',$nombreArea)->first();
        if (!is_null($nombreArea) && !is_null($idCategoria) && is_null($nombreAreaExists)){
            Area::insert(['nombre'=> $nombreArea ,'id_categoria'=>$idCategoria]);
        }

        return redirect('administrar_areas');
    }

    public function modificarArea(Request $request){

        $nombreArea=$request->nombreAreaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idCategoria=$request->idCategoriaModificada;
        $nombreAreaExists=Area::where('nombre',$nuevoNombre)->first();

        if (!is_null($idCategoria)){
            if (is_null($nuevoNombre)){
                Area::where('nombre',$nombreArea)->update(['id_categoria'=>$idCategoria]);
            }else if(is_null($nombreAreaExists)){
                Area::where('nombre',$nombreArea)->update(['nombre'=>$nuevoNombre,'id_categoria'=>$idCategoria]);
            }
        }
        return redirect('administrar_areas');
    }

    public function eliminarArea(Request $request){

        $nombreArea=$request->nombreAreaEliminada;
        if (!is_null($nombreArea)){
            Area::where('nombre',$nombreArea)->delete();
        }
        return redirect('administrar_areas');
    }

}
