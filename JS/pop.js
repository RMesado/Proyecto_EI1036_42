
function popup(){
    document.getElementById("ventanita").style.visibility="visible";

}

function fuctionhide(){
    document.getElementById("ventanita").style.visibility="hidden";

}


//guardar y cargar cosas del fromulario de productos
function guardarDatos(){
  var inputName = document.getElementById("producto");
  var inputDesc = document.getElementById("descripcion");
  var inputPrec = document.getElementById("precio");
  localStorage.setItem("nombre", inputName.value);
  localStorage.setItem("descrip", inputDesc.value);
  localStorage.setItem("precio", inputPrec.value);
}

function guardarDatoFile(){
  var inputFile = document.getElementById("update");
  localStorage.setItem("foto", inputFile.value);
}

window.onload = function recuperarDatos(){
  var inputName = localStorage.getItem("nombre");
  var inputDesc = localStorage.getItem("descrip");
  var inputPrec = localStorage.getItem("precio");
  var inputFile = localStorage.getItem("foto");
  let arrayFoto= inputFile.split("\\");
  var nombreFoto = arrayFoto[2];

  document.getElementById("producto").value = inputName;
  document.getElementById("descripcion").value = inputDesc;
  document.getElementById("precio").value = inputPrec;
  document.getElementById("foto").value = "./img/"+nombreFoto;

}




//cosas para hacer flotante el carro de manolo
function startDrag(){
  document.onmouseup=finishDrag
  document.onmousemove=moveElement
}
function moveElement(e){
  divCaja.style.top=(divCaja.offsetTop + e.movementY) +'px';
  divCaja.style.left=(divCaja.offsetLeft + e.movementX) +'px';
}
function finishDrag(e){
  document.onmouseup = null;
  document.onmousemove=null;
  
}




(function(){
    let lista = JSON.parse(localStorage.getItem('cesta'))
    if(lista && lista.length>0)
      lista.forEach(tarea => anyadir(tarea))
})()

function anyadir(tarea){
  let nodo = document.createElement('li')
  
  let span = document.createElement('span')
  span.classList.add('data-tarea') // añadimos una nueva clase al atributo 'class'

  if (tarea) {
     span.textContent = tarea[1]
     span.id=tarea[0]}
  else /*si el contenido es vacio return */
     span.textContent = document.getElementById('tarea').value
  
  nodo.appendChild(span)

  let boton = document.createElement('button')
  boton.textContent = 'Hecho'
  nodo.appendChild(boton)
  boton.onclick = eliminar
  boton.classList.add('boton')

  document.getElementById('list').appendChild(nodo)
}

function eliminar(){
  this.parentNode.remove()
}

function guardar(){
  let lista = document.querySelectorAll('.data-tarea')
  //hay que conseguir que no guarde el contenido del boton
  lista = Array.from(lista).map(n => n.textContent)
  localStorage.setItem('cesta', JSON.stringify(lista))
}


function cesta(){
  let producto= this.id.split("_")
  anyadir(producto)

}
function cesta_ver(){
  document.getElementById("caro_movil").style.visibility="visible";

}

function ocultar_cesta(){
  document.getElementById("caro_movil").style.visibility="hidden";

}