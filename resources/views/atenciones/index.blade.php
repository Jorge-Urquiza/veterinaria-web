@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Atenciones</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('atenciones.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nueva atencion
                    </span>
                </a>  
              </div>
            </div>
        </div>
        <div class="card-body" role="alert">
            @if(session('notification'))
             <div class="alert alert-success" role="alert">
               <strong>Success!</strong> {{session('notification')}}
             </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tipo de atención</th>
                    <th scope="col">Mascota </th>
                    <th scope="col">Veterinario </th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($atenciones as $atencion)
                <tr>
                    <th>{{$atencion->fecha }}</th>
                    <th>{{$atencion->hora }}</th>
                    <th>{{$atencion->tipo}}</th>
                    <th>{{$atencion->mascota->nombre}}</th>
                    <th>{{$atencion->veterinario->nombre . ' ' . $atencion->veterinario->apellido}}</th>
                    <td>
                        <form action="{{route('atenciones.delete',$atencion->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('atenciones.show', $atencion->id)}}" class="btn btn-success btn-sm">Ver</a>
                          <a href="{{route('atenciones.pdf', $atencion->id)}}" class="btn btn-info btn-sm">imprimir</a>
                          <a href="{{route('atenciones.edit',$atencion->id)}}" class="btn btn-primary btn-sm">Editar</a>
                          @if(auth()->user()->rol === 'director')
                          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                          @endif
                        </form>
                    </td>
                  
                   
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $atenciones->links() }}
            <p class="text-muted">Mostrando <strong>{{ $atenciones->count() }}</strong> registros de <strong>{{$atenciones->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(7)}}
</div>
@endsection
