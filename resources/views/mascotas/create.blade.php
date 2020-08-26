@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Formulario de registro de mascotas</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('mascotas.index')}}" class="btn btn-sm btn-danger">
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
          <form action="{{ route('mascotas.store') }}" method="POST" name="formulario">
            @csrf 
            
            <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" value="{{old('nombre')}}" required >
            </div>
            <div class="form-group">
                <label for="">Raza</label>
                <input type="text" name="raza" class="form-control" placeholder="Ingresa la raza" value="{{old('raza')}}" required >
            </div>
            <div class="form-group">
              <label for="">Color</label>
              <input type="text" name="color" class="form-control" placeholder="Ingresa el Color" value="{{old('color')}}" required >
            </div>
            <div class="form-group">
              {{Form::label('tipo','Tipo mascota:')}}
              {!! Form::select('tipo', 
                  ['Perro'=>'Perro','Gato'=>'Gato', 'Otro' => 'Otro'], null,
                   ['class' => 'form-control ',
                   'placeholder' => 'Seleccionar tipo de mascota' , 'data-live-search' => 'true' ,  'required' => true]) !!}
            </div>
            <div class="form-group">
              {{Form::label('dueño','Dueño:')}}
              {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control selectpicker', 
               'placeholder'=>'Seleccionar dueño', 'data-live-search' => 'true' , 
                                           'id' => 'producto_id' ,  'required' => true]) !!}
            </div>  
             <button type="submit" class="btn btn-success" id="btn_guardar">Registrar</button>
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
            alert("El nombre de mascota debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validarRaza = function(e) {
        if (formulario.raza.value.length < 3) {
            alert("La raza debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validarColor = function(e) {
        if (formulario.color.value.length < 3) {
            alert("El color de la mascota debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validar = function(e) {
        validarNombre(e);
        validarRaza(e);
        validarColor(e);
    }
    formulario.addEventListener("submit", validar);

  }())

</script>
@endpush
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(2)}}
</div>
@endsection