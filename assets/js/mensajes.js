
document.querySelectorAll('#btn-delete').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        var confirmacion = confirm('¿Estás seguro de que quieres eliminar este mensaje?');
        if (!confirmacion) {
            e.preventDefault();
        }
    });
});