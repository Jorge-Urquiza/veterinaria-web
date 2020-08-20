@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Detale de la Atención # {{$atencion->id}}</h3>
        </div>
      </div>
    </div>
    <div class="card-body" role="alert">
        <ul>
            <li>
                <strong>Fecha: </strong>{{ $atencion->fecha}}
            </li>
            <li>
                 <strong>Hora: </strong>{{ $atencion->hora}}
            </li>
          
            <li>
                <strong>Mascota: </strong>{{ $atencion->mascota->nombre}}
           </li>
            
            <li>
                 <strong>Veterinario: </strong>{{ $atencion->veterinario->nombre}}
            </li>
            <li>
                <strong>Tipo: </strong>{{ $atencion->tipo}}
           </li>
        </ul>
        <div class="alert alert-success" role="alert">
            <p> <strong>Acerca de la atencion<strong></p>
            <ul>
                <li>
                    <strong>Problema(s): </strong>{{ $atencion->problema}}
                </li>
                <li>
                    <strong>Diagnostico: </strong>{{ $atencion->diagnostico}}
                </li>
                <li>
                    <strong>Tratamiento: </strong>{{ $atencion->tratamiento}}
                </li>
     
            </ul>
        </div>
    <a href="{{route('atenciones.index')}}" class="btn btn-primary">Volver</a>
   </div>
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(7)}}
</div>
@endsection
