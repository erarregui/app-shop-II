<?php

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

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//primero se verifica en el midd de autenticacion "auth" para pasar al midd "admin"
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/admin/products', 'ProductController@index'); //Listado
	Route::get('/admin/products/create', 'ProductController@create'); //crear
	Route::post('/admin/products', 'ProductController@store'); //crear
	Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // formulario de edicion
	Route::post('/admin/products/{id}/edit', 'ProductController@update'); //actualizar
	Route::delete('/admin/products/{id}', 'ProductController@destroy'); //eliminar

	Route::get('/admin/{id}/images', 'ImageController@index'); //gestion de imagen
	Route::post('/admin/{id}/images', 'ImageController@store'); //cargar nuevas imagenes
	Route::delete('/admin/{id}/images', 'ImageController@destroy'); //eliminar
});


