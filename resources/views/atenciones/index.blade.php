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
                        <i class="fa fa-plus"></i> Nuevo atencion
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
                    <th>{{$atencion->tipo}}</th>
                    <th>{{$atencion->mascota_id }}</th>
                    <th>{{$atencion->veterinario_id }}</th>
                    <td>
                        <form action="{{route('atenciones.delete',$atencion->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('atenciones.show', $atencion->id)}}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{route('atenciones.edit', $atencion->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        <button data-toggle="tooltip" title= "Eliminar Atencion" type="submit" type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
