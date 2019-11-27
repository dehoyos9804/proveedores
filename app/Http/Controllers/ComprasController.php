<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Compra;
use App\Models\Detalle_Compra;
use App\Models\Producto_Proveedor;
use App\Htttp\Requests\CompraRequest;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index(){
        $varcompras = Compra::select('compras.id', 'compras.fecha', 'compras.descripcion', 'proveedores.nombre')
                        ->from('compras')
                        ->join('proveedores', function($query){
                            $query->on('proveedores.id', '=','compras.proveedor_id');
                        })->get();
        return view('compras.index')
            ->with(['varcompras'=>$varcompras]);
    }

    public function create(){
        $varprovedor_producto = Producto_Proveedor::all();
        $varproducto = Producto_Proveedor::select('producto_proveedor.id', 'productos.nombre')
                        ->from('producto_proveedor')
                        ->join('productos', function($query){
                            $query->on('productos.id', '=','producto_proveedor.producto_id');
                        })->get();
        $varproveedores=Proveedor::all();
        $compra_id=Compra::all()->last();
        return view('compras.create')
        ->with(['varproducto'=>$varproducto,
                'varproveedores'=>$varproveedores,
                'compra_id'=>$compra_id]);
    }

    public function store(Request $request){

        $compra=new Compra;
        $compra->fecha=$request->input('fecha_compra');
        $compra->descripcion=$request->input('descripcion');
        $compra->proveedor_id=$request->input('idproveedor');
        $compra->save();

        $compra_id = $compra->id;
        $codproveedor_producto=$request->input('producto_id');
        $cantidad=$request->input('cantidad');
        $valor_unitario = $request->input('precio');


        $contador=0;
        /*$detalle=new DetalleVenta;
        $detalle->cod_venta=$request->input('idventa');
        $detalle->cod_comida=$cod_comida[$contador];
        $detalle->cantidad=$cantidad[$contador];
        $detalle->save();
        //dd(count($cod_comida));*/

        while ($contador < count($codproveedor_producto)) {
            $detalle=new Detalle_Compra;

            $detalle->compra_id=$compra_id;
            
            $detalle->producto_proveedor_id=$codproveedor_producto[$contador];
            $detalle->cantidad=$cantidad[$contador];
            $detalle->valor_unitario=$valor_unitario[$contador];
            $detalle->save();
            

            $contador=$contador+1;
        }

        return redirect()->route('compra.index');

    }

    public function delete($id){
        $varcompra=Compra::find($id);
        $varcompra->delete();
        return redirect()->route('compra.index');
    }
}
