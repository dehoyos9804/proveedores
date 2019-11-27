<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Detalle_Compra;
use App\Models\Proveedor_Producto;

use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function index($id){
        $vardetalle = Compra::select('detalle_compras.id', 'detalle_compras.compra_id', 'productos.nombre as nombreproducto', 'proveedores.nombre','detalle_compras.cantidad','detalle_compras.valor_unitario')
                        ->from('detalle_compras')
                        ->join('proveedor_productos', function($query){
                            $query->on('proveedor_productos.id', '=','detalle_compras.proveedor_producto_id');
                        })
                        ->join('productos', function($query){
                            $query->on('productos.id','=','proveedor_productos.producto_id');
                        })
                        ->join('proveedores',function($query){
                            $query->on('proveedores.id','=', 'proveedor_productos.proveedor_id');
                        })
                        ->where('detalle_compras.compra_id','=',$id)->get();
        $varcompras = 1;
        return view('detallecompras.index')
            ->with('vardetalle',$vardetalle);
    }
}
