@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Informe de compras</h2>
                <div class="btn-group pull-right">
                    <a href="{{route('compra.create')}}" class="btn btn-danger"><i class="fa fa-bars"></i>Nueva Compra</a>
                </div>                                                       
            </div>
            <div class="panel-body list-group list-group-contacts">                                
                <!-- START RESPONSIVE TABLES -->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                        <table class="table datatable table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">ventas</th>
                                                    <th width="220">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                @foreach($varcompras as $key)                                        
                                                    <tr id="trow_1">
                                                        <td class="list-group">
                                                            <a href="{{route('detalle_compra.index',['id'=>$key->id])}}" class="list-group-item">
                                                                <img src='{{url("/admin-lte")}}/assets/images/users/carrito.png' class="pull-left" alt="Nadia Ali"/>
                                                                <span class="contacts-title"># venta:{{$key->id}}  Fecha: {{$key->fecha}} <strong>Proveedor:</strong> {{$key->nombre}}</span>
                                                                <p>{{$key->descripcion}}</p>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <!--<button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>-->
                                                            <a class="btn btn-danger btn-rounded btn-sm" href="{{route('compra.delete',['id'=>$key->id])}}"><span class="fa fa-times"></span></a>
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