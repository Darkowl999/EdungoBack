<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Grupo;
use App\MateriaAuxiliar;

class ApiGrupoController extends Controller
{
    public function crarGrupoAuxiliatura(Request $request){
        

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

        $id_materia_auxiliar=MateriaAuxiliar::where('id_materia',$request->id_materia)->where('id_auxiliar',$request->auxiliar)->first();

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
            'precio'=>'0',
            'id_materia_auxiliar'=>$id_materia_auxiliar
        ];

        $grupo=Grupo::create($datosGrupo);


    }

    public function crearGrupoAuxiliatura(Request $request){
       // (dia,duracion,fechafin,fechaini,hora,nombre,precio,id_materia,id_auxiliar)
       $materia_auxiliar=MateriaAuxiliar::where('id_materia',$request->id_materia)->where('id_auxiliar',$request->auxiliar)->first();
       $datosGrupo=[
        'cancelado'=>false,
        'dia'=>$dia,
        'disponible'=>true,
        'duracion'=>$request->duracion,
        'es_particular'=>$request->es_particular,
        'fechafin'=>$request->fechaini,
        'fechaini'=>$request->fechafin,
        'hora'=>$request->hora,
        'modalidad_virtual'=>$request->modalidad_virtual,
        'nombre'=>$request->nombre,
        'precio'=>$request->precio,
        'id_materia_auxiliar'=>$id_materia_auxiliar
        ];

        $grupo=Grupo::create($datosGrupo);
    }

}
