<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {  return $request->user(); });

Route::post('registrarPersona','Apis\ApiPersonaController@store'); //registro de usuarios requiere 
//(nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento,password,confirm_password) devuelve datos persona

Route::post('loginPersona','Apis\ApiPersonaController@login'); //login usuarios requiere (nombre_usuario,password) devuelve datos persona

//INUTILIZADO   route::post('loginPerfilEstudiante','Apis\ApiEstudianteController@loginPerfilEstudiante'); //para entrar como estudiante requiere (id_persona)

route::post('perfilAuxiliar','Apis\ApiAuxiliarController@existeAuxiliar'); //Selecciona perfil auxiliar requiere(id_persona) 
//devuelve los datos del auxiliar si existe y si no devuelve un error
route::post('registrarAuxiliar','Apis\ApiAuxiliarController@enviarSolicitud');
//envia la solicitud para ser auxiliar
//id_persona,ci,foto_carnet

Route::post('categorias','Apis\ApiCategoriaController@index'); //para obtener todas las categorias
Route::post('areas','Apis\ApiAreaController@index');    //para obtener las areas de una categoria en especifico requiere (id_categoria)
Route::post('materias','Apis\ApiMateriaController@index'); //para obtener las materias de un area en especifico requiere (id_area)
Route::post('configuraciones','Apis\ApiConfiguracionController@index'); //muestra las configuraciones como terminos y condiciones

route::post('auxiliaresMateria','Apis\ApiMateriaAuxiliarController@getAuxiliaresMateria');  //muestra todos los auxiliares de una materia requiere (id_materia)
route::post('setMateriaAuxiliar','Apis\ApiMateriaAuxiliarController@setMateriaAuxiliar');  //añade una materia de un auxiliar requiere(id_materia,id_auxiliar) 

//route::post('agregarEliminarFavorito','Api\ApiCalificaController@agregarEliminarFavorito'); //califica auxiliar requiere(id_estudiante,id_auxiliar)

//para hacer pruebas 
route::get('personas','Apis\ApiPersonaController@index');
route::get('auxiliares','Apis\ApiAuxiliarController@index');