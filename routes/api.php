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
//(nombre,apellido,nombre_usuario,telefono,sexo,email,direccion,fecha_nacimiento,password,confirm_password)
Route::post('loginPersona','Apis\ApiPersonaController@login'); //login usuarios requiere (nombre_usuario,password)

route::post('loginPerfilEstudiante','Apis\ApiEstudianteController@loginPerfilEstudiante'); //para entrar como estudiante requiere (id_persona)
route::get('personas','Apis\ApiPersonaController@index');  //para hacer pruebas 

//route::post('loginPerfilAuxiliar','');
//route::post('registrarAuxiliar','');

Route::get('categorias','Apis\ApiCategoriaController@index'); //para obtener todas las categorias
Route::get('areas','Apis\ApiAreaController@index');    //para obtener las areas de una categoria en especifico requiere (id_categoria)
Route::get('materias','Apis\ApiMateriaController@index'); //para obtener las materias de un area en especifico requiere (id_area)
Route::get('configuraciones','Apis\ApiConfiguracionController@index'); //muestra las configuraciones como terminos y condiciones

//route::post('auxiliaresMateria','');