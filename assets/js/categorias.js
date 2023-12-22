$(document).ready(function() {
    $.each(categorias, function(i, categoria) {
        var $tr = $('#categoria-template').clone().removeAttr('id').css('display', ''); // Muestra la fila clonada
        $tr.find('.categoria-id').text(categoria.id);
        $tr.find('.categoria-nombre').text(categoria.nombre);
        $('table tbody').append($tr);
    });


    $('#categoria-template').remove(); // Elimina la fila clonada
    
});

$('#btn-agregar').click(function() {
    var nombreCategoria = $('#nombre').val();

    // var formData = new FormData();
    // formData.append('nombre', nombreCategoria);
    // console.log(formData);
    fetch('../../db/db_connection_categorias.php', {
        method: 'POST',
        // body: formData,
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nombre: nombreCategoria }),
    })
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(data => console.log(data))
    // .then(data => {
    //     var $tr = $('#categoria-template').clone().removeAttr('id').css('display', ''); // Muestra la fila clonada
    //     $tr.find('.categoria-id').text(data.id);
    //     $tr.find('.categoria-nombre').text(data.nombre);
    //     $('table tbody').append($tr);
    //     $('#categoria-template').remove(); // Elimina la fila clonada
    // })
    .catch((error) => {
        console.error('Error:', error);
    });
});