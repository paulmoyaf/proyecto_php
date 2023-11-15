const divHtml = document.querySelector('#new-product');
const textContador = document.querySelector('#contador');
const btnEliminarTodo = document.querySelector('#btn-delete-all');
let contador = 0;

const storedCounter = getCookie("contador");
if (storedCounter) {
  contador = parseInt(storedCounter);
}
textContador.innerHTML = contador;

if (!divHtml || !btnEliminarTodo) {

  sumarContador();
  
} else {
// Obtén el contador almacenado en la cookie (si existe)

const storedCards = getCookie("cards");
const storedBtnRemoveAll = getCookie("btn_removeAll");
const storedBtnRemoveOne = getCookie("btn_removeOne");



if (storedCards) {
  divHtml.innerHTML = storedCards;
}
if (storedBtnRemoveAll) {
  btnEliminarTodo.style.display = "block";
}

// Actualiza el contador en la página


// Incrementa el contador al hacer clic en el botón
document.querySelectorAll('.btn-add').forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    sumarContador();
    btnEliminarTodo.style.display = "block";
    setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);
    const card = createCardElement(this);
    divHtml.appendChild(card);
    setCookie("cards", divHtml.innerHTML, 365);
  });
});



// Crea un elemento de tarjeta con los detalles del producto
function createCardElement(button) {

  const card = document.createElement('div');
  card.classList.add('card', 'mb-3', 'p-3', 'w-100');
  
  const filaCard = document.createElement('div');
  filaCard.classList.add('row');
  
  const columnaIzquierda = document.createElement('div');
  columnaIzquierda.classList.add('col-md-4');
  
  const columnaDerecha = document.createElement('div');
  columnaDerecha.classList.add('col-md-8');
  
  const cardBody = document.createElement('div');
  cardBody.classList.add('card-body');
  
  const nombreProducto = button.getAttribute('data-nombre');
  const imgProducto = button.getAttribute('data-imagen');
  const tipoProducto = button.getAttribute('data-tipo');
  const precioProducto = button.getAttribute('data-precio');
  
  const nombreElement = document.createElement('h6');
  nombreElement.classList.add('card-title');
  nombreElement.textContent = nombreProducto;
  
  const imgElement = document.createElement('img');
  imgElement.classList.add('card-img', 'w-100');
  imgElement.src = imgProducto;
  
  const tipoElement = document.createElement('p');
  tipoElement.classList.add('card-text', 'text-muted');
  tipoElement.innerHTML = tipoProducto;
  
  const precioElement = document.createElement('p');
  precioElement.classList.add('card-text');
  precioElement.innerHTML = `<strong>${precioProducto} €</strong>`;
  
  const btnRemove = document.createElement('button');
  btnRemove.classList.add('btn', 'btn-danger', 'col-12');
  btnRemove.innerHTML = 'Borrar';
  

  btnRemove.addEventListener('click', function() {
    contador--;
    textContador.innerHTML = contador;

    card.remove();
    if (contador === 0) {
      btnEliminarTodo.style.display = "none";
    }
  });
  
  columnaIzquierda.appendChild(imgElement);
  columnaDerecha.appendChild(cardBody);
  cardBody.appendChild(nombreElement);
  cardBody.appendChild(tipoElement);
  cardBody.appendChild(precioElement);
  
  filaCard.appendChild(columnaIzquierda);
  filaCard.appendChild(columnaDerecha);
  filaCard.appendChild(btnRemove);
  
  card.appendChild(filaCard);
  
  return card;
}

// Elimina todos los elementos y borra la cookie al hacer clic en el botón correspondiente
btnEliminarTodo.addEventListener('click', function() {
  contador = 0;
  textContador.innerHTML = contador;
  divHtml.innerHTML = '';
  btnEliminarTodo.style.display = "none";
  setCookie("contador", "", -1);
  setCookie("cards", "", -1);
  setCookie("btn_removeAll", "", -1);
});

}

// Función para establecer una cookie
function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
  document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

// Función para obtener el valor de una cookie
function getCookie(name) {
  const cookieName = `${name}=`;
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i];
    while (cookie.charAt(0) === ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(cookieName) === 0) {
      return cookie.substring(cookieName.length, cookie.length);
    }
  }
  return null;
}



const sumarContador = () =>{
  contador++;
  textContador.innerHTML = contador;
  setCookie("contador", contador, 365);
}