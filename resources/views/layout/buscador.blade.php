<select data-live-search="true"  class="selectpicker" id="buscador" size="1">
    <option disabled selected>Click para buscar</option>
    <option value="0"><i class="icon-camera-retro"></i>Inicio</option>

    <option value="1">Listar cliente</option>
    <option value="2">Registrar cliente</option>

    <option value="3">Listar Mascota</option>
    <option value="4">Registrar Mascota</option>
    
    @if(auth()->user()->rol == 'director' )
    <option value="5">Listar Vetrinario</option>
    <option value="6">Registrar Veterinario</option>
    @endif

    <option value="7">Listar Categoria</option>
    <option value="8">Registrar Categoria</option>

    <option value="9">Listar Producto</option>
    <option value="10">Registrar Producto</option>

    <option value="11">Listar Venta</option>
    <option value="12">Registrar Venta</option>

    <option value="13">Listar Atenciones</option>
    <option value="14">Registrar Atencion</option>
    @if(auth()->user()->rol == 'director' )
    <option value="15">Reporte Producto</option>
    <option value="16">Reporte Veterinario</option>
    <option value="17">Estadistica Atencion</option>
    @endif

</select>  