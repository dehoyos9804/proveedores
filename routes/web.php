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


/*Route::get('/', function () {
    return view('/compras/create');
});*/

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*RUTAS PARA COMPRAS*/
$router->get('compra',['as'=>'compra.index', 'uses'=>'ComprasController@index',]);
$router->get('compra/create',['as'=>'compra.create', 'uses'=>'ComprasController@create',]);
$router->post('compra',['as'=>'compra.store', 'uses'=>'ComprasController@store',]);
$router->get('venta/{id}/edit',['as'=>'ventas.edit', 'uses'=>'VentaController@edit',]);
//$router->patch('venta/{id}',['as'=>'ventas.update', 'uses'=>'VentaController@update',]);
$router->get('compra/{id}/delete',['as'=>'compra.delete', 'uses'=>'ComprasController@delete',]);
/*FIN RUTAS COMPRAS*/

/*RUTAS PARA EL DETALLE DE COMPRA*/
$router->get('detalle_compra/{id}',['as'=>'detalle_compra.index', 'uses'=>'DetalleCompraController@index',]);
$router->get('detalle_compra/{id}/delete',['as'=>'detalle_compra.delete', 'uses'=>'DetalleCompraController@delete',]);
/* FIN RUTAS PARA EL DETALLE DE COMPRA*/

// rutas proveedor
$router->get('proveedor/{id}/delete',['as'=>'proveedor.delete', 'uses'=>'ProveedorController@delete',]);
Route::Resource('proveedores','ProveedorController');

//Rutas del Producto
Route::resource( 'productos', 'ProductoController');
$router->get('producto/{id}/delete',['as'=>'producto.delete', 'uses'=>'ProductoController@delete',]);
$router->patch('producto/{id}',['as'=>'producto.update', 'uses'=>'ProductoController@update',]);
$router->patch('productos',['as'=>'productos.list', 'uses'=>'ProductoController@list',]);

