const divHtml = document.querySelector('#new-product');
const textContador = document.querySelector('#contador');
textContador.innerHTML = 0;
let contador = 0;

document.querySelectorAll('.btn-add').forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    contador++;
    textContador.innerHTML = contador;

    const card = document.createElement('div');
    card.classList.add('card');
    card.classList.add('w-100');
    
    const cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
    cardBody.classList.add('d-flex');
    cardBody.classList.add('flex-column');
    cardBody.classList.add('align-items-center');
    cardBody.classList.add('py-1');
    
    const nombreProducto = document.querySelector('#name-producto').textContent;
    const imgProducto = document.querySelector('#img-producto').getAttribute('src');
    const precioProducto = document.querySelector('#price-producto').textContent;
    
    const nombreElement = document.createElement('h4');
    nombreElement.classList.add('card-title');
    nombreElement.classList.add('text-center');
    nombreElement.textContent = nombreProducto;
    
    const imgElement = document.createElement('img');
    imgElement.classList.add('card-img-top');
    imgElement.classList.add('w-50');
    imgElement.src = imgProducto;
    
    const precioElement = document.createElement('p');
    precioElement.classList.add('card-text');
    precioElement.classList.add('text-center');
    precioElement.classList.add('py-1');
    precioElement.innerHTML = `<strong>${precioProducto}</strong>`;
    
    const btnRemove = document.createElement('button');
    btnRemove.classList.add('btn');
    btnRemove.classList.add('btn-danger');
    btnRemove.textContent = 'Borrar';
    btnRemove.addEventListener('click', function() {
      contador--;
      textContador.innerHTML = contador;
      card.remove();
    });
    
    cardBody.appendChild(nombreElement);
    cardBody.appendChild(imgElement);
    cardBody.appendChild(precioElement);
    cardBody.appendChild(btnRemove);
    
    card.appendChild(cardBody);
    divHtml.appendChild(card);
  });
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