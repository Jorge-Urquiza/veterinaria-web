@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
            <center>
                <h3 class="mb-0">Detalle de la Venta # {{$venta->id}}</h3>
            </center>
        </div>
      </div>
    </div>

    <div class="card-body" role="alert">
        <div class="alert alert-success" role="alert"> 
      
            <ul>
        
                <li>
                    <strong>NIT: </strong>{{ $venta->nit}}
                </li>
                <li>
                    <strong>Fecha: </strong>{{ $venta->fecha}}
            
                </li>

                <li>
                    <strong>Hora: </strong>{{ $venta->hora}}
                </li>
                
                <li>
                    <strong>Cliente: </strong>{{ $venta->cliente->nombre . ' '  . $venta->cliente->apellido }}
                </li>

                <li>
                    <strong>Veterinario: </strong>{{ $venta->veterinario->nombre . ' '  . $venta->veterinario->apellido }}
                </li>
                <li>
                    <strong>Total Venta : </strong>{{ $venta->total . ' Bs.'}}
                </li>
            </ul>
        </div>    

      
            <p> <strong>Acerca de la la venta <strong></p>
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
                            <th>{{$contador}}</th>
                            <th>{{$detalle->producto->nombre}}</th>
                            <th>{{$detalle->cantidad}}</th>
                            <th>{{$detalle->precio. ' Bs.'}}</th>
                            <th>{{$detalle->subtotal .  'Bs.'}}</th>
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
                <div class="card-footer clearfix">
                    {{ $detalles->links() }}
                    <p class="text-muted">Mostrando <strong>{{ $detalles->count() }}</strong> registros de <strong>{{$detalles->total() }}</strong> totales</p>
                </div>  

        <a href="{{route('ventas.index')}}" class="btn btn-primary">Volver</a>
   </div>
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(6)}}
</div>
@endsection
