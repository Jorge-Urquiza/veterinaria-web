@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Categorias</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('categorias.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nuevo Categoria
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
                    <th scope="col">Descripcion</th>
                   
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <th>{{$categoria->nombre}}</th>
                    <th>{{$categoria->descripcion }}</th>
                
                    <td>
                        <form action="{{route('categorias.delete',$categoria->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        <button data-toggle="tooltip" title= "Eliminar veterinario" type="submit" type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $categorias->links() }}
            <p class="text-muted">Mostrando <strong>{{ $categorias->count() }}</strong> registros de <strong>{{$categorias->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(4)}}
</div>
@endsection
