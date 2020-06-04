<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Peticion;
use App\Grupo;
use App\MateriaAuxiliar;
use \Carbon\Carbon;

class ApiPeticionController extends Controller
{
    public function pedirAuxiliatura(Request $request){

        //(duracion,es_particular,fecha,hora,modalidad_virtual,nombre,precio_deseado,comentario,id_estudiante,id_materia,id_auxiliar)


        if (is_null($request->duracion) || is_null($request->es_particular) || is_null($request->fecha) 
        || is_null($request->hora) || is_null($request->comentario) | is_null($request->id_auxiliar)
        || is_null($request->modalidad_virtual) || is_null($request->nombre) 
        || is_null($request->precio_deseado) || is_null($request->id_estudiante) || is_null($request->id_materia)){
            return response()->json('Error en los datos',500);
        }

        $fechaCarbon = Carbon::parse($request->fecha);
        $nombre_dia=$fechaCarbon->dayOfWeek;
        switch($nombre_dia)
        {
        case 0: $nombre_dia="Domingo";
        break;    
        case 1: $nombre_dia="Lunes";
        break;
        case 2: $nombre_dia="Martes";
        break;
        case 3: $nombre_dia="Miercoles";
        break;
        case 4: $nombre_dia="Jueves";
        break;
        case 5: $nombre_dia="Viernes";
        break;
        case 6: $nombre_dia="Sabado";
        break;
        }


        $datosGrupo=[
            'cancelado'=>false,
            'dia'=>$nombre_dia,
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
