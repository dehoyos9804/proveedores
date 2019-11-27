<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Detalle_Compra;
use App\Models\Producto_Proveedor;

use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function index($id){
        $vardetalle = Compra::select('detalle_compras.id', 'detalle_compras.compra_id', 'productos.nombre as nombreproducto', 'proveedores.nombre','detalle_compras.cantidad','detalle_compras.valor_unitario')
                        ->from('detalle_compras')
                        ->join('producto_proveedor', function($query){
                            $query->on('producto_proveedor.id', '=','detalle_compras.producto_proveedor_id');
                        })
                        ->join('productos', function($query){
                            $query->on('productos.id','=','producto_proveedor.producto_id');
                        })
                        ->join('proveedores',function($query){
                            $query->on('proveedores.id','=', 'producto_proveedor.proveedor_id');
                        })
                        ->where('detalle_compras.compra_id','=',$id)->get();
        $varcompras = 1;
        return view('detallecompras.index')
            ->with('vardetalle',$vardetalle);
    }

    public function delete($id){
        $varcompra=Detalle_Compra::find($id);
        $varcompra->delete();
        return redirect()->route('detalle_compra.index');
    }
}
