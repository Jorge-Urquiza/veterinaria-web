@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo Producto</h3>
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
        
         {!! Form::open(['route'=>['productos.store']], ['class' => 'form-control']) !!}
         @csrf
          <div class="form-group">
              {{Form::label('nombre','Nombre:')}}
              {{Form::text('nombre',null,['class'=>'form-control','id' => 'pcantidad',
               'placeholder' => 'Nombre producto'])}} 
            </div>
            <div class="form-group">
                {{Form::label('precio','Precio(Bs.):')}}
                
                {{Form::number('precio', null, ['class'=>'form-control',
                  'id' => 'precio' , 'placeholder' => 'Ej: 20.50' , 
                  'min' => '1',  'required' => true] )}} 
            </div>
            <div class="form-group">
              {{Form::label('stock','Stock:')}}
              {{Form::number('stock',1,['class'=>'form-control',
              'id' => 'cantidad' , 'placeholder' => 'Ej: 5' , 'min' => '1',  'required' => true])}} 
            </div>
            <div class="form-group">
                {{Form::label('categoria','Categorias:')}}
                {!! Form::select('categoria_id', $categorias, null, ['placeholder' => 'Seleccionar categoria'
                ,'class' => 'form-control selectpicker',
                                            'title' => 'Seleccionar', 'data-live-search' => 'true' ,  'required' => true]) !!}
            </div>
             <button type="submit" class="btn btn-success">Guardar</button>
         {!! Form::close()!!}
          
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
            alert("El nombre del producto debe contener al menos 3 caracteres ");
            e.preventDefault();
        }
    };
    var validarPrecio = function(e) {
        if (formulario.precio.value.length < 1) {
            alert("El precio de producto debe ser de al menos 1 Bs");
            e.preventDefault();
        }
    };
    var validarStock = function(e) {
        if (formulario.stock.value.length < 1) {
            alert("El stock debe ser como minimo de 1 ");
            e.preventDefault();
        }
    };
    var validar = function(e) {
        validarNombre(e);
        validarPrecio(e);
        validarStock(e);
    }

    formulario.addEventListener("submit", validar);

}())

</script>
@endpush
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(5)}}
</div>
@endsection