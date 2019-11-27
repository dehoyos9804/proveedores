@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Informe Detalle De Compra</h2>                                                      
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
                                                    <th width="50">Numero Compra</th>
                                                    <th>Proveedor</th>
                                                    <th>producto</th>
                                                    <th width="100">cantidad</th>
                                                    <th width="100">valor unitario</th>
                                                    <th width="120">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                @foreach($vardetalle as $key)                                          
                                                <tr id="trow_1">
                                                    <td class="text-center">{{$key->id}}</td>
                                                    <td><strong>{{$key->nombre}}</strong></td>
                                                    <td><span class="label label-success">{{$key->nombreproducto}}</span></td>
                                                    <td>{{$key->cantidad}}</td>
                                                    <td>{{$key->valor_unitario}}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-times"></span></button>
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