@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registrar Veterinario</h3>
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
          <form action="{{ route('veterinarios.store') }}" method="POST" name = "formulario">
            @csrf 
            <div class="form-group">
                  <label for="">Nombre del Veterinario</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" value="{{old('nombre')}}" required >
            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingresa el Nombre" value="{{old('apellido')}}" required >
            </div>
            <div class="form-group">
               <label for="">Documento de Identidad</label>
                <input type="number" name="ci" class="form-control" placeholder="Ingresa tu CI"  value="{{old('ci')}}" >
             </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                  <input type="number" name="celular" class="form-control" placeholder="Ingresa tu Telefono" value="{{old('celular')}}" required >
            </div>
            <div class="form-group">
              <label for="">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingresa tu Dirección" value="{{old('direccion')}}" required >
            </div>
             
            <div class="form-group">
                <label for="">E-mail</label>
                 <input type="email" name="email" class="form-control" placeholder="Ingresa tu Email" value="{{old('email')}}" required >
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                  <input type="password" name="password" class="form-control"  placeholder="Ingresa tu contraseña" required >
            </div>
             <button type="submit" class="btn btn-success">Guardar</button>
        </form>
      </div>
</div>
@endsection

@push('scripts')
{{-- VALIDACIONES CON JS DEL FORM--}}
<script>
(function() {
    var formulario = document.getElementsByName('formulario')[0],
        elementos = formulario.elements,
        boton = document.getElementById('btn_guardar');

    var validarNombre = function(e) {

        if (formulario.nombre.value.length < 3) {
            alert("El nombre debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validarApellido = function(e) {
        if (formulario.apellido.value.length < 3) {
            alert("El apellido debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validarCI = function(e) {
        if (formulario.ci.value.length < 5) {
            alert("El CI debe contener al menos 5 caracteres ");
            e.preventDefault();
        }
    };
    var validarCelular = function(e) {
        if (formulario.celular.value.length != 8 ) {
            alert("El Celular debe contener 8 digitos");
            e.preventDefault();
        }
    };
    var validarDireccion = function(e) {
        if (formulario.direccion.value.length  < 10   ) {
            alert("la direccion debe contener al menos 10 caracteres ");
            e.preventDefault();
        }
    };


    var validarPassword = function(e) {
        if (formulario.password.value.length  < 3   ) {
            alert("El password debe contener al menos 5 caracteres ");
            e.preventDefault();
        }
    };
    
    var validar = function(e) {
        validarNombre(e);
        validarApellido(e);
        validarCI(e);
        validarCelular(e);
        validarDireccion(e);
        validarPassword(e);
    }
    formulario.addEventListener("submit", validar);

}())

</script>
@endpush
@section('footer')

<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(3)}}
</div>
@endsection