$(document).ready(function() {
    $('#producto_id').on('change', function() {
        var id = $("#producto_id option:selected").val();
        alert(id);
        completarPrecio(id)
    });

});

function completarPrecio(id) {
    var url = "{{ route('productos.precio',':id') }}";
    url = url.replace(':id', id)
    $.ajax({
        url: url,
        type: "GET",
        success: function(data) {
            $('#precio_compra').val(data.precio);
        },
        error: function() {
            alert("Seleccione un producto valido");
        }
    });
}