<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auxiliar;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiAuxiliarController extends Controller
{

    public function index(){
        return response()->json(Auxiliar::all(),200);
    }

    public function existeAuxiliar(Request $request){

        $auxiliar=Auxiliar::where('id_persona',$request->id_persona)->first();

        return (is_null($auxiliar))? 
         response()->json('no existe el auxiliar',500)
         :
         response()->json($auxiliar,200);   
    }

    public function enviarSolicitud(Request $request){

        $datos=[
            "id_persona"=>$request->id_persona,
            "ci"=>$request->ci,
            "foto_carnet"=>'',
            "ganancia"=>'0',
            "habilitado"=>'0',
            "recepcionado"=>'0'
        ];

        $existeAux=Auxiliar::where('id_persona',$request->id_persona)->first();

        if (is_null($request->id_persona) || is_null($request->ci) || is_null($request->foto_carnet) || is_null($request->foto_perfil)){
           return response()->json('Error al insertar los datos',500);
        }

        if ($existeAux){
            $existeCi=Auxiliar::where('ci',$request->ci)->where('id_persona','!=',$request->id_persona)->first();
            if (!is_null($existeCi)){
                return response()->json('El ci ya esta siendo utilizado por otra persona',500);
            }

            
            if ($request->has('foto_carnet')) {
                Storage::delete($existeAux->foto_carnet);
                $datos['foto_carnet'] = $request->foto_carnet->store('images/ci');
            } 


            $auxiliar=Auxiliar::where('id_persona',$existeAux->id_persona)->update($datos);
            $auxiliar=Auxiliar::where('id_persona',$existeAux->id_persona)->first();
        }else{
            $existeCi=Auxiliar::where('ci',$request->ci)->first();
            if (!is_null($existeCi)){
                return response()->json('El ci ya esta siendo utilizado por otra persona',500);
            }

            if ($request->has('foto_carnet')) {
                $datos['foto_carnet'] = $request->foto_carnet->store('images/ci');
            } 

            $auxiliar=Auxiliar::create($datos);
        }

        if ($request->has('foto_perfil')) {
            $foto_perfil = $request->foto_perfil->store('images/perfil');
            $persona = Persona::find($request->id_persona);
            Storage::delete($persona->foto_perfil);
            $persona->foto_perfil = $foto_perfil;
            $persona->save();
        } 


        return (is_null($auxiliar))? 
        response()->json('Error al insertar los datos',500)
        : response()->json($auxiliar,200);   
    }





}
