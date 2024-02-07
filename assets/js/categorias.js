let categoriaId = document.querySelector('#categoria-id');
let categoriaNombre = document.querySelector('#categoria-nombre');

const mensaje = document.querySelector('#mensaje');

const btnAgregar = document.querySelector('#btn-agregar');
// const btnEditar = document.querySelectorAll('#btn-editar');
const btnEliminar = document.querySelectorAll('#btn-eliminar');


btnAgregar.addEventListener('click', function(event) {
    event.preventDefault();
    const nombreCategoria = document.querySelector('#nombre').value;
    if (!condicionesNombreCatergoria(nombreCategoria)) {
        return;
    }
    const data = { nombre: nombreCategoria };
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            // alert(data.message);
            window.location.reload();
        } else {
            alert('Error al agregar la categoría');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});


document.querySelectorAll('#btn-eliminar').forEach(button => {
    button.addEventListener('click', function(e) {
        var confirmacion = confirm('¿Estás seguro de que quieres eliminar este mensaje?');
            if (!confirmacion) {
            e.preventDefault();
            return;
        }
        const id = this.getAttribute('data-id');

        eliminarCategoria(id);
    });
});



const eliminarCategoria = (id) => {
    const data = { id: id };
    fetch('index.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.status === 'success') {
            // alert(data.message);
            window.location.reload();
        } else {
            alert('Error al eliminar la categoría');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
};

const condicionesNombreCatergoria = (nombre) => {
    if (nombre === null || nombre === '') {
        alert('El nombre de la categoría puede entre 3 a 15 caracteres');
        return false;
    }
    if (nombre.length > 15 || nombre.length < 3) {
        alert('El nombre de la categoría puede entre 3 a 15 caracteres');
        return;
    }
    return true;
};

document.querySelectorAll('#btn-editar').forEach(button => {
    button.addEventListener('click', function(e) {
        const id = this.getAttribute('data-id');
        // let id = this.previousElementSibling.previousElementSibling.value;
        console.log(id);
        editarCategoria(id);
    });
});

const editarCategoria = (id) => {   
    const nuevoNombre = window.prompt('Ingresa el nuevo nombre de la categoría:');
    if (!condicionesNombreCatergoria(nuevoNombre)) {
        return;
    }

    const data = { id: id, nombre: nuevoNombre };
    fetch('index.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.status === 'success') {
            // alert(data.message);
            window.location.reload();
        } else {
            alert('Error al editar la categoría');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
};



$(document).ready(function() {
    if (typeof message !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-success">' + message + '</div>');
        $(mensaje).append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
    if (typeof messageDelete !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-warning">' + messageDelete + '</div>');
        $(mensaje).append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
    if (typeof messageError !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-danger">' + messageError + '</div>');
        $(mensaje).append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
});
