@extends('layout.app')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Modificar veterinario</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('veterinarios.index')}}" class="btn btn-sm btn-danger">
            Cancelar y volver
          </a>
        </div>
      </div>
    </div>
      <div class="card-body">
         @if($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
         @endif  
          <form action="{{ route('veterinarios.update' , $veterinario->id) }}" method="POST">
            @csrf 
            @method('PUT')

            <div class="form-group">
                  <label for="">Nombre del Veterinario</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" value="{{old('nombre',$veterinario->nombre)}}" required>
            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingresa el Nombre"  value="{{old('apellido',$veterinario->apellido)}}" required>
            </div>

            <div class="form-group">
               <label for="">Documento de Identidad</label>
                <input type="number" name="ci" class="form-control" placeholder="Ingresa tu CI"  
                value="{{old('ci',$veterinario->ci)}}" required>
             </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                  <input type="number" name="celular" class="form-control" placeholder="Ingresa tu Telefono" 
                  value="{{old('celular',$veterinario->celular)}}" required>
            </div>
            <div class="form-group">
              <label for="">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingresa tu Dirección" 
                value="{{old('direccion',$veterinario->direccion)}}" required>
            </div>
             
            <div class="form-group">
                <label for="">E-mail</label>
                 <input type="email" name="email" class="form-control" placeholder="Ingresa tu Email" 
                 value="{{old('direccion',$veterinario->email)}}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                  <input  data-toggle="tooltip" title= "Longitud minima de 6 caracteres" type="password" name="password" class="form-control" placeholder="Ingresa tu nueva contraseña (si desea mantener la contraseña anterior deje este campo vacio)" minlength="6" >
            </div>
             <button type="submit" class="btn btn-success ">Guardar</button>
        </form>
      </div>
</div>
@endsection
@section('footer')

<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(3)}}
</div>
@endsection