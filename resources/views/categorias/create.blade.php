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
          <form action="{{ route('categorias.store') }}" method="POST" id="formulario" name="formulario">
            @csrf 
            <div class="form-group">
              <label for="">Nombre</label>
              <input  type="text" name="nombre" id="nombre" 
              class="form-control" placeholder="Ingresa el Nombre" value="{{old('nombre')}}"  >
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descripcion</label>
              <textarea name ="descripcion" class="form-control" id="descripcion" rows="3" ></textarea>
            </div>
             <button type="submit" class="btn btn-success" id="btn_guardar">Registrar</button>
        </form>
      </div>
</div>
@endsection
@push('scripts')
<script>
  (function(){
  var formulario = document.getElementsByName('formulario')[0],
    elementos =formulario.elements,
    boton= document.getElementById('btn_guardar');
    
	var validarNombre= function(e){
    var x = formulario.nombre.value.length;
    alert(x);
		if(formulario.nombre.value== 0){
      alert("Completar el campo nombre ");
      e.preventDefault();
		}
  };
  var validarDescripcion= function(e){
		if(formulario.descripcion.value==0){
      alert("Completar el campo descripcion ");
      e.preventDefault();
		}
	};
	var validar = function(e){
    validarNombre(e);
    validarDescripcion(e);
	}
	formulario.addEventListener("submit",validar);
	
}())
</script>

@endpush
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(4)}}
</div>
@endsection