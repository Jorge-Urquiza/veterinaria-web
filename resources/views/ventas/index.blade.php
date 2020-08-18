@extends('layout.app')
@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Lista de Ventas</h3>
              </div>
              <div class="col text-right">
                <a  href="{{route('ventas.create')}}" class="btn btn-sm btn-success">
                    <span>
                        <i class="fa fa-plus"></i> Nueva Venta
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
                    <th scope="col">NIT</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Veterinario</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total (Bs.)</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ventas as $venta)
                <tr>
                    @if($venta->nit)
                        <th>{{$venta->nit}}</th>
                    @else
                     <th>Sin NIT</th>
                    @endif
                    <th>{{$venta->cliente_id}}</th>
                    <th>{{$venta->veterinario_id }}</th>
                    <th>{{$venta->fecha}}</th>
                    <th>{{$venta->total}}</th>
                
                    <td>
                        <form action="{{route('ventas.delete',$venta->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('ventas.edit', $venta->id)}}" class="btn btn-primary btn-sm">Editar</a>
                        <button data-toggle="tooltip" title= "Eliminar veterinario" type="submit" type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $ventas->links() }}
            <p class="text-muted">Mostrando <strong>{{ $ventas->count() }}</strong> registros de <strong>{{$ventas->total() }}</strong> totales</p>
        </div>  
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(6)}}
</div>
@endsection
