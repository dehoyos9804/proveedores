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

Route::get('/', function () {
    return view('/productos/index');
});

Auth::routes();

// rutas proveedor
Route::get('/home', 'HomeController@index')->name('home');
$router->get('proveedor/{id}/delete',['as'=>'proveedor.delete', 'uses'=>'ProveedorController@delete',]);
Route::Resource('proveedores','ProveedorController');