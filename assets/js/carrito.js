const divHtml = document.querySelector('#new-product');
const divBotones = document.querySelector('#btn-categorias');
const textContador = document.querySelector('#contador');
const textValorTotal = document.querySelector('#valor-total');
const carroVacio = document.querySelector('#carro-vacio');
const btnEliminarTodo = document.querySelector('#btn-delete-all');
const filterItems = document.querySelector('#lista-items-filter');
const divListaItems = document.querySelector('#lista-items');
const resultsContainer = document.getElementById('results-container');
const searchInput = document.getElementById('search-input');

let contador = 0;
let valorTotal = 0;


const storedCounter = getCookie("contador");
const storedValorTotal = getCookie("valorTotal");

// console.log(JSON.stringify(productos));
// console.log(productos);


if (searchInput)  {
  searchInput.value = "";
searchInput.addEventListener('input', (e) => {
  const valorBusqueda = e.target.value.toLowerCase();
  const resultados = productos.filter(producto => producto.nombre.toLowerCase().includes(valorBusqueda));

  console.log('Resultados del Input:', resultados);
  
  resultsContainer.innerHTML = '';
  if(resultados.length === 0) {

    filterItems.innerHTML = "";
    divListaItems.classList.remove('d-block');
    divListaItems.classList.add('d-none');

      mensajeProductosVacio();
      resultsContainer.innerHTML = 'No hay resultados';
      return;
  }
  if(valorBusqueda === '') {
    filterItems.innerHTML = "";
    divListaItems.classList.remove('d-none');
    divListaItems.classList.add('d-block');
      return;
  }

  // Crear un elemento de lista desplegable
  const dropdownList = document.createElement('ul');
  dropdownList.classList.add('dropdown-menu', 'show', 'w-75');

  document.addEventListener('click', function(event) {

    const dropdownContainer = document.querySelector('.dropdown');
    const isClickInside = dropdownContainer.contains(event.target);
  
    if (!isClickInside) {
      dropdownList.classList.remove('show');
    }
  });
  

  filterItems.innerHTML = "";
  resultados.forEach((producto) => {
    divListaItems.classList.add('d-none');

    filtrarProductosInput(producto.nombre);
    // Crear un elemento de lista desplegable

    const productoElement = document.createElement('li');
    const linkElement = document.createElement('a');
    linkElement.textContent = producto.nombre;
    linkElement.classList.add('dropdown-item');
    linkElement.href = '#';
    linkElement.addEventListener('click', (e) => {
        e.preventDefault();
        filterItems.innerHTML = "";
        seleccionarProducto(producto);
    });
    productoElement.appendChild(linkElement);
    dropdownList.appendChild(productoElement);
  });

  // Añadir la lista desplegable al contenedor de resultados
  resultsContainer.appendChild(dropdownList);
});
}

function seleccionarProducto(producto) {
  const searchInput = document.getElementById('search-input');
  searchInput.value = producto.nombre;
  resultsContainer.innerHTML = '';
  console.log('Producto seleccionado:', producto);
  filtrarProductosInput(producto.nombre);
}


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
  const descuentoProducto = button.getAttribute('data-descuento');

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

  const descuentoElement = document.createElement('p');
  descuentoElement.classList.add('card-text', 'text-danger');
  descuentoElement.innerHTML = `-${descuentoProducto}%`;


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

  //TODO

  if (tipoProducto === "Prime") {
    cardBody.appendChild(tipoElement);
    // cardBody.appendChild(descuentoElement);
  }

  // cardBody.appendChild(descuentoElement);
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
      searchInput.value = "";
      filterItems.innerHTML = "";
      divListaItems.classList.remove('d-none');
      divListaItems.classList.add('d-block');
    });
  
    categorias.forEach(function (category) {
  
      const btnCategoria = document.createElement('button');
      btnCategoria.classList.add('btn', 'btn-outline-dark', 'btn-sm' , 'mx-1');
      btnCategoria.innerHTML = category.nombre;

      // console.log(JSON.stringify(productos));
      
      btnCategoria.addEventListener('click', function() {
        resultsContainer.innerHTML = '';
        searchInput.value = "";
        filterItems.innerHTML = "";
        divListaItems.classList.add('d-none');
        filtrarProductosInput(category.id);
      });
  
      divBotones.appendChild(btnCategoria);
      
    });
  }

}

function mensajeProductosVacio() {

  const alerta = document.createElement('div');
  alerta.classList.add('alert', 'alert-warning', 'text-center', 'mt-3', 'w-100');
  alerta.innerHTML = "No hay productos en esta categoría"
  filterItems.appendChild(alerta);
  filterItems.style.display="block";
}

function filtrarProductosInput(criterio) {
  // filterItems.innerHTML = "";
  // divListaItems.classList.add('d-none');
  const productosFilter = productos.filter(function(producto) {
    return producto.categoria_id === criterio || producto.nombre === criterio;
    // return producto.nombre === criterio || producto.categoria === criterio;
  });

  // console.log(`Productos filtrados por: ${criterio} son: ${productosFilter.length} productos`);
  // console.log(productosFilter);

  if (productosFilter.length === 0) {
      mensajeProductosVacio();
  } 
  else
  {
    productosFilter.forEach(function(producto) {
      
      const card = createCardElementJson(producto);
      filterItems.style.display="block";

      const divFilterItems = document.createElement('div');
      divFilterItems.classList.add('col-lg-4','col-md-4','col-sm-12','pb-5','px-3');

      divFilterItems.appendChild(card);
      filterItems.appendChild(divFilterItems);
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

  const cardLink = document.createElement('a');
  cardLink.classList.add('link-dark');
  cardLink.href = '../public/catalogo.php?id=' + producto.id;

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


  const categoriaElement = document.createElement('div');
  categoriaElement.classList.add('card-header');
  categoriaElement.textContent = nombreCategoria;

  const nombreElement = document.createElement('h5');
  nombreElement.classList.add('card-title');
  nombreElement.textContent = nombreProducto;



  const descripcionElement = document.createElement('p');
  descripcionElement.classList.add('card-text','text-muted');
  descripcionElement.textContent = descripcion;

  const imgElement = document.createElement('img');
  imgElement.classList.add('card-img', 'py-3');
  imgElement.src = imgProducto;

  const tipoElement = document.createElement('p');
  tipoElement.classList.add('card-text', 'text-muted');
  tipoElement.innerHTML = `Tipo: <strong>${nombreTipoProducto}</strong>`;

  const precioPrimeElement = document.createElement('div');
  precioPrimeElement.classList.add('d-flex', 'justify-content-center', 'align-items-center', 'gap-2');


    const precioElement = document.createElement('div');
    precioElement.classList.add('card-text');
    precioElement.classList.add('text-decoration-line-through', 'text-danger');
    precioElement.innerHTML = `${precio}€`; // Mover esta línea fuera del bloque if
    
    const ofertaElement = document.createElement('div');
    ofertaElement.classList.add('d-flex', 'flex-column', 'flex-lg-row', 'gap-1', 'align-items-center');
    
      const textoOferta = document.createElement('div');
      textoOferta.classList.add('text-danger');
      textoOferta.innerHTML = 'Oferta: ';
      
      const descuentoElement = document.createElement('span');
      descuentoElement.classList.add('badge', 'bg-danger');
      descuentoElement.innerHTML = `-${descuento}%`;
    
    if (producto.tipo_producto_id == 1) {
        
        ofertaElement.appendChild(textoOferta);
        ofertaElement.appendChild(descuentoElement);

        precioPrimeElement.appendChild(precioElement);
        precioPrimeElement.appendChild(ofertaElement);
    }

  const precioFinalElement = document.createElement('div');
  precioFinalElement.classList.add('card-footer');
  precioFinalElement.innerHTML = `<strong>${precio_final}€</strong>`;

  const btnAddToCar = document.createElement('button');
  btnAddToCar.classList.add('btn', 'btn-warning');
  btnAddToCar.setAttribute('data-nombre', nombreProducto);
  btnAddToCar.setAttribute('data-imagen', imgProducto);
  btnAddToCar.setAttribute('data-tipo', nombreTipoProducto);
  btnAddToCar.setAttribute('data-descuento', descuento);
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
  cardBody.appendChild(nombreElement);
  cardBody.appendChild(descripcionElement);
  // cardBody.appendChild(precioElement);
  cardBody.appendChild(tipoElement);
  cardBody.appendChild(precioPrimeElement);
  
  cardLink.appendChild(categoriaElement);
  cardLink.appendChild(cardBody);
  cardLink.appendChild(precioFinalElement);
  
  card.appendChild(cardLink);
  card.appendChild(btnAddToCar);

  return card;
}

buttonsCategories();

