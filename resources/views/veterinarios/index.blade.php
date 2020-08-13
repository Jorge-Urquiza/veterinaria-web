@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="#">
            <button type="button" class="btn btn-primary">Registrar Veterinario</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">CI</th>
                <th scope="col">Celular</th>
                <th scope="col">Direccion</th>
                <th scope="col">Email</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($veterinarios as $veterinario)
            <tr>
                <th>{{$veterinario->id}}</th>
                <th>{{$veterinario->nombre}}</th>
                <th>{{$veterinario->apellido}}</th>
                <th>{{$veterinario->ci}}</th>
                <th>{{$veterinario->celular}}</th>
                <th>{{$veterinario->direccion}}</th>
                <th>{{$veterinario->email}}</th>

                <td>
                    <a href="#"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="#" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(3)}}</h6>
    </div>
@endsection
