@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Informe de productos</h2>
                <div class="btn-group pull-right">
                    <a href="{{ route('productos.create') }}" class="btn btn-danger"><i class="fa fa-bars"></i>Nuevo Producto</a>
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
                                                    <th width="50">id</th>
                                                    <th>nombre</th>
                                                    <th>descripcion</th>
                                                    <th width="100">categoria</th>
                                                    <th width="100">Proveedor</th>
                                                    <th width="120">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>  
                                            @foreach($productos as $producto)
                                            <tr>
                                                <td>{{$producto->id}}</td>
                                                <td>{{$producto->nombre}}</td>
                                                <td>{{$producto->descripcion}}</td>
                                                <td>{{$producto->nombrecategoria}}</td>
                                                <td>{{$producto->nombreproveedor}}</td>  
                                                <td>
                                               
                                                <a href="{{ route('productos.edit',['id'=>$producto->id]) }}"><button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                        
                                                <a href="{{ route('producto.delete',['id'=>$producto->id]) }}"><button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                               
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
  <h2><span class="fa fa-arrow-circle-o-left"></span> <b>Productos</b></h2>
@endsection

@section('men')
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
@endsection