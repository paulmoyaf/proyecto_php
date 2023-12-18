const formulario = document.querySelector('.formulario');
const element = document.querySelector('#element-id');
const mensajeEnviado = document.querySelector('#mensaje-enviado');



const name = document.querySelector("#name");
const phone = document.querySelector("#phone");
const email = document.querySelector("#email");
const msn = document.querySelector("#message");


const nuevoMensaje = document.querySelector('#nuevo-mensaje');
const btnEnviar = document.querySelector('#btn-enviar');

nuevoMensaje.addEventListener('click', () => {
    borrarInputs();
    mensajeEnviado.innerHTML = "";
    element.classList.remove('d-block');
    element.classList.add('d-none');
    nuevoMensaje.classList.add('d-none');
    btnEnviar.classList.remove('d-none');
    btnEnviar.classList.add('d-block');

    name.disabled = false;
    phone.disabled = false;
    email.disabled = false;
    msn.disabled = false;

});


const borrarInputs = () =>{
    name.value = "";
    phone.value = "";
    email.value = "";
    msn.value = "";
}

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    // formValidacion();
    if (!formValidacion()) {
        return;
    } else {

    

    const formData = new FormData(formulario);
    formData.append('name',  name.value);
    formData.append('phone', phone.value);
    formData.append('email', email.value);
    formData.append('message', msn.value);

    fetch('../db/insert.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        
        .then(data => {
            console.log('Success:', data);
            // showMessage(data.message);
            borrarInputs();

            showDatosMensaje(formData);

            element.innerHTML = data.message;
            console.log(data.message);
            //mostrar mensaje enviado
            element.classList.remove('d-none');
            element.classList.add('d-block');          

            btnEnviar.classList.add('d-none');
            nuevoMensaje.classList.remove('d-none');
            nuevoMensaje.classList.add('d-block');
            

        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});

const formValidacion = () => {
    if (name.value == "" || phone.value == "" || email.value == "" || msn.value == "") {
        showError("No has metido toda la información....");
        return false; // Return false to indicate validation failure
    }
    // showMessage("No has metido los datos");
    return true; // Return true to indicate validation success
}


const showDatosMensaje = (formData) => {
    const mensajeEnviado = document.querySelector('#mensaje-enviado');
    mensajeEnviado.innerHTML = "";

    for (let [key, valor] of formData.entries()) {

        const paragraph = document.createElement('p');
        paragraph.textContent = `${key}: ${valor}`;
        mensajeEnviado.appendChild(paragraph);

      
        // Selecciona el elemento del formulario por su nombre y deshabilítalo
        const formElement = document.querySelector(`#${key}`);
        if (formElement) {
          formElement.value = `New: ${valor}`;
          formElement.disabled = true;
        }
    }
}




const showMessage = (text) =>{
    const parrafo = document.createElement('p');
    parrafo.textContent = text;
    parrafo.classList.add('correcto');
    formulario.appendChild(parrafo);
    setTimeout(() =>{
        parrafo.remove();
    },3000);
}

const showError = (text) =>{
    const parrafo = document.createElement('p');
    parrafo.textContent = text;
    //añado una clase para despues cambiar el estilo
    parrafo.classList.add('error');
    formulario.appendChild(parrafo);
    setTimeout(() =>{
        parrafo.remove();
    },3000);
}

// borrarInputs();
