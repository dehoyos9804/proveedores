@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Informe de categorias</h2>
                <div class="btn-group pull-right">
                    <a href="{{route('categoria.create')}}" class="btn btn-danger"><i class="fa fa-bars"></i>Nueva categoria</a>
                </div>                                                       
            </div>
            <div class="panel-body panel-body-table">                                
                <!-- START RESPONSIVE TABLES -->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                        <table class="table datatable table-bordered table-striped table-actions">
                                            <thead> 
                                                <tr>
                                                    <th width="90">id</th>
                                                    <th class="text-center">Categoria</th>
                                                    <th width="200">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                @foreach($categorias as $categoria)
                                              <tr>
                                                <td>{{$categoria->id}}</td>
                                                <td>{{$categoria->nombre}}</td>
                                                <td>
                                                  <a href="{{route('categoria.editar',['id'=>$categoria->id])}}" class="btn btn-info btn-sm">Editar</a>
                                                  <a href="{{route('categoria.delete',['id'=>$categoria->id])}}" class="btn btn-danger btn-sm">Eliminar</a>
                                                </td>
                                              </tr>
                                            @endforeach
                                            </tbody>
                                        </table>                               
                                </div>
                            </div>                                                
                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->                                        
            </div>
        </div>
    </div>
</div>
<!-- END RESPONSIVE TABLES -->
@endsection

@section('menu')
  @include('plantilla.menu')
@endsection

@section('titlepage')
  <h2><span class="fa fa-arrow-circle-o-left"></span> <b>Categorias</b></h2>
@endsection

@section('men')
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
@endsection