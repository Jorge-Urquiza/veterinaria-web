@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modificar Atencion </h3>
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
            {!! Form::model($atencion,['route'=>['atenciones.update',$atencion->id]]) !!}
            @method('PUT')
            <div class="row">
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                  <label for="">Fecha</label>
                  {{Form::date('fecha',$atencion->date, ['class'=> 'form-control' , 'required' => true]) }}
                </div>
              </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="">Hora</label>
                    {{Form::time('hora',$atencion->hora, ['class'=> 'form-control' , 'required' => true]) }}
                  </div>
                </div>

            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label  for="type">Tipo de atencion</label>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type1" checked type="radio" required
                        @if($atencion->tipo == 'Consulta') checked @endif value="Consulta" >
                        <label class="custom-control-label" for="type1">Consulta</label>
                    </div>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type2"  type="radio" required
                        @if($atencion->tipo== 'Examen')  checked @endif value="Examen">
                        <label class="custom-control-label" for="type2">Examen</label>
                    </div>
                    <div class="custom-control custom-radio mb-3"> 
                        <input name="tipo" class="custom-control-input" id="type3"  type="radio" required 
                        @if($atencion->tipo == 'Emergencia')  checked @endif value="Emergencia">
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
                  'placeholder'=>'Seleccionar mascota', 'data-live-search' => 'true' , 'required'=>true ,'id'=>'mascota_id' , 'disabled'=>true]) !!}
                </div>  
              </div>
              <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <input type="text" disabled class="form-control" 
                            id="dueño" >
                    </div>
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
                  {{Form::textarea('problema',null,['class'=>'form-control ' . ( $errors->has('problema') ? ' is-invalid' : '' ),'placeholder'=>'Problema'])}}
                  {!! $errors->first('problema','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
              </div>
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  <label for="">Diagnostico</label>
                  {{Form::textarea('diagnostico',null,['class'=>'form-control ' . ( $errors->has('diagnostico') ? ' is-invalid' : '' ),'placeholder'=>'Diagnostico '])}}
                 {!! $errors->first('diagnostico','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
              </div>
              <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  {{Form::label('tratamiento','Tratamiento:')}}
                  {{Form::textarea('tratamiento',null,['class'=>'form-control ' . ( $errors->has('tratamiento') ? ' is-invalid' : '' ),'placeholder'=>'Tratamiento '])}}
                 {!! $errors->first('tratamiento','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
              </div>
            </div>
             <button type="submit" class="btn btn-success">Actualizar</button>
            {!! Form::close()!!}
      </div>
</div>
@push('scripts')
<script>
  var flag = true;
$(document).ready(function(){
    if(flag){
      llenarDueño($("#mascota_id option:selected").val());
    }
    flag = false;
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
            alert("Seleccione un id de mascota valida");
        }
    });
}

</script>
@endpush
@endsection
@section('footer')
<div class="alert alert-dark" role="alert">
    {{Auth()->user()->showCounter(7)}}
</div>
@endsection
