@extends('layout.templatereporte')
@section('title', 'Atención #' . $atencion->id)

@section('content')
<div class="row page-titles">
    <p> <strong>Datos de la atención<strong></p>

</div>
<div class="table-wrapper">
    <div class="card-body" role="alert">
        <ul>
            <li>
                <strong>Fecha de atención: </strong>{{ $atencion->fecha}}
            </li>
            <li>
                 <strong>Hora: </strong>{{ $atencion->hora}}
            </li>
          
            <li>
                <strong>Mascota: </strong>{{ $atencion->mascota->nombre}}
           </li>
            
            <li>
                 <strong>Veterinario: </strong>{{ $atencion->veterinario->nombre . ' ' . $atencion->veterinario->apellido}}
            </li>
            <li>
                <strong>Tipo : </strong>{{ $atencion->tipo}}
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
        
   </div>
</div>
@endsection
