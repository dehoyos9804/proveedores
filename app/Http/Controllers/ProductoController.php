<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Producto_Proveedor;
use App\Htttp\Requests\ProductoRequest;


use Illuminate\Http\Request;

class ProductoController extends Controller
{


   function _construct()
   {
       $this->milddleware('permission:productos-list');
       $this->milddleware('permission:productos-create',['only'=>['create','store']]);
       $this->milddleware('permission:productos-edit',['only'=>['edit','update']]);
       $this->milddleware('permission:productos-delete',['only'=>['delete']]);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto_Proveedor::select('productos.id','productos.nombre', 'productos.descripcion','categorias.nombre as nombrecategoria', 'proveedores.nombre as nombreproveedor')
        ->from('producto_proveedor')
        ->join('productos', function($query){
            $query->on('productos.id', '=','producto_proveedor.producto_id');
        })
        ->join('proveedores', function($query){
            $query->on('proveedores.id', '=', 'producto_proveedor.proveedor_id');
        })
        ->join('categorias', function($query){
            $query->on('categorias.id', '=', 'productos.categoria_id');
        })->get();
        return view('productos.index',['productos'=>$productos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $proveedor=Proveedor::all();
        $categoria=Categoria::all();
        $productos=Producto::all();
        return view('productos.create')
        ->with('proveedores',$proveedor)
        ->with('categorias',$categoria);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        
        $datos=$request->all();
        $productos = new Producto;
        $productos->nombre=$request->input('nombre');
        $productos->descripcion=$request->input('descripcion');
        $productos->categoria_id=$request->input('categoria_id');
        //$productos->proveedor_id=$request->input('proveedor_id');
        $productos->save();
    
        $proveedor = Proveedor::find($request->input('proveedor_id'));
        $productos->proveedores()->attach($proveedor);
        return redirect()->action('ProductoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedor::all();
        $categoria=Categoria::all();
        $productos=Producto::find($id);
        return view('productos.editar')->with('productos',$productos)
        ->with('proveedores',$proveedor)
        ->with('categorias',$categoria);
    }

    public function list(){
        $result = Producto::join('producto_proveedor', 'producto.id', '=', 'producto_proveedor.producto_id')
        ->join('producto_proveedor', 'proveedor.proveedor_id', '=', 'producto_proveedor.id')
        ->select('producto_proveedor.proveedor_id')
        ->get();
        return view('productos.index',['result'=>$result]);

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $productos=Producto::find($id);
        $datos=array();
        $datos['nombre']=$request->input('nombre');
        $datos['descripcion']=$request->input('descripcion');
        $datos['categoria_id']=$request->input('categoria_id');
        $productos->update($datos); 
        
        $proveedor = Proveedor::find($request->input('proveedor_id'));
        $proveedor->productos()->detach($proveedor);
        $productos->proveedores()->attach($proveedor);
        return redirect()->action('ProductoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $productos = Producto::find($id);
        $productos->delete();
        return redirect()->route('productos.index');
    }
}
