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
          <form action="{{ route('mascotas.store') }}" method="POST">
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
                                           'id' => 'producto_id']) !!}
            </div>  
             <button type="submit" class="btn btn-success">Registrar</button>
        </form>
      </div>
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(2)}}
</div>
@endsection