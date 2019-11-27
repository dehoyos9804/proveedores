<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        
        //return csrf_token();
        $categorias=Categoria::all();
        return view('categorias.index' ,['categorias'=>$categorias]);
    }

	public function create(){
        $categorias=Categoria::all();
        return view('categorias.create');
    }

    public function store(Request $request){
        $categorias = new Categoria;
        $categorias->nombre = $request->input('nombre');
        $categorias->save();
        return redirect()->route('categoria.index');
    }

    public function edit($id){
        $categoria=Categoria::find($id);
        return view('categorias.editar')->with('categoria',$categoria);
    }

    public function update(Request $request,$id){
        $categoria=Categoria::find($id);
        $datos=array();
        $datos['nombre']=$request->input('nombre');
        $categoria->update($datos);
        return redirect()->route('categoria.index');
    }

    public function delete($id){
        $categoria=Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
