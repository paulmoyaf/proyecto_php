const divHtml = document.querySelector('#new-product');
const divBotones = document.querySelector('#btn-categorias');
const textContador = document.querySelector('#contador');
const btnEliminarTodo = document.querySelector('#btn-delete-all');
const filterItems = document.querySelector('#lista-items-filter');

let contador = 0;

const storedCounter = getCookie("contador");





if (storedCounter) {
  contador = parseInt(storedCounter);
}
textContador.innerHTML = contador;

if (!divHtml || !btnEliminarTodo) {
  sumarContador();
} else {
  const storedCards = getCookie("cards");
  const storedBtnRemoveAll = getCookie("btn_removeAll");

  if (storedCards) {
    divHtml.innerHTML = storedCards;
    document.querySelectorAll('.btn-remove').forEach(function(button) {
      button.addEventListener('click', function() {
        const card = this.closest('.card');
        card.remove();
        contador--;
        textContador.innerHTML = contador;
        if (contador === 0) {
          btnEliminarTodo.style.display = "none";
        }
        setCookie("cards", divHtml.innerHTML, 365);
        setCookie("contador", contador, 365);
        setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);
      });
    });
  }



  if (storedBtnRemoveAll) {
    if (storedBtnRemoveAll === "none"){
    }else{
    btnEliminarTodo.style.display = "block";
    }
  }

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
}

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
  btnRemove.classList.add('btn', 'btn-danger', 'col-12', 'btn-remove');
  btnRemove.innerHTML = 'Borrar';

  btnRemove.addEventListener('click', function() {
    const card = this.closest('.card');
    card.remove();
    contador--;
    textContador.innerHTML = contador;
    if (contador === 0) {
      btnEliminarTodo.style.display = "none";
    }
    setCookie("cards", divHtml.innerHTML, 365);
    setCookie("contador", contador, 365);
    setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);
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

btnEliminarTodo.addEventListener('click', function() {
  contador = 0;
  textContador.innerHTML = contador;
  divHtml.innerHTML = '';
  btnEliminarTodo.style.display = "none";
  setCookie("contador", "", -1);
  setCookie("cards", "", -1);
  setCookie("btn_removeAll", "", -1);
});

function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
  document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

function getCookie(name) {
  const cookieName = encodeURIComponent(name) + "=";
  const cookieArray = document.cookie.split(";");

  for (let i = 0; i < cookieArray.length; i++) {
    let cookie = cookieArray[i];
    while (cookie.charAt(0) === " ") {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(cookieName) === 0) {
      return decodeURIComponent(cookie.substring(cookieName.length, cookie.length));
    }
  }
  return "";
}

const sumarContador = () => {
  contador++;
  textContador.innerHTML = contador;
  setCookie("contador", contador, 365);
}

const createButtonsCategories = () =>{

  categorias.forEach(function (category, array) {
    const btnCategoria = document.createElement('button');
    btnCategoria.classList.add('btn', 'btn-outline-dark', 'btn-sm' , 'mx-1');
    btnCategoria.innerHTML = category.nombre;

    
    btnCategoria.addEventListener('click', function() {
      showItems(category.nombre);
    });

    divBotones.appendChild(btnCategoria);

    
  });

  var iterator = productos.values();
  console.log(iterator.next().value);
  for (let e of iterator) {
    console.log(e);
  }

  productos.forEach(function(producto, indice) {
    producto = new producto();
    // console.log(producto[indice].nombre);
    // console.log(producto.getPrecio());
    // console.log(producto.getDescripcion());
    // ... Acceder a otros atributos utilizando los métodos correspondientes
  });

}

const showItems = (text) =>{
  console.log(text);
  filterItems.style.display="block";
  filterItems.textContent = text
}

createButtonsCategories();

