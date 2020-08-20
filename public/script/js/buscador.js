//JQUERY 
$(document).ready(function() {
    $('#buscador').on('change', function() {
        redireccionar($("#buscador option:selected").val());
    });


});

function redireccionar(valor) {
    switch (valor) {
        case '0':
            var url = '{{route("home") }}';
            window.location.href = url;
            break;
        case '1':
            var url = '{{route("clientes.index") }}';
            window.location.href = url;
            break;
        case '2':
            var url = '{{route("clientes.create") }}';
            window.location.href = url;
            break;
        case '3':
            var url = '{{route("mascotas.index") }}';
            window.location.href = url;
            break;
        case '4':
            var url = '{{route("mascotas.create") }}';
            window.location.href = url;
            break;
        case '5':
            var url = '{{route("veterinarios.index") }}';
            window.location.href = url;
            break;
        case '6':
            var url = '{{route("veterinarios.create") }}';
            window.location.href = url;
            break;

        case '7':
            var url = '{{route("categorias.index") }}';
            window.location.href = url;
            break;


        case '8':
            var url = '{{route("categorias.create") }}';
            window.location.href = url;
            break;

        case '9':
            var url = '{{route("productos.index") }}';
            window.location.href = url;
            break;


        case '10':
            var url = '{{route("productos.create") }}';
            window.location.href = url;
            break;

        case '11':
            var url = '{{route("ventas.index") }}';
            window.location.href = url;
            break;


        case '12':
            var url = '{{route("ventas.create") }}';
            window.location.href = url;
            break;

        case '13':
            var url = '{{route("atenciones.index") }}';
            window.location.href = url;
            break;


        case '14':
            var url = '{{route("atenciones.create") }}';
            window.location.href = url;
            break;
    }


}