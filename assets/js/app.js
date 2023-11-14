const formulario = document.querySelector('.formulario');


const nombre = document.querySelector("#name");
const phone = document.querySelector("#phone");
const email = document.querySelector("#email");
const msn = document.querySelector("#msn");

formulario.addEventListener('submit',function(e){
    e.preventDefault(); // para no recargar la pagina
    formData();
})


const formData = () =>{

    if (nombre.value == "" || phone.value == "" || email.value == "" | msn.value == ""){
        showError("No has metido todos la información....");
    } else{
        showMessage("No has metido los datos");
    }

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
