@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modificar Producto</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('productos.index')}}" class="btn btn-sm btn-danger">
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
          @php
             $max = 1000; 
          @endphp
            {!! Form::model($producto,['route'=>['productos.update',$producto->id]]) !!}
            @method('PUT')
              <div class="form-group">
                    {{Form::label('nombre','Nombre:')}}
                    {!! Form::text('nombre', null, ['class' => 'form-control form-control-sm selectpicker',
                                                'title' => 'Seleccionar', 'data-live-search' => 'true']) !!}
              </div>
              <div class="form-group">
                {{Form::label('precio','Precio:')}}
                
                {{Form::number('precio', null, ['class'=>'form-control',
                  'id' => 'precio' , 'placeholder' => 'Ej: 20.50' , 
                  'min' => '1',  'required' => true] )}} 
              </div>
              <div class="form-group">
                {{Form::label('stock','Stock:')}}
                {{Form::number('stock',null,['class'=>'form-control',
                'id' => 'cantidad' , 'placeholder' => 'Ej: 5' , 'min' => '1', 'max' => $max,  'required' => true])}} 
              </div>
              <div class="form-group">
                  {{Form::label('categoria_id','Categoria:')}}
                  {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control selectpicker',
                                              'title' => 'Seleccionar', 'data-live-search' => 'true' ,  'required' => true]) !!}
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
    {{Auth()->user()->showCounter(5)}}
</div>
@endsection