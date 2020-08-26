@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Formulario de registro Cliente</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('clientes.index')}}" class="btn btn-sm btn-danger">
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
          <form action="{{ route('clientes.store') }}" method="POST" name="formulario"> 
            @csrf 
            <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" value="{{old('nombre')}}" required >
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingresa el Nombre" value="{{old('apellido')}}" required >
            </div>
            <div class="form-group">
                <label for="">Documento de Identidad</label>
                <input type="number" name="ci" class="form-control" placeholder="Ingresa tu CI"  value="{{old('ci')}}" required  >
             </div>
             <div class="form-group">
              {{Form::label('genero','Genero:')}}
              {!! Form::select('genero', 
                  ['Masculino'=>'Masculino','Femenino'=>'Femenino', 'Otro' => 'Otro'], null,
                   ['class' => 'form-control form-control-sm ', 'id' => 'genero' ,
                   'placeholder' => 'Seleccionar categoria' , 'data-live-search' => 'true' ,  'required' => true]) !!}
             </div>
            <div class="form-group">
                <label for="">Celular</label>
                  <input type="number" name="celular" class="form-control"
                  placeholder="Ingra un número de celular" value="{{old('celular')}}"  required>
            </div>
            <div class="form-group">
              <label for="">Edad</label>
                <input type="number" name="edad" class="form-control"
                placeholder="Ingrese su edad" value="{{old('edad')}}" required >
          </div>
             <button type="submit" class="btn btn-success" id="btn_guardar">Guardar</button>
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
    var validarEdad = function(e) {
        if (formulario.edad.value.length  < 10   ) {
            alert("La persona debe tener al menos 10 años ");
            e.preventDefault();
        }
    };
    var validar = function(e) {
        validarNombre(e);
        validarApellido(e);
        validarCI(e);
        validarCelular(e);
        validarEdad(e);
    }
    formulario.addEventListener("submit", validar);

}())

</script>
@endpush
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(1)}}
</div>
@endsection