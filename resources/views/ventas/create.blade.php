@extends('layout.app')
@section('content')
{!! Form::open(['route'=>['ventas.store'] ]) !!}
<div class="card shadow">
      <div class="card-header border-0">
          <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Nueva Venta</h3>
              </div>
              <div class="col text-right">
                  <a href="{{route('ventas.index')}}" class="btn btn-danger"><i class="fa fa-reply"></i> Salir</a>
                </a>
              </div>
          </div>
      </div>
      <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach ($errors->all() as $error )
                      <li>{{$error}}</li>
                  @endforeach
              </ul>
            </div>
            @endif  
           


          <div class="row">
            <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="">NIT</label>
                    <input type="number" name="nit" class="form-control" placeholder="" 
                    value="{{old('nit')}}"  required>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                  <label for="">Fecha</label>
                  {{Form::date('fecha', \Carbon\Carbon::now() , ['class'=> 'form-control']) }}
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  {{Form::label('veterinario','Veterinario:')}}
                  {!! Form::select('veterinario_id', $veterinarios, null, ['placeholder' => 'Seleccionar Veterinario'
                  ,'class' => 'form-control selectpicker',
                                              'title' => 'Seleccionar', 'data-live-search' => 'true' ,  'required' => true]) !!}
                </div>  
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                {{Form::label('cliente','Cliente (Comprador):')}}
                {!! Form::select('cliente_id', $clientes, null, [ 'placeholder' => 'Seleccionar Cliente'
                ,'class' => 'form-control selectpicker',
                                            'title' => 'Seleccionar', 'data-live-search' => 'true' ,  'required' => true]) !!}
              </div>
            </div>  
         </div>
      </div>
</div>
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Detalle Venta</h3>
        </div>
    </div>
</div>
    <div class="card-body">
        <div class="row">
          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
              {{Form::label('veterinario','Producto:')}}
              {!! Form::select('producto', $productos, null, ['class' => 'form-control selectpicker', 
               'placeholder'=>'Seleccionar producto', 'data-live-search' => 'true' , 
                                           'id' => 'producto_id']) !!}
            </div>  
          </div>  
          <div class="col-lg-2 col-sm-2  col-md-2  col-xs-12">
            <div class="form-group">
                    <label for="">Precio compra (Sugerido)</label>
                    <input id="pcompra"  type="number" name="precio_sugerido" class="form-control" placeholder="" 
                    value="{{old('precio')}}" readonly >
            </div>  
          </div>  
          <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number"  class="form-control" placeholder="" 
                    value="{{old('nit')}}"   id="pcantidad" >
            </div>  
          </div>  
          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                    <label for="">Precio Venta</label>
                    <input type="number" name="precio_venta" class="form-control" placeholder="" 
                    id="pventa"
                    value="{{old('nit')}}"  >
            </div>  
          </div> 
          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
              <button type="button" class="btn btn-primary" id="btn_add">Agregar</button>     
            </div>  
          </div> 
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                  <thead style="background-color:#36B6CA">
                      <th style="color:#FFFFFF"; >Opciones</th>
                      <th style="color:#FFFFFF"; >Producto</th>
                      <th style="color:#FFFFFF";>Precio compra</th>
                      <th style="color:#FFFFFF";>Cantidad</th>
                      <th style="color:#FFFFFF";>Precio venta</th>
                      <th style="color:#FFFFFF";>Subtotal</th>
                  </thead>
                  <tfoot>
                      <th>TOTAL</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><h5 id="total">0.00 (Bs.)</h5></th>
                  </tfoot>
                  <tbody>

                  </tbody>
              </table>
          </div> 
        </div>
        <div class="row">
          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" id="guardar">
             <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button>        
              </div>  
          </div>
        </div>
     </div>  
</div>
{!! Form::close()!!}
@push('scripts')
<script>
//JQUERY 
$(document).ready(function(){
  
  $('#guardar').hide();
//Eventos
  $('#producto_id').on('change', function() {
    completarPrecio($("#producto_id option:selected").val());
  });

  $( "#btn_add" ).click(function() {
    
      agregar();
  });
   
});

var index= 0;
var total = 0;
var subtotal=[];

  function agregar() {
 
      product_id = $("#producto_id option:selected").val()
      producto = $("#producto_id option:selected").text()
      cantidad = $("#pcantidad").val();
      compra = $("#pcompra").val();
      venta = $("#pventa").val();
      if(producto != "" && cantidad != "" && compra != "" && venta != ""){
    
        subtotal[index] =  (cantidad*venta);
        total= total + subtotal[index];
        var fila='<tr class = "selected" id="fila'+index+'"><td><button type="button" class="btn btn-danger" onClick="eliminar('+index+')">X</button></td><td><input type="hidden" name="productoid[]" value ="'+product_id+'">'+producto+'</td><td><input type="number" name="compra[]" readonly value="'+compra+'"></td><td><input type="number" readonly name="cantidad[]" value ="'+cantidad+'"></td><td><input type="number" readonly name="precio[]" value="'+venta+'"></td><td>'+subtotal[index]+'</td></tr>';
        $("#detalle").append(fila);
        $('#total').html(total+ " Bs.");
        index++;
        evaluar();
        limpiar();
      
      }else{
          alert("Error al ingresar los detalles de la venta, Revise los datos del producto")
      }
  }
  function evaluar(){
    if(total >0){
      $('#guardar').show();
    }else{
      $('#guardar').hide();
    }
 }
 function limpiar() {
    $('#producto_id option').prop('selected', function() {
                return this.defaultSelected;
            });
    $('#pcompra').val("");
    $('#pcantidad').val("");
    $('#pventa').val("");
}
function eliminar(index) {
    total = total - subtotal[index];
    $("#fila" + index).remove();
    $('#total').html(total+ " Bs.");
    // para escodner los botones si se borro todo el detalle
    evaluar();
}

function completarPrecio(id) {
    var url = "{{ route('productos.precio',':id') }}";
    url = url.replace(':id', id)
    $.ajax({
        url: url,
        type: "GET",
        success: function(data) {
            $('#pcompra').val(data.precio);
        },
        error: function() {
            alert("Seleccione un producto valido");
        }
    });
}

</script>

@endpush
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(6)}}
</div>
@endsection
