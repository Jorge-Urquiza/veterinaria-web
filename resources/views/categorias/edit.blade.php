@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva Categoria</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('categorias.index')}}" class="btn btn-sm btn-danger">
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
        {!! Form::model($categoria,['route'=>['categorias.update',$categoria->id]]) !!}
         @method('PUT')  
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="nombre" class="form-control" placeholder="Ingresa el Nombre" 
              value="{{old('nombre',$categoria->nombre)}}" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descripcion</label>
              <textarea name ="descripcion" class="form-control"  required
              id="exampleFormControlTextarea1" rows="3" >{{old('descripcion',$categoria->descripcion)}}
            </textarea>
            </div>
             <button type="submit" class="btn btn-success">Guardar</button>
        {!! Form::close()!!}
      </div>
</div>
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(4)}}
</div>
@endsection