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

Route::get('/', function () {
    return view('login');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::post('/login','AdministradorController@logearAdmin');

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




//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
