let divHtml = document.querySelector('#new_product');
let item = document.querySelector('#producto');
let titulo_move = document.getElementById("#titulo");

let btn_removeAll = document.createElement('button');
let text_contador = document.querySelector('#contador');
text_contador.innerHTML = 0;


item.value = "";
let contador = 0;
console.log("contador inicial= "+contador);

document.getElementById("btn-add").addEventListener("click", function(e) {
  e.preventDefault(); // para no recargar la pagina
  // if (item.value != ""){
    divHtml.style.pointerEvents = "auto";
    contador = contador + 1;
    console.log("contador add= "+ (contador));
    crearProducto();
    borrarItems(divHtml);

  // }

});


crearProducto = () => {
    text_contador.innerHTML = contador;

    let newItem = document.createElement('div');
    newItem.classList.add("row");
    newItem.classList.add("list-group-item");
    newItem.classList.add("d-flex");
    newItem.classList.add("justify-content-between");
    newItem.classList.add("align-items-center");
  
    let nombreProducto = document.createElement('div');
    nombreProducto.textContent = item.value;
    let getText = nombreProducto.textContent;

    var colDerecha = document.createElement("div");
    
    let btn_edit = document.createElement('button');
    btn_edit.classList.add("mr-2");
    btn_edit.classList.add("btn");
    btn_edit.classList.add("btn-secondary");
    btn_edit.type = "button";
    btn_edit.textContent = "Editar";
    
    
    let btn_remove = document.createElement('button');
    btn_remove.classList.add("btn");
    btn_remove.classList.add("btn-warning");
    btn_remove.type = "button";
    btn_remove.textContent = "Borrar";
    
    colDerecha.appendChild(btn_edit);
    colDerecha.appendChild(btn_remove);

    btn_remove.addEventListener("click", function(e) {
      e.preventDefault();
      newItem.remove();
      contador = contador -1;
      text_contador.innerHTML = contador;
      console.log("contador remove: "+contador)
      if (contador==0){
        divHtml.innerHTML = "";
      }
    });



    divHtml.appendChild(newItem);
    newItem.appendChild(nombreProducto);
    newItem.appendChild(colDerecha);
    divHtml.appendChild(btn_removeAll);
    item.value = "";


    btn_edit.addEventListener("click", function(e){
      e.preventDefault();
      console.log("contador editar: "+contador)
      text_contador.innerHTML = "editando";
      divHtml.style.pointerEvents = "none";
      contador--;
      editarItem(getText,item,newItem);
      
      // text_contador.innerHTML = contador--;
    });
     
  }


  const borrarItems = (divHtml) => {
    btn_removeAll.classList.add("btn");
    btn_removeAll.classList.add("btn-danger");
    btn_removeAll.classList.add("mt-3");
    btn_removeAll.type = "button";
    btn_removeAll.textContent = "Borrar Todo";
    
    btn_removeAll.addEventListener("click", function(e) {
      e.preventDefault();
      contador = 0; 
      divHtml.innerHTML = "";
      text_contador. innerHTML = contador;
    });    
  }

  const editarItem = (text,item,newItem) => {
    item.value = text;
    newItem.remove();
  }

    // document.addEventListener("mousemove",function (e) {

    //   console.log("Pos X:"+e.pageX)
    //   console.log("Pos Y:"+e.pageY)


    // })