@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Productos</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('productos.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nuevo Producto
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
                    <th scope="col">Precio (Bs.)</th>
                    <th scope="col">Cantidad Stock</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                <tr>
                    <th>{{$producto->nombre}}</th>
                    <th>{{$producto->precio }}</th>
                    <th>{{$producto->stock}}</th>
                    <th>{{$producto->categoria->nombre }}</th>
                
                    <td>
                        <form action="{{route('productos.delete',$producto->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        <button data-toggle="tooltip" title= "Eliminar veterinario" type="submit" type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $productos->links() }}
            <p class="text-muted">Mostrando <strong>{{ $productos->count() }}</strong> registros de <strong>{{$productos->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(5)}}
</div>
@endsection
