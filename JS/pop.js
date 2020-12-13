var productid = {};
let nombreProd= [];
let shownItems =[];


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
  if (Math.round((document.getElementById("update").files.item(0).size / 1024))<=2048){
    var inputFile = document.getElementById("update");
    localStorage.setItem("foto", inputFile.value);
  }
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
        celda.setAttribute('value',producto[i])
      }
      if (i==2){
        var variable=document.createElement("IMG")
        variable.setAttribute('src',producto[i])
        variable.classList.add("imgs")
    
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
  boton.textContent = 'Borrar'
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

  //rellenar el formulario falso

  function rellenar(){
    var ids=document.getElementsByClassName("id")
    var listas=[]
    for(i=0;i<ids.length;i++){
      var valor=ids[i].getAttribute('value')
      listas=listas.concat(valor)
    }
    
    document.getElementById('nover').setAttribute('value',listas)

  }

  // Validación de la imagen
  function validarImagen(e) {

    if (Math.round((document.getElementById("update").files.item(0).size / 1024))<=2048) {
      alert("Añadida imagen con éxito");
      return true;
    } else {
      e.preventDefault();
      alert("La imagen pesa más de 2 Mb")
      return false;
    }
  }

  function rellenarVisor(json){
    if(json.length == 0){
      alert("No hay productos en ese rango de precios")
    }else{
      const visor = document.querySelector(".visor");
      const optes=document.getElementById("lista");
      while(visor.firstChild){
        visor.removeChild(visor.lastChild);
        optes.removeChild(optes.lastChild);
      }
      productid={};
      json.forEach(objeto =>{

        let div = document.createElement("div");
        div.classList.add("item");
        div.setAttribute("id",objeto.id);

        let img=document.createElement("img");
        img.setAttribute("src",objeto.imagen);
        img.style.width = "400px";
        img.style.height = "400px";
        
        let p = document.createElement("p");
        p.innerHTML = objeto.name + ", "+ objeto.precio+"€";
        p.style.fontWeight = "bold";



        let descrip = document.createElement("p");
        descrip.innerHTML= objeto.descripcion;
        descrip.style.fontWeight = "bold";
        let button = document.createElement("button");
        var coso = objeto.id +","+objeto.name+","+objeto.imagen+","+objeto.precio
        button.setAttribute("id",coso);
        button.addEventListener("click", function() {cesta(coso)});
        //button.setAttribute("onclick",'cesta('+coso+')');
        button.innerHTML="Comprar";
        
        div.appendChild(img);
        div.appendChild(p);
        div.appendChild(descrip);
        div.appendChild(button);
        visor.appendChild(div);
        var opt=document.createElement("option");
        opt.value=objeto.name;
        productid[objeto.name] = objeto.id;
        document.getElementById("lista").appendChild(opt);

      });
      //document.getElementById("busqueda").setAttribute("list","lista");
    }
  }


  function filtroPrecio(){
    var min = document.getElementById("min").value;
    var max = document.getElementById("max").value;
    fetch('/includes/precios.php?min='+min+'&max='+max)
    .then(response => response.json())
    .then(json => rellenarVisor(json))
    .catch(err => console.log(err))
  }

  function buscador(proc){
    document.getElementById(productid[proc]).scrollIntoView({behavior: "smooth"})

  }

  // Funciones versión móbil

  /* Funciones para mover el carrusel */
  var input = document.getElementById('input');
  console.log(input)

  var prev = function() {
    var carousel = document.getElementById('carousel');
    carousel.prev();
  };

  var next = function() {
    var carousel = document.getElementById('carousel');
    carousel.next();
  };

  fetch('/includes/datos.php')
.then(response => response.json())
.then(json => rellenarVisorMobile(json))
.catch(err => console.log(err))

function rellenarVisorMobile(json){
    if(json.length == 0){
      alert("No hay productos en ese rango de precios")
    }else{
      const mobile = document.getElementById("carousel");
      const optes=document.getElementById("lista");
      //while(mobile.firstChild){
      // mobile.removeChild(mobile.lastChild);
      // optes.removeChild(optes.lastChild);
      // }
      productid={};
      json.forEach(objeto =>{
        let div = document.createElement("div");
        div.classList.add("item");
        div.setAttribute("id",objeto.id);

        let img=document.createElement("img");
        img.setAttribute("src",objeto.imagen);
        img.style.width = "250px";
        img.style.height = "250px";
        
        let p = document.createElement("p");
        p.innerHTML = objeto.name + ", "+ objeto.precio+"€";
        p.style.fontWeight = "bold";

        let descrip = document.createElement("p");
        descrip.innerHTML= objeto.descripcion;
        descrip.style.fontWeight = "bold";
        let button = document.createElement("button");
        var coso = objeto.id +";"+objeto.name+";"+objeto.imagen+";"+objeto.descripcion+";"+objeto.precio
        button.setAttribute("id",coso);
        button.addEventListener("click", function() {cestaMobil(coso)});
        //button.setAttribute("onclick",'cesta('+coso+')');
        button.innerHTML="Añadir a la cesta";
        
        div.appendChild(img);
        div.appendChild(p);
        div.appendChild(descrip);
        div.appendChild(button);
        var item = document.createElement("ons-carousel-item");
        item.appendChild(div);
        mobile.appendChild(item);
        nombreProd.push(objeto.name);
        productid[objeto.name] = objeto.id;
        var opt=document.createElement("option");
        opt.value=objeto.name;
        document.getElementById("lista").appendChild(opt);

      });
      //document.getElementById("busqueda").setAttribute("list","lista");
      //mobile.refresh();
    }
  }
  

  // Cosas de cesta-----------------------------------
  
(function(){
    let lista = JSON.parse(localStorage.getItem('cesta'))
    if(lista && lista.length>0)
      lista.forEach(tarea => anyadir(tarea))
})()


function anyadir2Mobil(tarea){
  
  let nodo2=document.createElement("ons-list-item")
  nodo2.setAttribute('modifier',"longdivider")
  
  let span = document.createElement('span')
  span.classList.add('data-tarea') // añadimos una nueva clase al atributo 'class'

  if (tarea){ 
    var producto=tarea.split(';')
    let celdaFoto=document.createElement('div');
    celdaFoto.classList.add("left");

    let celda=document.createElement('div');
    celda.classList.add("center");
    
    // ID producto
      nodo2.classList.add("id");
      nodo2.setAttribute('value',producto[0])

    // IMG Producto
      var variable=document.createElement("IMG")
      variable.setAttribute('src',producto[2])
      variable.classList.add("list-item__thumbnail")
      celdaFoto.appendChild(variable)
  
    //Nombre Producto + precio
      var variable=document.createElement("span")
      variable.classList.add("list-item__title")
      variable.textContent = producto[1]+', '+producto[4]+'€';
      celda.appendChild(variable)
    
    //Descripcion producto
      var variable=document.createElement("span")
      variable.classList.add("list-item__subtitle")
      variable.textContent = producto[3]
      celda.appendChild(variable)
    
  
      nodo2.appendChild(celdaFoto);
      nodo2.appendChild(celda);
    
  
  }else /*si el contenido es vacio return */
     span.textContent = document.getElementById('tarea').value

  //nodo2.appendChild(span)
  let boton = document.createElement('ons-button')
  boton.textContent = 'Borrar'
  let celda=document.createElement('div')
  celda.classList.add("right")
  celda.appendChild(boton)
  nodo2.appendChild(celda)
  boton.onclick = eliminar2
  boton.classList.add('boton')

  document.getElementById('tabla').appendChild(nodo2)
}

function cestaMobil(id){
  anyadir2Mobil(id)

}
function rellenarMobil(){
  var ids=document.getElementsByClassName("id")
  var listas=[]
  for(i=0;i<ids.length;i++){
    var valor=ids[i].getAttribute('value')
    listas=listas.concat(valor)
  }
  

  fetch('/includes/compras.php?productos='+listas)
  .then(response => response.json())
  .then(json => rellenarVisor(json))
  .catch(err => console.log(err))
}