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
        //$Areas=DB::table('area')
        //->join('categoria','area.id_categoria','=','categoria.id')
        //->select('area.id,area.nombre as nombreArea,categoria.nombre as nombreCategoria')->get();
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

        $idArea=$request->idAreaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;
        $idCategoria=$request->idCategoriaModificada;

        Area::where('id',$idArea)->update(['nombre'=>$nuevoNombre,'id_categoria'=>$idCategoria]);

        return redirect('administrar_areas');
    }

    public function eliminarArea(Request $request){

        $idArea=$request->idAreaEliminada;

        Area::where('nombre',$idArea)->delete();

        return redirect('administrar_areas');
    }

}
