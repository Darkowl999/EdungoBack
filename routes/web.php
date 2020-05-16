<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AdministradorController@getVistaLogin')->name('/');

Route::get('/menu', 'MenuController@getVistaMenu');

Route::post('/login','AdministradorController@logearAdmin');
Route::post('/logout','AdministradorController@logoutAdmin');

Route::get('/administrar_categorias','CategoriaController@getCategorias');
Route::post('/ingresar_categoria','CategoriaController@ingresarCategoria');
Route::post('/modificar_categoria','CategoriaController@modificarCategoria');
Route::post('/eliminar_categoria','CategoriaController@eliminarCategoria');

Route::get('/administrar_areas','AreaController@getAreas');
Route::post('/ingresar_area','AreaController@ingresarArea');
Route::post('/modificar_area','AreaController@modificarArea');
Route::post('/eliminar_area','AreaController@eliminarArea');

Route::get('/administrar_materias','MateriaController@getMaterias');
Route::post('/ingresar_materia','MateriaController@ingresarMateria');
Route::post('/modificar_materia','MateriaController@modificarMateria');
Route::post('/eliminar_materia','MateriaController@eliminarMateria');

Route::get('/configuracion','ConfiguracionController@getConfiguraciones');
Route::post('/modificar_terminos_condiciones','ConfiguracionController@modificarTerminosCondiciones');


Route::get('/dashboard',function(){
    return view('dashboard');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
