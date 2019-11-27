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

//


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas del Producto
Route::resource( 'productos', 'ProductoController');
$router->get('producto/{id}/delete',['as'=>'producto.delete', 'uses'=>'ProductoController@delete',]);
$router->patch('producto/{id}',['as'=>'producto.update', 'uses'=>'ProductoController@update',]);
$router->patch('productos',['as'=>'productos.list', 'uses'=>'ProductoController@list',]);
/*$router->get('producto',['as'=>'productos.index', 'uses'=>'ProductoController@index',]);
$router->get('producto/create',['as'=>'productos.create', 'uses'=>'ProductoController@create',]);
$router->post('producto',['as'=>'producto.store', 'uses'=>'ProductoController@store',]);
$router->get('producto/{id}/edit',['as'=>'productos.edit', 'uses'=>'ProductoController@edit',]);
$router->patch('producto/{id}',['as'=>'producto.update', 'uses'=>'ProductoController@update',]);
$router->get('producto/{id}/delete',['as'=>'producto.delete', 'uses'=>'ProductoController@delete',]);
*/

