@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Informe de proveedores</h2>
                <div class="btn-group pull-right">
                    <a href="{{route('proveedores.create')}}" class="btn btn-danger"><i class="fa fa-bars"></i>Nuevo Proveedor</a>
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
                                                    <th width="100">direccion</th>
                                                    <th width="100">contacto</th>
                                                    <th width="100">telefono</th>
                                                    <th width="200">pagina web</th>
                                                    <th width="120">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <tr id="trow_1">

                                                @foreach($proveedores as $proveedor)
                                             <tr>
                                                <td>{{$proveedor->id}}</td>
                                                <td>{{$proveedor->nombre}}</td>
                                                <td>{{$proveedor->direccion}}</td>
                                                <td>{{$proveedor->contacto}}</td>
                                                <td>{{$proveedor->telefono}}</td>
                                                <td>{{$proveedor->pagina_web}}</td>
                                                <td>
                                               
                                                <a href="{{route('proveedores.edit',['id'=>$proveedor->id])}}">  <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                
                                               
                                                <a href="{{route('proveedor.delete',['id'=>$proveedor->id])}}"> <button  class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                              
                                                </td>
                                            </tr>
                                            @endforeach    
                                             </tr>
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
  <h2><span class="fa fa-arrow-circle-o-left"></span> <b>Proveedores</b></h2>
@endsection

@section('men')
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
@endsection