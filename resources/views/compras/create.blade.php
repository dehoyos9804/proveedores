@extends('plantilla.plantilla')
@section('titulo','Admin °| laravel')
@section('contenido')
<div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" id="formventas" name="formventas" action="{{route('compra.store')}}" method="POST">
          <div class="panel panel-warning">
            @csrf
            <div class="panel-heading">
              <h3 class="panel-title"><span class="fa fa-user"></span><b> Compras</b></h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-10">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel  push-up-20">
                        <div class="panel-body panel-body-pricing">
                          <h2 class="text">Datos de la facturación</h2>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12"> Nro. Facturación</label>
                                <div class="col-md-12">                                            
                                    <div class="input-group">
                                      @empty($compra_id->id)
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="number" id="compra_id" name="compra_id" class="form-control" value="1" />
                                      @endempty
                                      @isset($compra_id->id)
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="number" id="compra_id" name="compra_id" class="form-control" value="{{$compra_id->id+1}}"/>
                                      @endisset
                                    </div>                                            
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                 <label class="col-md-12"> Fecha Venta</label>
                                 <div class="col-md-12">                                            
                                     <div class="input-group">
                                         <span class="input-group-addon">
                                             <span class="fa fa-calendar"></span>
                                         </span>
                                         <input type="text" class="form-control datepicker" name="fecha_compra" id="fecha_compra">
                                     </div>                                            
                                 </div>
                             </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label class="col-md-12 col-xs-12">Descripcion</label>
                                <div class="col-md-12">                                            
                                <textarea class="form-control" rows="2" name="descripcion" id="descripcion"></textarea>
                                </div>
                              </div> 
                          </div>
                        </div> 
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="panel  push-up-20">
                        <div class="panel-body panel-body-pricing">
                          <h2>Datos Del proveedor</h2>
                          <div class="col-md-12">
                             <div class="form-group">
                                 <label class="col-md-12 col-xs-12">proveedores</label>
                                 <div class="col-md-12">                                
                                     <select class="form-control select" id="proveedor" name="proveedor" data-live-search="true">
                                         <option selected>seleccione</option>
                                         @foreach($varproveedores as $key)
                                          <option value="{{$key->id}}_{{$key->direccion}}_{{$key->telefono}}_{{$key->pagina_web}}">{{$key->nombre}}</option>
                                         @endforeach
                                     </select>      
                                     <input type="hidden" name="idproveedor" id="idproveedor"></input>                                      
                                 </div>
                             </div>
                          </div>
                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                   <label class="col-md-12">Datos Adicionales Del Proveedor Seleccionado</label>
                                   <div class="col-md-12">                                            
                                       <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" id="cli_datocliente" name="cli_datocliente" class="form-control" placeholder="descripción" disabled />
                                       </div>                                            
                                   </div>
                               </div>
                            </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="panel  push-up-20">
                          <div class="panel-body panel-body-pricing">
                            <h3>Datos De La Entrada</h3>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">productos</label>
                                    <div class="col-md-12">
                                        <select class="form-control select" id="producto_id" name="producto_id" data-live-search="true">
                                          <option selected value="0">seleccione</option>
                                            @foreach($varproducto as $key)
                                              <option value="{{$key->id}}">{{$key->nombre}}</input></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-md-12">Cantidad</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                          <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="catidad de productos" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12">Precio</label>
                                    <div class="col-md-12">
                                        <input type="number" name="precio" id="precio" value="0,0" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-md-12">Descuento</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                              <span class="fa  fa-dollar"></span>
                                          </span>
                                          <input type="number" name="com_descuento" id="com_descuento" class="form-control" placeholder="descuento" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="btnAdicionar" name="btnAdicionar"  class="btn btn-info pull-right">
                                    <span class="fa fa-plus"></span>Adicionar
                                </button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info pull-right">
                                        <span class="fa fa-rotate-left"></span>Actualizar</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info pull-right" id="btnLimpiar" name="btnLimpiar">
                                        <span class="glyphicon glyphicon-trash"></span> Limpiar</button>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="panel  push-up-20">
                              <div class="panel-body panel-body-pricing">
                                  <h3>Detalle De La Venta</h3>
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                        <table id="table_detalle" class="table table-bordered table-striped table-actions">
                                             <thead>
                                                 <th width="50">#</th>
                                                 <th>producto</th>
                                                 <th width="100">cantidad</th>
                                                 <th width="100">Valor unitario</th>
                                                 <th width="100">descuento</th>
                                                 <th width="100">Valor Neto</th>
                                                 <th width="200" class="text-center">actions</th>
                                             </thead>
                                             <tfoot>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"><b>Total:</b></td>
                                                <td class="text-center">$<input type="number" name="deta_total" id="deta_total" class="text-center btn btn-sm"></td>
                                             </tfoot>
                                             <tbody>
                                               
                                             </tbody>
                                        </table> 
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          
                      </div>
                  </div>
                </div>
                  <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel  push-up-20">
                                <div class="panel-body panel-body-pricing">
                                  <h5><b>Datos De Pago</b></h5>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                           <label class="col-md-12">Subtotal</label>
                                           <div class="col-md-12">
                                               <div class="input-group">
                                                  <input type="number" name="col_subtotaldetalle" id="col_subtotaldetalle" class="form-control" placeholder="0.0" style="color: #1dc449;text-align: center;" disabled>
                                               </div>
                                           </div>
                                       </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Total Iva</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                              <input type="number" name="col_totaliva" id="col_totaliva" class="form-control" placeholder="0.0" style="color: #1dc449;text-align: center;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Total Descuento</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                              <input type="number" name="col_totaldescuento" id="col_totaldescuento" class="form-control" placeholder="0.0" style="color: #1dc449;text-align: center;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Neto A Pagar</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                              <input type="number" name="col_netoapagar" id="col_netoapagar" class="form-control" placeholder="0.0" style="color: #1dc449;text-align: center;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">saldo</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                              <input type="number" name="col_saldo" id="col_saldo" class="form-control" placeholder="0.0" style="color: #e50914;text-align: center;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel  push-up-20">
                                <div class="panel-body panel-body-pricing">
                                   
                                   <div class="form-group">
                                        <label class="col-md-12">Total efectivo</label>
                                        <div class="col-md-12">
                                          <div class="input-group">
                                            <input type="number" name="tr_totalefectivo" id="tr_totalefectivo" class="form-control" placeholder="0.0" style="color: #e50914;text-align: center;">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Devolver</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                              <input type="number" name="tr_devolver" id="tr_devolve" class="form-control" placeholder="0.0" style="color: #1dc449;text-align: center;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              </div>
              <div class="panel-footer" id="botones">
              <button type="submit" class="btn btn-info pull-right">Registrar Venta</button>
            </div>
          </div>
        </form>
      </div>
    </div>

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#btnAdicionar").click(function(){
        agregar();
      });

      $("#btnLimpiar").click(function(){
        limpiar();
      });
    });
    var contador=0;
    var total=0;
    var array_sumatotal=[];
    var totaldescuento=0;
    var array_sumadescuento=[];
    $("#botones").hide();/*botones ocultos al inicio*/    
    $("#proveedor").change(mostrarValoresProveedor);
    $("#com_comida").change(mostrarValoresComida);

    function mostrarValoresProveedor(){
      var datosCliente=document.getElementById('proveedor').value.split('_');
      $("#idproveedor").val(datosCliente[0]);
      $("#cli_datocliente").val(datosCliente[1]+" - "+datosCliente[2]+" - "+datosCliente[3]);
    }

    function mostrarValoresComida(){
      //var varcomida=$("#com_comida option:selected").val();
      //$("#com_idcomida").val(varcomida);
      var datosComida=document.getElementById('com_comida').value.split('_');
      $("#com_idcomida").val(datosComida[0]);
      $("#com_precio").val(datosComida[1]);

    }

    function agregar(){
      var producto_id =$("#producto_id").val();
      var producto=$("#producto_id option:selected").text();//escojo el texto del <select> que esta seleccionado
      var cantidad=$("#cantidad").val();
      var precio=$("#precio").val();
      var descuento=$("#com_descuento").val();
      if (producto!="" && cantidad>=0 && precio>=0 && descuento>=0) {
        array_sumatotal[contador]=(cantidad*precio);
        array_sumadescuento[contador]=descuento;
        totaldescuento=(totaldescuento+(array_sumatotal[contador]*array_sumadescuento[contador])/100)*cantidad;
        total =total+array_sumatotal[contador];

        /*var fila='<tr  id="trfila'+contador+'"><td><input type="hidden" name="idcomida[]" value="'+idcomida+'">'+idcomida+'</td><td><input type="hidden" name="comida[]" value="'+comida+'">'+comida+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td>'+array_sumatotal[cantidad]+'</td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td><button type="button" class="btn btn-danger btn-rounded btn-sm" onclick="eliminar('+contador+');"><span class="fa fa-times"></span></button></td></tr>';*/

        var fila='<tr id="trfila'+contador+'"><td class="text-center"><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+'</td><td class="text-center"><input type="hidden" name="producto[]" value=">'+producto+'">'+producto+'</td><td class="text-center"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td class="text-center"><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><td class="text-center"><input type="hidden" name="descuento[]" value="'+descuento+'">'+descuento+'</td><td class="text-center">'+array_sumatotal[contador]+'</td><td class="text-center"><a type="button" class="btn btn-danger btn-rounded btn-sm" onclick="eliminar('+contador+');"><b>X</b></a></td></tr>';
        contador++;
        limpiar();
        evaluar();
        $("#table_detalle").append(fila);//agrego una nueva fila en la tabla detalle
        $("#deta_total").val(total-totaldescuento);
        llenardatosTransversales(total,totaldescuento);

      }else{
        alert("Error. Por Favor llene todos los campos");
      }
    }

  function llenardatosTransversales(vartotal,vardescuento){
    $("#col_subtotaldetalle").val(vartotal);
    $("#col_totaliva").val("0,0");
    $("#col_totaldescuento").val(vardescuento);
    $("#col_netoapagar").val(vartotal-vardescuento);
    $("#col_saldo").val(vartotal);
  
    $("#tr_totalefectivo").val(vartotal);
    $("#tr_devolve").val(vartotal);
  }

/*funcion para limpiar los campos de Datos de entrada*/
    function limpiar(){
      $("#producto_id").val("");
      $("#cantidad").val("1");
      $("#precio").val("");
      $("#com_descuento").val("0");
    }

/*funcion para verificar si existe algun detalle en la venta, si no existe se ocultan los botones*/
    function evaluar(){
      if (total>0) {
        $("#botones").show();
      }else{
        $("#botones").hide();
      }
    }

    function eliminar(index){
      total=total-array_sumatotal[index];
      $("#deta_total").val(total);
      $("#trfila"+index).remove();
      $("#col_subtotaldetalle").val(total);
      $("#col_totaliva").val("0,0");
      $("#col_totaldescuento").val(total);
      $("#col_netoapagar").val(total);
      $("#col_saldo").val(total);

      $("#tr_totalefectivo").val(total);
      $("#tr_devolve").val(total);
      evaluar();
    }
  </script>
@endpush
@endsection

@section('menu')
  @include('plantilla.menu')
@endsection

@section('titlepage')
  <a href="{{route('compra.index')}}"><h2><span class="fa fa-arrow-circle-o-left"></span> <b>Registrar Compras</b></h2></a>
@endsection

@section('men')
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
@endsection