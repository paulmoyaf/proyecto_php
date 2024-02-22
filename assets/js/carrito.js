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
const btnAddCar = document.querySelectorAll('btn-add');





let contadoresProductos = {};
console.log('contadorProductos', contadoresProductos);


// console.log(JSON.stringify(productos));

function searchInputBuscador() {

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

function mostrarBotonEliminarTodo() {
  if (contarProductosLocalStorage() > 0) {
    btnEliminarTodo.style.display = "block";
  }else{
    mostrarCarroVacio();
  }
}


function funcionBtnEliminarProducto() {
  if (btnEliminarTodo)  {
    btnEliminarTodo.addEventListener('click', function() {

      divHtml.innerHTML = '';
      btnEliminarTodo.style.display = "none";
      
      eliminarProductosLocalStorage();
      actualizarPrecioTotalLocalStorage();
      actualizarContadorLocalStorage();
      mostrarCarroVacio();
      // setCookie("cards", "", -1);
    });
  }
}


function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
  document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

function getCookie(name) {
  const cookieName = encodeURIComponent(name) + "=";
  const cookies = document.cookie.split(";").map(cookie => cookie.trim());

  for (let cookie of cookies) {
      if (cookie.startsWith(cookieName)) {
          try {
              return decodeURIComponent(cookie.substring(cookieName.length));
          } catch (e) {
              console.error(e);
              return "";
          }
      }
  }
  return "";
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
      divFilterItems.classList.add('col-lg-4','col-md-4','col-6','pb-5','px-3');

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

function actualizarCardProducto(producto, card) {
  const selectCantidad = card.querySelector('select');
  const precioElement = card.querySelector('p.card-text');

  if (selectCantidad) {
      // Si el elemento select existe, eliminar todas las opciones existentes
      selectCantidad.innerHTML = '';
      precioElement.innerHTML = '';
      
      // Crear nuevas opciones y agregarlas al elemento select
      let contadorProducto = contarMismoProductoLocalStorage(producto)+1;

      for (let i = 1; i <= contadorProducto; i++) {
          const option = document.createElement("option");
          option.value = i;
          option.textContent = i;
          if (i === contadorProducto) {
              option.selected = true;
          }
          selectCantidad.appendChild(option);
          precioElement.innerHTML = `<strong>${producto.precio_final*selectCantidad.value}€</strong>`;
      }
  }
}

function createCardToCar(producto) {

  const card = document.querySelector(`[name="${producto.nombre}"]`);


    if (card) {
      actualizarCardProducto(producto, card);
    } else {

    const card = document.createElement("div");
    card.setAttribute('name', producto.nombre);
    card.classList.add(
      "card",
      "mb-3",
      "p-3",
      "col-3", 
      "col-md-12",
      "col-lg-12",
      "bg-light",
      "text-center"
    );

    const filaCard = document.createElement("div");
    filaCard.classList.add("row");

    const columnaIzquierda = document.createElement("div");
    columnaIzquierda.classList.add("col-md-4");

    const columnaDerecha = document.createElement("div");
    columnaDerecha.classList.add("col-md-8");

    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    const nombreElement = document.createElement("h6");
    nombreElement.classList.add("card-title");
    nombreElement.textContent = producto.nombre;

    const imgElement = document.createElement("img");
    imgElement.classList.add("card-img", "w-100");
    imgElement.src = producto.imagen_url;

    const tipoElement = document.createElement("p");
    tipoElement.classList.add("card-text", "text-muted");
    tipoElement.innerHTML = producto.tipo_producto_id;

    const precioElement = document.createElement("p");
    precioElement.classList.add("card-text");
    precioElement.innerHTML = `<strong>${producto.precio_final}€</strong>`;

    const ofertaElement = document.createElement("div");
    ofertaElement.classList.add("d-flex", "gap-1", "align-items-center");

    const textoOferta = document.createElement("div");
    textoOferta.classList.add("text-danger");
    textoOferta.innerHTML = "Oferta: ";

    const descuentoElement = document.createElement("span");
    descuentoElement.classList.add("badge", "bg-danger");
    descuentoElement.innerHTML = `-${producto.descuento}%`;

    const divCantidadMasBoton = document.createElement("div");
    divCantidadMasBoton.classList.add("d-flex", "gap-1", "align-items-center", "mb-3");


    const selectCantidad = document.createElement("select");
    selectCantidad.classList.add("form-select", "w-50", "mx-auto");
    selectCantidad.setAttribute("aria-label", "Default select example");
    selectCantidad.setAttribute("name", producto.nombre);

    const option = document.createElement('option');
    option.text = contarMismoProductoLocalStorage(producto)+1;
    selectCantidad.add(option);


    selectCantidad.addEventListener("change", function () {
      const precio = producto.precio_final * selectCantidad.value;
      precioElement.innerHTML = `<strong>${precio}€</strong>`;
      actualizarProductoLocalStorage(producto, selectCantidad.value);
      informacionCarrito();
      actualizarPrecioTotalLocalStorage();
      actualizarContadorLocalStorage();

    });

    const btnAddProduct = document.createElement("button");
    btnAddProduct.classList.add("btn", "btn-warning", "w-50", "btn-add");
    btnAddProduct.innerHTML = "+";
    btnAddProduct.addEventListener("click", function () {
      guardarCardLocalStorage(producto);
    });


    const btnRemove = document.createElement("button");
    btnRemove.classList.add(
      "btn",
      "btn-small",
      "btn-outline-danger",
      "w-100",
      "btn-remove"
    );
    btnRemove.innerHTML = "Borrar producto";
    btnRemove.addEventListener("click", function () {
      eliminarProductoLocalStorage(producto, selectCantidad.value);
      card.remove();
      actualizarPrecioTotalLocalStorage();
      actualizarContadorLocalStorage();
      mostrarCarroVacio();

      if (contarProductosLocalStorage() === 0) {
        btnEliminarTodo.style.display = "none";
      }

    });


    columnaIzquierda.appendChild(imgElement);
    columnaDerecha.appendChild(cardBody);
    cardBody.appendChild(nombreElement);

    //TODO - Agregar descuento a la card

    divCantidadMasBoton.appendChild(selectCantidad);
    divCantidadMasBoton.appendChild(btnAddProduct);

    cardBody.appendChild(precioElement);
    columnaDerecha.appendChild(divCantidadMasBoton);
    columnaDerecha.appendChild(btnRemove);

    filaCard.appendChild(columnaIzquierda);
    filaCard.appendChild(columnaDerecha);

    card.appendChild(filaCard);
    return card;
  }
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
  precioFinalElement.style.fontSize = "larger";
  precioFinalElement.innerHTML = `${precio_final}€`;

  const btnAddToCar = document.createElement('button');
  btnAddToCar.classList.add('btn', 'btn-warning', 'w-100', 'btn-add');
  btnAddToCar.setAttribute('data-nombre', producto.nombre);
  btnAddToCar.setAttribute('data-imagen', producto.imagen_url);
  btnAddToCar.setAttribute('data-tipo', producto.tipo_producto_id);
  btnAddToCar.setAttribute('data-descuento', producto.descuento);
  btnAddToCar.setAttribute('data-precio', producto.precio_final); 
  btnAddToCar.innerHTML = 'Agregar al carrito';

  btnAddToCar.addEventListener('click', function(e) {

        e.preventDefault();
        guardarCardLocalStorage(producto);
        btnEliminarTodo.style.display = "block";
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


document.querySelectorAll('.btn-add').forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    producto = {
      nombre: this.getAttribute("data-nombre"),
      imagen_url: this.getAttribute("data-imagen"),
      tipo_producto_id: this.getAttribute("data-tipo"),
      descuento: this.getAttribute("data-descuento"),
      precio_final: this.getAttribute("data-precio"),
    };

      guardarCardLocalStorage(producto);
      btnEliminarTodo.style.display = "block";      
  });
});

function guardarCardLocalStorage(producto) {
  const card = createCardToCar(producto);
  if(!buscarProductoLocalStorage(producto)){
    divHtml.appendChild(card);
  }
  guardarProductosLocalStorage(producto);
  actualizarPrecioTotalLocalStorage();
  actualizarContadorLocalStorage();
}

 function informacionCarrito() {
    const carritoProducts = obtenerProductosLocalStorage();
    console.log('Productos en el carrito:', carritoProducts.length);
    console.log('Precio total LocalStorage:', getPrecioTotalLocalStorage());
  }


  function guardarProductosLocalStorage(producto) {
    let carritoProducts = JSON.parse(localStorage.getItem('carritoProducts')) || [];
    carritoProducts.push(producto);
    localStorage.setItem('carritoProducts', JSON.stringify(carritoProducts));
    informacionCarrito();
  }
  
  function obtenerProductosLocalStorage() {
    return JSON.parse(localStorage.getItem('carritoProducts')) || [];
  }


  function eliminarProductosLocalStorage() {
    localStorage.removeItem('carritoProducts');
    contadoresProductos = {};
    informacionCarrito();
  }

  function contarProductosLocalStorage() {
    const carritoProducts = obtenerProductosLocalStorage();
    console.log('Productos en el carrito:', carritoProducts.length);
    return carritoProducts.length;
  }


  function eliminarProductoLocalStorage(producto, cantidad) {
    const carritoProducts = obtenerProductosLocalStorage();
    let contador = 0;

    const newCarritoProducts = carritoProducts.reduce((newCarrito, p) => {
        if (p.nombre === producto.nombre && contador < cantidad) {
            contador++;
        } else {
            newCarrito.push(p);
        }
        return newCarrito;
    }, []);

    localStorage.setItem('carritoProducts', JSON.stringify(newCarritoProducts));
}

function actualizarProductoLocalStorage(producto, cantidad) {
  const carritoProducts = obtenerProductosLocalStorage();

  const cantidadActual = carritoProducts.filter(p => p.nombre === producto.nombre).length;
  const diferencia = cantidadActual - cantidad;

  let newCarritoProducts;

  if (diferencia > 0) {
      let contador = 0;

      newCarritoProducts = carritoProducts.reduce((newCarrito, p) => {
          if (p.nombre === producto.nombre && contador < diferencia) {
              contador++;
          } else {
              newCarrito.push(p);
          }
          return newCarrito;
      }, []);
  } else if (diferencia < 0) {
      newCarritoProducts = [...carritoProducts];

      for (let i = 0; i < -diferencia; i++) {
          newCarritoProducts.push(producto);
      }
  }

  if (newCarritoProducts) {
      localStorage.setItem('carritoProducts', JSON.stringify(newCarritoProducts));
  }
}


function actualizarContadorLocalStorage() {
  const carritoProducts = obtenerProductosLocalStorage();
  textContador.innerHTML = carritoProducts.length;
}

function actualizarPrecioTotalLocalStorage() {
  if (textValorTotal){
  textValorTotal.innerHTML = getPrecioTotalLocalStorage();
  }
}

function getPrecioTotalLocalStorage() {
  const carritoProducts = obtenerProductosLocalStorage();
  let total = 0;
  carritoProducts.forEach(producto => {
    total += parseFloat(producto.precio_final);
  });
  return total;
}


  function buscarProductoLocalStorage(producto) {
    const carritoProducts = obtenerProductosLocalStorage();
    const productoEncontrado = carritoProducts.find(p => p.nombre === producto.nombre);
    // console.log('Producto encontrado:', productoEncontrado);
    return productoEncontrado;
  }

  function contarMismoProductoLocalStorage(producto) {

    const carritoProducts = obtenerProductosLocalStorage();
    const mismoProducto = carritoProducts.filter(p => p.nombre === producto.nombre);
    return mismoProducto.length;
  }



  buttonsCategories();
  searchInputBuscador();
  funcionBtnEliminarProducto();



  actualizarPrecioTotalLocalStorage();
  actualizarContadorLocalStorage();
  mostrarBotonEliminarTodo();

  mostrarProductosLocalStorage();


  function mostrarProductosLocalStorage() {
    const carritoProducts = obtenerProductosLocalStorage();
    console.log('Productos en el carrito:', carritoProducts.length);
    carritoProducts.forEach(producto => {
      const card = createCardToCar(producto);
      divHtml.appendChild(card);
    });
  }




