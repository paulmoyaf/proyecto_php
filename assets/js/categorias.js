// $(document).ready(function() {
//     $.each(categorias, function(i, categoria) {
//         var $tr = $('#categoria-template').clone().removeAttr('id').css('display', ''); // Muestra la fila clonada
//         $tr.find('.categoria-id').text(categoria.id);
//         $tr.find('.categoria-nombre').text(categoria.nombre);
//         $('table tbody').append($tr);
//     });
//     $('#categoria-template').remove(); // Elimina la fila clonada    
// });


let categoriaId = document.querySelector('#categoria-id');
let categoriaNombre = document.querySelector('#categoria-nombre');

const btnAgregar = document.querySelector('#btn-agregar');
const btnEditar = document.querySelector('#btn-editar');
const btnEliminar = document.querySelectorAll('#btn-eliminar');


btnAgregar.addEventListener('submit', function(event) {
    event.preventDefault();
    const nombreCategoria = document.querySelector('#nombre').value;
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
            alert(data.message);
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
        }
    });
});

$(document).ready(function() {
    if (typeof message !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-success">' + message + '</div>');
        $('body').append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
    if (typeof messageDelete !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-warning">' + messageDelete + '</div>');
        $('body').append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
    if (typeof messageError !== 'undefined') {
        var alert = $('<div id="alert" class="alert alert-danger">' + messageError + '</div>');
        $('body').append(alert);
        alert.hide().slideDown(500);
        setTimeout(function() {
            alert.slideUp(500);
        }, 3000);
    }
});
// document.querySelectorAll('.btn-eliminar').forEach(button => {
//     button.addEventListener('click', function() {
//         const idCategoria = this.getAttribute('data-id');
//         const data = { id: idCategoria };
//         fetch('../../db/db_connection_categorias.php', {
//             method: 'DELETE',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(data),
//         })
//         .then(response => {
//             console.log(response);
//             return response.json();
//         })
//         .then(data => console.log(data))
//         .catch((error) => {
//             console.error('Error:', error);
//         });
//     });
// });

//no vale aun
// window.onload = function() {
//     fetch('index.php')
//         .then(response => response.json())
//         .then(data => {
//             const tbody = document.querySelector('#categorias tbody');
//             data.forEach(categoria => {
//                 const row = document.createElement('tr');

//                 const idCell = document.createElement('td');
//                 idCell.textContent = categoria.id;
//                 row.appendChild(idCell);

//                 const nombreCell = document.createElement('td');
//                 nombreCell.textContent = categoria.nombre;
//                 row.appendChild(nombreCell);

//                 const accionesCell = document.createElement('td');
//                 const editarButton = document.createElement('button');
//                 editarButton.textContent = 'Editar';
//                 editarButton.addEventListener('click', () => {
//                     // Aquí va el código para editar la categoría
//                     // const nuevoNombre = prompt('Introduce el nuevo nombre de la categoría');
//                     // if (nuevoNombre) {
//                     //     fetch(`editar.php?id=${categoria.id}&nombre=${nuevoNombre}`, {
//                     //         method: 'POST'
//                     //     })
//                     //     .then(response => response.json())
//                     //     .then(data => {
//                     //         if (data.success) {
//                     //             nombreCell.textContent = nuevoNombre;
//                     //         } else {
//                     //             alert('Error al editar la categoría');
//                     //         }
//                     //     });
//                     // }
//                 });
//                 accionesCell.appendChild(editarButton);

//                 const borrarButton = document.createElement('button');
//                 borrarButton.textContent = 'Borrar';
//                 borrarButton.addEventListener('click', () => {
//                     // Aquí va el código para borrar la categoría
//                     // if (confirm('¿Estás seguro de que quieres borrar esta categoría?')) {
//                     //     fetch(`borrar.php?id=${categoria.id}`, {
//                     //         method: 'POST'
//                     //     })
//                     //     .then(response => response.json())
//                     //     .then(data => {
//                     //         if (data.success) {
//                     //             row.parentNode.removeChild(row);
//                     //         } else {
//                     //             alert('Error al borrar la categoría');
//                     //         }
//                     //     });
//                     // }
//                 });
//                 accionesCell.appendChild(borrarButton);

//                 row.appendChild(accionesCell);

//                 tbody.appendChild(row);
//             });
//         })
//         .catch(error => console.error('Error:', error));
// }