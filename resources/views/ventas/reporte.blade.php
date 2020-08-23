@extends('layout.templatereporte')
@section('title', 'Reporte de Venta')

@section('content')
<div class="row page-titles">
    <p> <strong>Datos de la Venta<strong></p>
        <div class="container">
            <div class="row">
              <div class="col">Nit: {{ $venta->nit}} </div>
              <div class="col">Fecha: {{ $venta->fecha}}</div>
              <div class="w-100"></div>
              <div class="col">Hora: {{ $venta->hora}}</div>
              <div class="col">Cliente: {{ $venta->cliente->nombre . ' '  . $venta->cliente->apellido }} </div>
            </div>
          </div>
</div>
<p> <strong>Detalle de la venta <strong></p>
    <table class="fl-table">
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
            @foreach ($detalles as $detalle)
            <tr>
                <th>1   </th>
                <th>{{$detalle->producto->nombre}}</th>
                <th>{{$detalle->cantidad}}</th>
                <th>{{$detalle->precio. ' Bs.'}}</th>
                <th>{{$detalle->subtotal .  'Bs.'}}</th>
                @php
                $contador++;   
               @endphp
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th><h5 id="total">{{ $venta->total . ' Bs.'}}</h5></th>
            </tr>
        </tfoot>
    </table>
@endsection