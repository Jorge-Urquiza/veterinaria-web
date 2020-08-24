@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modificar Venta</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('ventas.index')}}" class="btn btn-sm btn-danger">
                  Cancelar y volver
              </a>
            </div>
        </div>
    </div>
    {!! Form::model($venta,['route'=>['ventas.update',$venta->id]]) !!}
    @method('PUT')
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
                      {{Form::number('nit', null , ['class'=> 'form-control', 'required'=>true])}}
                  </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="">Fecha</label>
                    {{Form::date('fecha', null , ['class'=> 'form-control', 'required'=>true]) }}
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="">Hora</label>
                    {{Form::time('hora',date('H:i:s'), ['class'=> 'form-control' , 'required' => true]) }}
                </div>
              </div>
           </div>
         
           <div class="row">
              <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  {{Form::label('veterinario','Veterinario:')}}
                  {!! Form::select('veterinario_id', $veterinarios, null, ['class' => 'form-control selectpicker', 
                  'placeholder'=>'Seleccionar veterinario', 'data-live-search' => 'true' , 
                                       'id' => 'cliente_id' , 'required' => true]) !!}
                </div>  
              </div>
              <div div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    {{Form::label('cliente','Cliente (Comprador):')}}
                    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control selectpicker', 
                      'placeholder'=>'Seleccionar cliente', 'data-live-search' => 'true' , 
                                           'id' => 'cliente_id' , 'required' => true]) !!}
                  </div>
              </div>
            </div>
      </div>
      <div class="card-body">
        <center>  
          <h3> <strong>Detalles de la la venta <strong></h3>
        </center>
        
          <div class="table-responsive">
              <table class="table">
                  <thead>
                    
                      @php
                       $contador=1;   
                      @endphp
                  <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Subtotal</th>                
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($detalles as $detalle)
                  <tr>
                  <td><input value="{{$contador}}" disabled></td>
                  <td><input value="{{$detalle->producto->nombre}}" disabled></td>
                  <td><input value="{{$detalle->cantidad}}" disabled></td>
                  <td><input value="{{$detalle->precio. ' Bs.'}}" disabled></td>
                  <td><input value="{{$detalle->subtotal .  'Bs.'}}" disabled></td>
                      @php
                       $contador++;   
                      @endphp
                  </tr>
                  @endforeach
                  <tfoot>
                      <th>TOTAL</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><h5 id="total">{{ $venta->total . ' Bs.'}}</h5></th>
                  </tfoot>
                  </tbody>
              </table>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-success">Actualizar</button>
          </div>
          
          <div class="card-footer clearfix">
              {{ $detalles->links() }}
              <p class="text-muted">Mostrando <strong>{{ $detalles->count() }}</strong> registros de <strong>{{$detalles->total() }}</strong> totales</p>
          </div>  
          
       
      </div>  
    
 
      {!! Form::close()!!} 
</div>



@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(6)}}
</div>
@endsection