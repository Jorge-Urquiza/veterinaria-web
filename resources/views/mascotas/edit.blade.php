@extends('layout.app')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
      <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Modificar Mascota</h3>
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
       {!! Form::model($mascota,['route'=>['mascotas.update',$mascota->id]]) !!}
         @method('PUT')  
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" 
            value="{{old('nombre',$mascota->nombre)}}" required>
     
        </div>
        <div class="form-group">
          <label for="">Raza</label>
          <input type="text" name="raza" class="form-control" placeholder="Ingresa la raza" 
          value="{{old('raza',$mascota->raza)}}" required>
        </div>
        <div class="form-group">
          <label for="">Color</label>
            <input type="text" name="color" class="form-control" placeholder="Ingresa el color"  
            value="{{old('color',$mascota->color)}}" required>
        </div>

        <div class="form-group">
          {{Form::label('tipo','Tipo mascota:')}}
          {!! Form::select('tipo', 
              ['Perro'=>'Perro','Gato'=>'Gato', 'Otro' => 'Otro'], null,
               ['class' => 'form-control ',
               'placeholder' => 'Seleccionar tipo de mascota' , 'data-live-search' => 'true' ,  'required' => true]) !!}
        </div>
        <div class="form-group">
          {{Form::label('cliente','Dueño de mascota:')}}
          {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control selectpicker',
                                      'title' => 'Seleccionar', 'data-live-search' => 'true', 'required'=>true]) !!}
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
    {{Auth()->user()->showCounter(2)}}
</div>
@endsection