<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{

    function _construct()
    {
        $this->milddleware('permission:proveedor-list');
        $this->milddleware('permission:proveedor-create',['only'=>['create','store']]);
        $this->milddleware('permission:proveedor-edit',['only'=>['edit','update']]);
        $this->milddleware('permission:proveedor-delete',['only'=>['delete']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Proveedor::all();
        return view('proveedores.index',['proveedores'=>$proveedores]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores=Proveedor::all();
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=$request->all();
        $proveedores = new Proveedor;
        $proveedores->id=$request->input('id');
        $proveedores->nombre=$request->input('nombre');
        $proveedores->direccion=$request->input('direccion');
        $proveedores->contacto=$request->input('contacto');
        $proveedores->telefono=$request->input('telefono');
        $proveedores->pagina_web=$request->input('pagina_web');
        $proveedores->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedor::find($id);
        return view('proveedores.editar')->with('proveedores',$proveedor);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor=Proveedor::find($id);
        $datos=array();
        $datos['nombre']=$request->input('nombre');
        $datos['direccion']=$request->input('direccion');
        $datos['contacto']=$request->input('contacto');
        $datos['telefono']=$request->input('telefono');
        $datos['pagina_web']=$request->input('pagina_web');
        $proveedor->update($datos);
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores.index'); 
    }
}
