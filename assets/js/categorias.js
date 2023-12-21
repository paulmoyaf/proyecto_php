$(document).ready(function() {
    $.each(categorias, function(i, categoria) {
        var $tr = $('#categoria-template').clone().removeAttr('id').css('display', ''); // Muestra la fila clonada
        $tr.find('.categoria-id').text(categoria.id);
        $tr.find('.categoria-nombre').text(categoria.nombre);
        $('table tbody').append($tr);
    });


    $('#categoria-template').remove(); // Elimina la fila clonada

    // Agregar una nueva categoría
    $('#btn-agregar').click(function() {
        var $tr = $('#categoria-template').clone().removeAttr('id').css('display', ''); // Muestra la fila clonada
        $tr.find('.categoria-id').text('0');
        $tr.find('.categoria-nombre').text($('#nombre').val());
        $('table tbody').append($tr);
        $('#categoria-template').remove(); // Elimina la fila clonada
    });

    // Eliminar una categoría
    $('table tbody').on('click', '.btn-eliminar', function() {
        $(this).closest('tr').remove();
    });
    
});