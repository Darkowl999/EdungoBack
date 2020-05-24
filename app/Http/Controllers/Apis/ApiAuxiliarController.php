<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auxiliar;
use Illuminate\Support\Facades\DB;

class ApiAuxiliarController extends Controller
{

    public function existeAuxiliar(Request $request){

        $auxiliar=Auxiliar::find($request->id_persona);

        return (is_null($auxiliar))? 
         response()->json('no existe el auxiliar',500)
         :
         response()->json($auxiliares,200);   
    }

    public function enviarSolicitud(Request $request){

        $datos=[
            "id_persona"=>$request->id_persona,
            "ci"=>$request->ci,
            "foto_carnet"=>$request->foto_carnet,
            "ganancia"=>'0',
            "habilitado"=>'0',
        ];

      /*  if ($request->has('imageUrl')) {

            $imgUrl = $request->get('imageUrl');
            $fileName = array_pop(explode(DIRECTORY_SEPARATOR, $imgUrl));
            $image = file_get_contents($imgUrl);
     
            $destinationPath = base_path() . '/public/uploads/images/ci/' . $fileName;
     
            file_put_contents($destinationPath, $image);
            $attributes['image'] = $fileName;
         } */

        $auxiliar=Auxiliar::create();

        return (is_null($auxiliar))? 
        response()->json('Error al insertar los datos',500)
        : response()->json($auxiliares,200);   
    }
}
