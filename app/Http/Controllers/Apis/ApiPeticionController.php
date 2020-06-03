<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Peticion;
use App\Grupo;
use App\MateriaAuxiliar;

class ApiPeticionController extends Controller
{
    public function pedirAuxiliatura(Request $request){

        //(duracion,es_particular,fecha,hora,modalidad_virtual,nombre,precio_deseado,comentario,id_estudiante,id_materia,id_auxiliar)

        
        $dia;
        $datosGrupo=[
            'cancelado'=>false,
            'dia'=>$dia,
            'disponible'=>true,
            'duracion'=>$request->duracion,
            'es_particular'=>$request->es_particular,
            'fechafin'=>$request->fecha,
            'fechaini'=>$request->fecha,
            'hora'=>$request->hora,
            'modalidad_virtual'=>$request->modalidad_virtual,
            'nombre'=>$request->nombre,
            'precio'=>'0'
        ];

        $grupo=Grupo::create($datosGrupo);

        //['id','aceptado','comentario','precio_deseado','created_at','updated_at','id_grupo','id_estudiante','id_materia_auxiliar'];
        $id_materia_auxiliar=MateriaAuxiliar::where('id_materia',$request->id_materia)->where('id_auxiliar',$request->id_auxiliar)->first();

        $datosPeticion=[
            'aceptado'=>false,
            'comentario'=>$request->comentario,
            'precio_deseado'=>$request->precio_deseado,
            'id_grupo'=>$grupo->id,
            'id_estudiante'=>$request->id_estudiante,
            'id_materia_auxiliar'=>$id_materia_auxiliar,
        ];

        $peticion=Peticion::create($datosPeticion);

        return response()->json($peticion,200);

    }
}
