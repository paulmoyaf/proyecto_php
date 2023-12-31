const divHtml = document.querySelector('#new-product');
const divBotones = document.querySelector('#btn-categorias');
const textContador = document.querySelector('#contador');
const textValorTotal = document.querySelector('#valor-total');
const carroVacio = document.querySelector('#carro-vacio');
const btnEliminarTodo = document.querySelector('#btn-delete-all');
const filterItems = document.querySelector('#lista-items-filter');
const divListaItems = document.querySelector('#lista-items');


let contador = 0;
let valorTotal = 0;

const storedCounter = getCookie("contador");
const storedValorTotal = getCookie("valorTotal");


const mostrarCarroVacio = () => {
  if(carroVacio){
    carroVacio.classList.remove('d-none');
    carroVacio.classList.add('d-block');
  }
}

if (storedCounter) {
  contador = parseInt(storedCounter);
  valorTotal = parseFloat(storedValorTotal);
}

textContador.innerHTML = contador;
textValorTotal.innerHTML = valorTotal;

if (!divHtml || !btnEliminarTodo) {
  sumarContador();
  // sumarValorTotal();
} else {
  const storedCards = getCookie("cards");
  const storedBtnRemoveAll = getCookie("btn_removeAll");

  if (storedCards) {
    divHtml.innerHTML = storedCards;
    btnEliminarTodo.style.display = "block";
    
    document.querySelectorAll('.btn-remove').forEach(function(button) {
      button.addEventListener('click', function() {
        const card = this.closest('.card');
        const precioProducto = card.querySelector('strong').textContent;
        console.log(`valor borrado: ${precioProducto}`);
        valorTotal = valorTotal - parseFloat(precioProducto);
        console.log(`valor actual: ${valorTotal}`);        
        card.remove();
        contador--;
        textContador.innerHTML = contador;
        textValorTotal.innerHTML = valorTotal;
        if (contador === 0) {
          btnEliminarTodo.style.display = "none";
          mostrarCarroVacio();
        }
        setCookie("cards", divHtml.innerHTML, 365);
        setCookie("contador", contador, 365);
        // setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);
        setCookie("valorTotal", valorTotal, 365);
      });
    });
  }
  else{
    mostrarCarroVacio();
  }

  if (storedBtnRemoveAll) {
    if (storedBtnRemoveAll === "none"){
    }
    }else{
    // btnEliminarTodo.style.display = "block";
    }
  }

  document.querySelectorAll('.btn-add').forEach(function(button) {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      sumarContador();
      
      btnEliminarTodo.style.display = "block";
      setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);
      const card = createCardToCar(this);

      sumarValorTotal(parseFloat(this.getAttribute('data-precio')));
      setCookie("valorTotal", valorTotal, 365);

      divHtml.appendChild(card);
      setCookie("cards", divHtml.innerHTML, 365);
    });
  });

//funcion para crear las cards de los productos agregados al carrito
function createCardToCar(button) {
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
    console.log(`valor borrado: ${precioProducto}`);
    valorTotal = valorTotal - parseFloat(precioProducto);
    console.log(`valor actual: ${valorTotal}`);
    card.remove();
    contador--;
    textContador.innerHTML = contador;
    textValorTotal.innerHTML = valorTotal;
    if (contador === 0) {
      btnEliminarTodo.style.display = "none";
    }
    setCookie("cards", divHtml.innerHTML, 365);
    setCookie("contador", contador, 365);
    setCookie("valorTotal", valorTotal, 365);
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
  valorTotal = 0;
  console.log(valorTotal);
  textContador.innerHTML = contador;
  textValorTotal.innerHTML = valorTotal;
  divHtml.innerHTML = '';
  btnEliminarTodo.style.display = "none";
  

  setCookie("contador", "", -1);
  setCookie("valorTotal", "", -1);
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

const sumarValorTotal = (precio) => {
  valorTotal = valorTotal+precio;
  console.log(valorTotal);
  textValorTotal.innerHTML = valorTotal;
  setCookie("valorTotal", valorTotal, 365);
}

const buttonsCategories = () =>{

  const btnCategoriaAll = document.createElement('button');
  btnCategoriaAll.classList.add('btn', 'btn-outline-dark', 'btn-sm' , 'mx-1');
  btnCategoriaAll.innerHTML = 'Mostrar Todo';

  if(divBotones){
    divBotones.appendChild(btnCategoriaAll);
  
    btnCategoriaAll.addEventListener('click', function() {
      filterItems.innerHTML = "";
      divListaItems.classList.remove('d-none');
      divListaItems.classList.add('d-block');
    });
  
    categorias.forEach(function (category) {
  
      const btnCategoria = document.createElement('button');
      btnCategoria.classList.add('btn', 'btn-outline-dark', 'btn-sm' , 'mx-1');
      btnCategoria.innerHTML = category.nombre;
      
      btnCategoria.addEventListener('click', function() {
        filterItems.innerHTML = "";
        divListaItems.classList.add('d-none');

        const productosCategoriaFilter = productos.filter(function(producto) {
          return producto.categoria_id === category.id;
        });

        console.log(JSON.stringify(productosCategoriaFilter));

        productosCategoriaFilter.forEach(function(producto) {
          
          const card = createCardElementJson(producto);
          filterItems.style.display="block";

          const divFilterItems = document.createElement('div');
          divFilterItems.classList.add('col-lg-4','col-md-4','col-sm-12','pb-5','px-3');

          divFilterItems.appendChild(card);
          filterItems.appendChild(divFilterItems);
        });
      });
  
      divBotones.appendChild(btnCategoria);
      
    });
  }

}

function obtenerNombreCategoria(id) {
  const categoria = categorias.find(categoria => categoria.id === id);
  return categoria ? categoria.nombre : 'Categoría no encontrada';
}
function obtenerNombreTipoProducto(id) {
  const tipo_producto = tiposProducto.find(tipo_producto => tipo_producto.id === id);
  return tipo_producto ? tipo_producto.nombre : 'Tipo Producto no encontrado';
}


//funcion para crear las cards de los productos por tipo de producto
function createCardElementJson(producto) {

  const card = document.createElement('div');
  card.classList.add('card', 'bg-light', 'text-center');

  const cardBody = document.createElement('div');
  cardBody.classList.add('card-body');

  const nombreProducto = producto.nombre;
  const descripcion = producto.descripcion;
  const categoria_id = producto.categoria_id;
  const nombreCategoria = obtenerNombreCategoria(categoria_id);
  
  const talla_id = producto.talla_id;
  const tipoProducto   = producto.tipo_producto_id;
  const nombreTipoProducto = obtenerNombreTipoProducto(tipoProducto);
  const descuento   = producto.descuento;
  const precio = producto.precio;
  const precio_final = producto.precio_final;
  const imgProducto    = producto.imagen_url;


  const nombreElement = document.createElement('div');
  nombreElement.classList.add('card-header');
  nombreElement.textContent = nombreProducto;

  const descripcionElement = document.createElement('h6');
  descripcionElement.classList.add('card-title');
  descripcionElement.textContent = descripcion;

  const imgElement = document.createElement('img');
  imgElement.classList.add('card-img');
  imgElement.src = imgProducto;

  const categoriaElement = document.createElement('p');
  categoriaElement.classList.add('card-text', 'text-muted');
  categoriaElement.innerHTML = `Categoria: <strong>${nombreCategoria}</strong>`;

  const tipoElement = document.createElement('p');
  tipoElement.classList.add('card-text', 'text-muted');
  tipoElement.innerHTML = `Tipo: <strong>${nombreTipoProducto}</strong>`;

  const precioElement = document.createElement('p');
  precioElement.classList.add('card-text');
  precioElement.innerHTML = `Precio Regular: ${precio}€`;

  const precioFinalElement = document.createElement('div');
  precioFinalElement.classList.add('card-footer');
  precioFinalElement.innerHTML = `<strong>${precio_final}€</strong>`;

  const btnAddToCar = document.createElement('button');
  btnAddToCar.classList.add('btn', 'btn-warning');
  btnAddToCar.setAttribute('data-nombre', nombreProducto);
  btnAddToCar.setAttribute('data-imagen', imgProducto);
  btnAddToCar.setAttribute('data-tipo', nombreTipoProducto);
  btnAddToCar.setAttribute('data-precio', precio_final); 
  btnAddToCar.innerHTML = 'Agregar al carrito';

  btnAddToCar.addEventListener('click', function(e) {    
        e.preventDefault();
        sumarContador();
        btnEliminarTodo.style.display = "block";
        // setCookie("btn_removeAll", btnEliminarTodo.style.display, 365);

        const card = createCardToCar(this);
        sumarValorTotal(parseFloat(precio_final));
        setCookie("valorTotal", valorTotal, 365);

        divHtml.appendChild(card);
        setCookie("cards", divHtml.innerHTML, 365);
  });

  cardBody.appendChild(imgElement);
  cardBody.appendChild(descripcionElement);
  cardBody.appendChild(categoriaElement);
  cardBody.appendChild(precioElement);
  cardBody.appendChild(tipoElement);
  
  card.appendChild(nombreElement);
  card.appendChild(cardBody);
  card.appendChild(precioFinalElement);
  card.appendChild(btnAddToCar);
  return card;
}

buttonsCategories();

