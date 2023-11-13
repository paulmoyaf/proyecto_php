const divHtml = document.querySelector('#new-product');
const textContador = document.querySelector('#contador');
const btnEliminarTodo = document.querySelector('#btn-delete-all');

textContador.innerHTML = 0;
let contador = 0;

document.querySelectorAll('.btn-add').forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    contador++;

    textContador.innerHTML = contador;

    btnEliminarTodo.style.display = "block";


    const card = document.createElement('div');
    card.classList.add('card');
    card.classList.add('mb-3');
    card.classList.add('p-3');
    card.classList.add('w-100');

    let filaCard  = document.createElement('div');
    filaCard.classList.add('row');

    let columnaIzquierda = document.createElement('div');
    columnaIzquierda.classList.add('col-md-4');
    let columnaDerecha = document.createElement('div');
    columnaDerecha.classList.add('col-md-8');
    
    let cardBody = document.createElement('div');
    cardBody.classList.add('card-body');

    let nombreProducto = this.getAttribute('data-nombre');
    let imgProducto = this.getAttribute('data-imagen');
    let tipoProducto = this.getAttribute('data-tipo');
    let precioProducto = this.getAttribute('data-precio');
    
    // let nombreProducto = document.querySelector('#name-producto').textContent;
    // let imgProducto = document.querySelector('#img-producto').getAttribute('src');
    // let tipoProducto = document.querySelector('#tipo-producto').textContent;
    // let precioProducto = document.querySelector('#price-producto').textContent;
    
    let nombreElement = document.createElement('h6');
    nombreElement.classList.add('card-title');
    nombreElement.textContent = nombreProducto;
    
    let imgElement = document.createElement('img');
    imgElement.classList.add('card-img');
    imgElement.classList.add('w-100');
    imgElement.src = imgProducto;

    let tipoElement = document.createElement('p');
    tipoElement.classList.add('card-text');
    tipoElement.classList.add('text-muted');
    tipoElement.innerHTML = tipoProducto;
    
    let precioElement = document.createElement('p');
    precioElement.classList.add('card-text');
    precioElement.innerHTML = `<strong>${precioProducto}</strong>`;
    
    let btnRemove = document.createElement('button');
    btnRemove.classList.add('btn');
    btnRemove.classList.add('btn-danger');
    btnRemove.classList.add('col-12');

    btnRemove.textContent = 'Borrar';
    btnRemove.addEventListener('click', function() {
      contador--;
      textContador.innerHTML = contador;
      card.remove();
      if(contador==0){
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
    divHtml.appendChild(card);
  });
});

btnEliminarTodo.addEventListener('click', function() {
  contador = 0;
  textContador.innerHTML = contador;
  divHtml.innerHTML = ''; // Eliminar todos los elementos dentro del contenedor
  btnEliminarTodo.style.display = "none";
});

// const divHtml = document.querySelector('#new-product');
// const textContador = document.querySelector('#contador');
// textContador.innerHTML = 0;
// let contador = 0;

// document.querySelectorAll('.btn-add').forEach(function(button) {
//   button.addEventListener('click', function(e) {
//     e.preventDefault();
//     contador++;
//     textContador.innerHTML = contador;
//     const card = this.parentNode.cloneNode(true);
//     const btnRemove = document.createElement('button');
//     btnRemove.classList.add('btn');
//     btnRemove.classList.add('btn-warning');
//     btnRemove.textContent = 'Borrar';
//     btnRemove.addEventListener('click', function() {
//       contador--;
//       textContador.innerHTML = contador;
//       card.remove();
//     });
//     card.appendChild(btnRemove);
//     divHtml.appendChild(card);
//   });
// });