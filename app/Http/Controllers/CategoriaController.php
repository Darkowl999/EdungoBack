<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
    public function getCategorias(){
        $categorias=Categoria::get();
        return view('categorias',compact('categorias'));
    }

    public function ingresarCategoria(Request $request){

        $nombreCategoria=$request->nombreCategoriaIngresada;

        Categoria::insert(['nombre'=> $nombreCategoria ]);

        return redirect('administrar_categorias');
    }

    public function modificarCategoria(Request $request){

        $nombreCategoria=$request->nombreCategoriaModificada;
        $nuevoNombre=$request->nuevoNombreModificado;

        Categoria::where('nombre',$nombreCategoria)->update(['nombre'=>$nuevoNombre]);

        return redirect('administrar_categorias');
    }

    public function eliminarCategoria(Request $request){

        $nombreCategoria=$request->nombreCategoriaEliminada;

        Categoria::where('nombre',$nombreCategoria)->delete();

        return redirect('administrar_categorias');
    }

}
