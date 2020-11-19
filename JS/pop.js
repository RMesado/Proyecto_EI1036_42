
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

  if (tarea) 
     span.textContent = tarea
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

function anyadir2(tarea){
  
  let nodo2=document.createElement("tr")
  
  let span = document.createElement('span')
  span.classList.add('data-tarea') // añadimos una nueva clase al atributo 'class'

  if (tarea){ 
    var producto=tarea.split(',')
    for( var i=0 ; i<producto.length;i++){
      let celda=document.createElement('th')
      
      if (i==0){
        celda.classList.add("id");
      }
      if (i==2){
        var variable=document.createElement("IMG")
        variable.setAttribute('src',producto[i])
      }else{
        var variable=document.createTextNode(producto[i])
      }
      celda.appendChild(variable)
      nodo2.appendChild(celda)
  }
     span.textContent = tarea
  }else /*si el contenido es vacio return */
     span.textContent = document.getElementById('tarea').value

  //nodo2.appendChild(span)
  let boton = document.createElement('button')
  boton.textContent = 'Hecho'
  let celda=document.createElement('th')
  celda.appendChild(boton)
  nodo2.appendChild(celda)
  boton.onclick = eliminar2
  boton.classList.add('boton')

  document.getElementById('tabla').appendChild(nodo2)
}
function eliminar2(){
  this.parentNode.parentNode.remove()
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


function cesta(id){
  anyadir2(id)

}
function cesta_ver(){
  var ver=document.getElementById("caro_movil")
  if (ver.style.visibility=='visible'){
    ver.style.visibility="hidden"
  }else{
    ver.style.visibility="visible"
  }
}



// Validacion datos registro de usuario

function validacionEmail(){
  let email = document.getElementById('email');
  var patron = /\S+@\S+\.\S+/;
 

  if (!patron.test(email.value)) //Regular expressions to validate email
    {
      email.style.borderColor = 'red';
    }else{
      email.style.borderColor = 'green'
    }

    
  }

  function validacionUsername(){
    let username = document.getElementById("username")
    if (!/^[a-zA-Z]*$/g.test(username.value)) {
      username.style.borderColor = 'red';
    }else{
      username.style.borderColor = 'green'
    }
  }

  function validacionPasswd(){
    let password = document.getElementById("passwd")

    if (password.value.length < 4) {
      password.style.borderColor = 'red';
    } else if (password.value.search(/[a-z]/) < 0) {
      password.style.borderColor = 'red';
    } else if(password.value.search(/[A-Z]/) < 0) {
      password.style.borderColor = 'red';
    } else  if (password.value.search(/[0-9]/) < 0) {
      password.style.borderColor = 'red';
    } else{
      password.style.borderColor = 'green'
    }
  }


  function submitClick(e) {

    if (formValidation()) {
      alert("Registro con éxito");
      return true;
    } else {
      e.preventDefault();
      return false;
    }
  }

  function formValidation() {
    let email = document.getElementById('email')
    let username = document.getElementById("username")
    let password = document.getElementById("passwd")
    var patronEm = /\S+@\S+\.\S+/;
    flag = true;


    // Validar solo letras en el nombre
    if (!/^[a-zA-Z]*$/g.test(username.value)) {
      alert("Introduce un usuario válido");
      flag = false;
    }

    // Validar un email correcto
    if (!patronEm.test(email.value)) //Regular expressions to validate email
    {
      alert("Introduce un email válido");
      flag = false;
    }

    // Comprobando que la contraseña sea correcta
    if (password.value.length < 4) {
      alert("Introduce una contraseña de 4 carácteres o más")
      flag = false;
    } else if (password.value.search(/[a-z]/) < 0) {
      alert("La contraseña necesita al menos una minúscula")
      flag = false;
    } else if(password.value.search(/[A-Z]/) < 0) {
      alert("La contraseña necesita al menos una mayúscula")
      flag = false;
    } else  if (password.value.search(/[0-9]/) < 0) {
      alert("La contraseña necesita al menos un número")
      flag = false;
    }

    return flag;
  }
