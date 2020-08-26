@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Formulario de registro de Atencion</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('atenciones.index')}}" class="btn btn-sm btn-danger">
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
          <form action="{{ route('atenciones.store') }}" method="POST" name="formulario">
            @csrf 
            <div class="row">
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                  <label for="">Fecha</label>
                  {{Form::date('fecha',date('Y-m-d'), ['class'=> 'form-control' , 'required' => true]) }}
                </div>
              </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="">Hora</label>
                    {{Form::time('hora',date('H:i:s'), ['class'=> 'form-control' , 'required' => true]) }}
                  </div>
                </div>

            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label  for="type">Tipo de atencion</label>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type1" checked type="radio" required
                        @if(old('tipo','Consulta') == 'Consulta') checked @endif value="Consulta" >
                        <label class="custom-control-label" for="type1">Consulta</label>
                    </div>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type2"  type="radio" required
                        @if(old('tipo') == 'Examen')  checked @endif value="Examen">
                        <label class="custom-control-label" for="type2">Examen</label>
                    </div>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type3"  type="radio" required 
                        @if(old('tipo') == 'Emergencia')  checked @endif value="Emergencia">
                        <label class="custom-control-label" for="type3">Emergencia</label>
                    </div>
                  </div>
              </div> 
            </div>
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  {{Form::label('mascota','Mascota:')}}
                  {!! Form::select('mascota_id', $mascotas, null, ['class' => 'form-control selectpicker', 
                  'placeholder'=>'Seleccionar mascota', 'data-live-search' => 'true' , 'required'=>true ,'id'=>'mascota_id']) !!}
                </div>  
              </div>
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="">Dueño mascota</label>
                    <input type="text" name="nombre" class="form-control" disabled
                       required id="dueño">
                </div>
              </div>
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  {{Form::label('dueño','Veterinario:')}}
                  {!! Form::select('veterinario_id', $veterinarios, null, ['class' => 'form-control selectpicker', 
                   'placeholder'=>'Seleccionar veterinario', 'data-live-search' => 'true' , 'required'=>true]) !!}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  <label for="">Problema(s)</label>
                  <textarea name ="problema" class="form-control" rows="3" value="{{ old('problema') }} " required></textarea>
                </div>
              </div>
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  <label for="">Diagnostico</label>
                  <textarea name ="diagnostico" class="form-control"  rows="3"  value="{{ old('diagnostico') }}"  required ></textarea>
                </div>
              </div>
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  <label for="">Tratamiento</label>
                  <textarea name ="tratamiento" class="form-control" rows="3" value="{{ old('tratamiento') }} " required></textarea>
                </div>
              </div>
            </div>
              <button type="submit" class="btn btn-success" id="btn_guardar">Registrar</button>
        </form>
      </div>
</div>
@push('scripts')
<script>
$(document).ready(function(){
  $('#mascota_id').on('change', function() {
    llenarDueño($("#mascota_id option:selected").val());
  });
    
});
function llenarDueño(id) {
    var url = "{{ route('mascotas.obtener',':id') }}";
    url = url.replace(':id', id)
    $.ajax({
        url: url,
        type: "GET",
        success: function(data) {
            $('#dueño').val(data.fullname);
        },
        error: function() {
            alert("Seleccione un id de mascota valido valido");
        }
    });
}
</script>
<script>
  (function() {
      var formulario = document.getElementsByName('formulario')[0],
          elementos = formulario.elements,
          boton = document.getElementById('btn_guardar');
  
      var validarProblema = function(e) {
  
          if (formulario.problema.value.length < 5) {
              alert("El campo problema debe contener al menos 5 caracteres ");
              e.preventDefault();
          }
      };
      var validarDiagnostico = function(e) {
          if (formulario.diagnostico.value.length < 5) {
              alert("El campo diagnostico debe contener al menos 5 caracteres ");
              e.preventDefault();
          }
      };
      var validarTratamiento = function(e) {
          if (formulario.tratamiento.value.length < 5) {
              alert("El campo tratamiento debe contener al menos 5 caracteres ");
              e.preventDefault();
          }
      };
      var validar = function(e) {
        validarProblema(e);
        validarDiagnostico(e);
        validarTratamiento(e);
      }
      formulario.addEventListener("submit", validar);
  
  }())
  
  </script>
@endpush
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(7)}}
</div>
@endsection