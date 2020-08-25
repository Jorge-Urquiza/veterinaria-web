@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Clientes</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('clientes.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nuevo Cliente
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
                    <th scope="col">Apellido</th>
                    <th scope="col">CI</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <th>{{$cliente->nombre}}</th>
                    <th>{{$cliente->apellido}}</th>
                    <th>{{$cliente->ci}}</th>
                    <th>{{$cliente->genero}}</th>
                    <th>{{$cliente->celular}}</th>
                    <th>{{$cliente->edad}}</th>
                    <td>
                        <form action="{{route('clientes.delete',$cliente->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
                          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $clientes->links() }}
            <p class="text-muted">Mostrando <strong>{{ $clientes->count() }}</strong> registros de <strong>{{$clientes->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(1)}}
</div>
@endsection
