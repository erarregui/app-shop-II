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
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
//eliminar del carrito de compras
Route::delete('cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');


//primero se verifica en el midd de autenticacion "auth" para pasar al midd "admin"
//se antepone el prefijo "admin" con prefix('admin') y se antepone namespace('admin') en el controlador
Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products', 'ProductController@index'); //Listado
	Route::get('/products/create', 'ProductController@create'); //crear
	Route::post('/products', 'ProductController@store'); //crear
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario de edicion
	Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); //eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); //gestion de imagen
	Route::post('/products/{id}/images', 'ImageController@store'); //cargar nuevas imagenes
	Route::delete('/products/{id}/images', 'ImageController@destroy'); //eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//destacar image
});


