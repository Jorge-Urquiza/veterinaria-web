<div class="col-md-12">
    <div class="form-group row">
        <div class="form-group form-group-sm col-sm-2">
            {{Form::text('nombre',null,['class'=>'form-control form-control-sm mayus','placeholder'=>'Nombre'])}}
        </div>
        <div class="form-group form-group-sm col-sm-2">
                {{Form::text('apellido',null,['class'=>'form-control form-control-sm mayus','placeholder'=>'Apellido'])}}
        </div>
        <div class="form-group form-group-sm col-sm-2">
                {{Form::number('celular',null,['class'=>'form-control form-control-sm','placeholder'=>'Celular'])}}
        </div>
        <div class="form-group form-group-sm col-sm-2">
            {{Form::number('ci',null,['class'=>'form-control form-control-sm','placeholder'=>'Cedula Identidad'])}}
        </div>
        <div class="form-group form-group-sm col-sm-2">
            <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-search"></i>&nbsp;&nbsp;Buscar</button>
        </div>
    </div>
</div>
    