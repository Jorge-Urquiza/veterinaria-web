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
          <form action="{{ route('veterinarios.store') }}" method="POST">
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
                  <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required >
            </div>
             <button type="submit" class="btn btn-success">Guardar</button>
        </form>
      </div>
</div>
@endsection
@section('footer')

<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(3)}}
</div>
@endsection
@push('scripts')
<script src="{{asset('js/project/validaciones/veterinarios/create.js')}}">
</script>
@endpush