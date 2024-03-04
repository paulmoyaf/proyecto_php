// path del archivo: assets/js/insertarPedido.js
document.querySelectorAll('#btn-delete').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        var confirmacion = confirm('¿Estás seguro de que quieres eliminar este mensaje?');
        if (!confirmacion) {
            e.preventDefault();
        }
    });
});

const formulario = document.querySelector('.formulario-carrito');
const alertMensaje = document.querySelector('#alerta-mensaje');
// const mensajeEnviado = document.querySelector('#mensaje-enviado');

const nombre = document.querySelector("#nombre");
const email = document.querySelector("#email");
const direccion = document.querySelector("#direccion");
const ciudad = document.querySelector("#ciudad");
const codigoPostal = document.querySelector("#codigoPostal");

const btnActualizar = document.querySelector('#btn-actualizar');


// if (statusCheck) {
//     statusCheck.addEventListener('change', function() { 
//         btnActualizar.disabled = false;
//     });
// }

if (nombre) {
  
nombre.addEventListener('keyup', verificarNombre);
nombre.addEventListener('input', verificarNombre);
email.addEventListener('keyup', verificarEmail);
email.addEventListener('input', verificarEmail);
direccion.addEventListener('keyup', verificarDireccion);
direccion.addEventListener('input', verificarDireccion);
ciudad.addEventListener('keyup', verificarCiudad);
ciudad.addEventListener('input', verificarCiudad);
codigoPostal.addEventListener('keyup', verificarCodigoPostal);
codigoPostal.addEventListener('input', verificarCodigoPostal);


const btnComprar = document.querySelector('#procesar-compra');


const limpiarInputs = () =>{
    nombre.value = "";
    email.value = "";
    direccion.value = "";
    ciudad.value = "";
    codigoPostal.value = "";
    nombre.style.borderColor = '';
    email.style.borderColor = '';
    direccion.style.borderColor = '';
    ciudad.style.borderColor = '';
    codigoPostal.style.borderColor = '';
}

const alertInputs = () =>{
    nombre.style.borderColor = 'red';
    email.style.borderColor = 'red';
    direccion.style.borderColor = 'red';
    ciudad.style.borderColor = 'red';
    codigoPostal.style.borderColor = 'red';
}

// path del archivo: assets/js/compraProductos.js
formulario.addEventListener('submit', function(e) {
    e.preventDefault();
  
    if (!verificarCampos()) {
      alert("Ingresa la información correctamente");
      alertInputs();
      return;
    } else {
      const formData = new FormData(formulario);
      formData.append('nombre',  nombre.value);
      formData.append('email', email.value);
      formData.append('direccion', direccion.value);
      formData.append('ciudad', ciudad.value);
      formData.append('codigoPostal', codigoPostal.value);

  
      // Obtener los productos del carrito de localStorage
      const carritoProducts = obtenerProductosLocalStorage();
      formData.append('productos', JSON.stringify(carritoProducts));
      const precioTotal = getPrecioTotalLocalStorage();
      formData.append('precioTotal', precioTotal);
      const totalProductos = contarProductosLocalStorage();
      formData.append('totalProductos', totalProductos);

  
      fetch('../api/pedidos', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(text => {
        console.log('Success:', text);
        vaciarCarrito();
        limpiarInputs();
        alertMensaje.innerHTML = text;
        alertMensaje.classList.add('alert', 'alert-success', 'text-center');
        $(alertMensaje).hide().slideDown(500);
        setTimeout(() => {
          $(alertMensaje).slideUp(500);
        },5000);
        // return JSON.parse(text); 
      })
      .catch(error => {
        console.error('Error:', error);
        alertMensaje.innerHTML = "Error encontrado: " + error;
        alertMensaje.classList.add('alert', 'alert-danger', 'text-center');
        $(alertMensaje).hide().slideDown(500);
        setTimeout(() => {
          $(alertMensaje).slideUp(500);
        },5000);
      });
    }
  });


function verificarCampos() {
    if (esNombreValido(nombre.value) && esEmailValido(email.value) && esDireccionValida(direccion.value) && esNombreValido(ciudad.value) && esCodigoPostalValido(codigoPostal.value)) {
        return true;
    } else {
        return false;
    }
}

function esNombreValido(nombre) {
    const regex = /^[a-zA-ZñÑ\s]{2,}$/;
    return regex.test(nombre);
}

function esEmailValido(email) {
    const regex = /^[a-zA-Z.-_0-9]+@[a-zA-Z]{2,}([.][a-zA-Z]{2,})+$/;
    return regex.test(email);
}

function esNumeroValido(phone) {
    const regex = /^[0-9]{9}$/;
    return regex.test(phone);
}

function esDireccionValida(direccion) {
    const regex = /^[a-zA-ZñÑ\s0-9.,'-]{2,}$/;
    return regex.test(direccion);
}

function esCodigoPostalValido(codigoPostal) {
    const regex = /^[0-9]{5}$/;
    return regex.test(codigoPostal);
}


function verificarNombre(event) {
    const esValido = esNombreValido(event.target.value);
    if (esValido) {
        nombre.setCustomValidity('');
        nombre.style.borderColor = 'green';
    } else {
        nombre.setCustomValidity('El nombre debe tener al menos dos letras');
        nombre.style.borderColor = 'red';
    }
};

function verificarEmail(event) {
    const esValido = esEmailValido(event.target.value);
    if (esValido) {
        email.setCustomValidity('');
        email.style.borderColor = 'green';
    } else {
        email.setCustomValidity('El email debe contener una @ y un dominio válido. Por ejemplo: nombre@dominio.com');
        email.style.borderColor = 'red';
    }
};

function verificarPhone(event) {
    const esValido = esNumeroValido(event.target.value);
    if (esValido) {
        phone.setCustomValidity('');
        phone.style.borderColor = 'green';
    } else {
        phone.setCustomValidity('El teléfono debe tener 9 números');
        phone.style.borderColor = 'red';
    }
};

function verificarDireccion(event) {
    const esValido = esDireccionValida(event.target.value);
    if (esValido) {
        direccion.setCustomValidity('');
        direccion.style.borderColor = 'green';
    } else {
        direccion.setCustomValidity('La dirección debe tener al menos dos letras');
        direccion.style.borderColor = 'red';
    }
}


function verificarCiudad(event) {
    const esValido = esNombreValido(event.target.value);
    if (esValido) {
        ciudad.setCustomValidity('');
        ciudad.style.borderColor = 'green';
    } else {
        ciudad.setCustomValidity('La ciudad debe tener al menos dos letras');
        ciudad.style.borderColor = 'red';
    }
}

function verificarCodigoPostal(event) {
    const esValido = esCodigoPostalValido(event.target.value);
    if (esValido) {
        codigoPostal.setCustomValidity('');
        codigoPostal.style.borderColor = 'green';
    } else {
        codigoPostal.setCustomValidity('El código postal debe tener 5 números');
        codigoPostal.style.borderColor = 'red';
    }
}

// esto es lo que se muestra en el form despues de haber envaido el mensaje
const showDatosMensaje = (formData) => {
    // const mensajeEnviado = document.querySelector('#mensaje-enviado');
    // mensajeEnviado.innerHTML = "";

    for (let [key, valor] of formData.entries()) {

        const paragraph = document.createElement('p');
        paragraph.textContent = `${key}: ${valor}`;
        // mensajeEnviado.appendChild(paragraph);

      
        // Selecciona el alertMensajeo del formulario por su nombre y deshabilítalo
        const formalertMensaje = document.querySelector(`#${key}`);
        if (formalertMensaje) {
          formalertMensaje.value = `Value Sent: ${valor}`;
          formalertMensaje.disabled = true;
        }
    }
}


// limpiarInputs();
}
