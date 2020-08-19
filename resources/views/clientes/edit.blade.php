@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modificar Cliente</h3>
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
         {!! Form::model($cliente,['route'=>['clientes.update',$cliente->id]]) !!}
           @method('PUT')  
          <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" 
              value="{{old('nombre',$cliente->nombre)}}" required>
       
          </div>
          <div class="form-group">
            <label for="">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Ingresa el Nombre" 
            value="{{old('apellido',$cliente->apellido)}}" required>
          </div>
          <div class="form-group">
            <label for="">Documento de Identidad</label>
              <input type="number" name="ci" class="form-control" placeholder="Ingresa tu CI"  
              value="{{old('ci',$cliente->ci)}}" required>
          </div>

          <div class="form-group">
              {{Form::label('genero','Genero:')}}
              {!! Form::select('genero', $generos, null, ['class' => 'form-control selectpicker',
                                          'title' => 'Seleccionar', 'data-live-search' => 'true']) !!}
          </div>
          <div class="form-group">
              <label for="">Celular</label>
                <input type="number" name="celular" class="form-control"
                placeholder="Ingra un número de celular"
               value="{{old('celular',$cliente->celular)}}" required>
          </div>
          <div class="form-group">
              <label for="">Edad</label>
              <input type="number" name="edad" class="form-control"
                placeholder="Ingrese su edad" 
                value="{{old('edad',$cliente->edad)}}" required>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success">Actualizar</button>
          </div>
         {!! Form::close()!!}
      </div>
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(1)}}
</div>
@endsection