const formulario = document.querySelector('.formulario');
const alertMensaje = document.querySelector('#alerta-mensaje');
// const mensajeEnviado = document.querySelector('#mensaje-enviado');



const nombre = document.querySelector("#name");
const phone = document.querySelector("#phone");
const email = document.querySelector("#email");
const msn = document.querySelector("#message");

window.addEventListener('load', () => {
    // nombre.dispatchEvent(new Event('keyup'));
    // phone.dispatchEvent(new Event('keyup'));
    // email.dispatchEvent(new Event('keyup'));
    // msn.dispatchEvent(new Event('keyup'));
});

nombre.addEventListener('keyup', verificarNombre);
nombre.addEventListener('input', verificarNombre);
phone.addEventListener('keyup', verificarPhone);
phone.addEventListener('input', verificarPhone);
email.addEventListener('keyup', verificarEmail);
email.addEventListener('input', verificarEmail);
msn.addEventListener('keyup', verificarMensaje);
msn.addEventListener('input', verificarMensaje);

const nuevoMensaje = document.querySelector('#nuevo-mensaje');
const btnEnviar = document.querySelector('#btn-enviar');


nuevoMensaje.addEventListener('click', () => {
    limpiarInputs();
    // mensajeEnviado.innerHTML = "";
    alertMensaje.classList.remove('d-block');
    alertMensaje.classList.add('d-none');
    nuevoMensaje.classList.add('d-none');
    btnEnviar.classList.remove('d-none');
    btnEnviar.classList.add('d-block');

    nombre.disabled = false;
    phone.disabled = false;
    email.disabled = false;
    msn.disabled = false;

});


const limpiarInputs = () =>{
    nombre.value = "";
    phone.value = "";
    email.value = "";
    msn.value = "";
    nombre.style.borderColor = '';
    phone.style.borderColor = '';
    email.style.borderColor = '';
    msn.style.borderColor = '';
}

const alertInputs = () =>{
    nombre.style.borderColor = 'red';
    phone.style.borderColor = 'red';
    email.style.borderColor = 'red';
    msn.style.borderColor = 'red';
}

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    if (!verificarCampos()) {
        alert("Ingresa la información correctamente");
        alertInputs();
        return;
    } else {

    const formData = new FormData(formulario);
    formData.append('name',  nombre.value);
    formData.append('phone', phone.value);
    formData.append('email', email.value);
    formData.append('message', msn.value);

    fetch('../db/insertMessage.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())

        
        .then(data => {
            console.log('Success:', data);
            // showMessage(data.message);
            limpiarInputs();

            // showDatosMensaje(formData);

            console.log(data.message);
            alertMensaje.innerHTML = data.message;
            alertMensaje.classList.add('alert', 'alert-success', 'text-center');
            $(alertMensaje).hide().slideDown(500);
            setTimeout(() => {
                $(alertMensaje).slideUp(500);
            },5000);

            // btnEnviar.classList.add('d-none');
            // nuevoMensaje.classList.remove('d-none');
            // nuevoMensaje.classList.add('d-block');

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
    if (esNombreValido(nombre.value) && esNumeroValido(phone.value) && esEmailValido(email.value) && esMensajeValido(msn.value)) {
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
    const regex = /^[a-zA-Z.-_0-9]+@[a-zA-Z]{2,}[.][a-zA-Z]{2,}$/;
    return regex.test(email);
}

function esNumeroValido(phone) {
    const regex = /^[0-9]{9}$/;
    return regex.test(phone);
}

function esMensajeValido(msn) {
    const regex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(,"`'?¿+=._-ñÑ\s]{10,}$/g;
    // const regex = /^[a-zA-ZñÑ0-9\s]{10,}$/;
    return regex.test(msn);
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
        email.setCustomValidity('El email debe tener al menos una @');
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


function verificarMensaje(event) {
    const esValido = esMensajeValido(event.target.value);
    if (esValido) {
        msn.setCustomValidity('');
        msn.style.borderColor = 'green';
    } else {
        msn.setCustomValidity('El mensaje debe tener al menos 10 caracteres');
        msn.style.borderColor = 'red';
    }
};

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


limpiarInputs();
