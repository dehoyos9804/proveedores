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






//Rutas del Producto

Route::resource( 'productos', 'ProductoController');
$router->get('producto/{id}/delete',['as'=>'producto.delete', 'uses'=>'ProductoController@delete',]);
$router->patch('producto/{id}',['as'=>'producto.update', 'uses'=>'ProductoController@update',]);
$router->patch('productos',['as'=>'productos.list', 'uses'=>'ProductoController@list',]);


