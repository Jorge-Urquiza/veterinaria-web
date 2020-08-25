@extends('layout.app')

@section('content')
<div class="card shadow">
    
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Veterinarios</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('veterinarios.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nuevo Veterinario
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
                    <th scope="col">Apellidos</th>
                    <th scope="col">CI</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($veterinarios as $veterinario)
                <tr>
                 
                    <th>{{$veterinario->nombre}}</th>
                    <th>{{$veterinario->apellido}}</th>
                    <th>{{$veterinario->ci}}</th>
                    <th>{{$veterinario->celular}}</th>
                    <th>{{$veterinario->direccion}}</th>
                    <th>{{$veterinario->email}}</th>
                    <th>{{$veterinario->rol}}</th>
                    <td>
                        <form action="{{route('veterinarios.delete',$veterinario->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('veterinarios.delete',$veterinario->id)}}" class="btn btn-primary btn-sm">Editar</a>
                          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                    
                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $veterinarios->links() }}
            <p class="text-muted">Mostrando <strong>{{ $veterinarios->count() }}</strong> registros de <strong>{{$veterinarios->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')

<div class="alert alert-dark" role="alert">
    
    {{Auth()->user()->showCounter(3)}}
</div>
@endsection
