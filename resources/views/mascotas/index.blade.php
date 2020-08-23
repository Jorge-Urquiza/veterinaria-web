@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Mascotas</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('mascotas.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nueva Mascota
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Color</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Dueño</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mascotas as $mascota)
                <tr>
                    <th>{{$mascota->nombre}}</th>
                    <th>{{$mascota->raza}}</th>
                    <th>{{$mascota->color}}</th>
                    <th>{{$mascota->tipo}}</th>
                    <th>{{$mascota->cliente->nombre}}</th>
                    <td> 
                        <a href="{{route('mascotas.edit',$mascota->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{route('mascotas.delete',$mascota->id)}}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $mascotas->links() }}
            <p class="text-muted">Mostrando <strong>{{ $mascotas->count() }}</strong> registros de <strong>{{$mascotas->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(2)}}
</div>
@endsection
