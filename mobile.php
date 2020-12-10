<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>

</head>
<body>
  
<ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
  <ons-page>
    <ons-splitter id="appSplitter">
      <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="right" collapse="" width="260px"></ons-splitter-side>
      <ons-splitter-content page="tabbar.html"></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>

<template id="sidemenu.html">
   <ons-page>
    <ons-list-title>Menú</ons-list-title>
    <ons-list>
       <ons-list-item onclick="fn.loadView(0)">Hola</ons-list-item>
    </ons-list>
</template>

<template id="tabbar.html">
  <ons-page id="tabbar-page">
    <ons-toolbar>
      <div class="center">MI TIENDA</div>
      <div class="right">
        <ons-toolbar-button onclick="fn.toggleMenu()">
          <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>

    <ons-tabbar swipeable id="appTabbar" position="auto"> 
      <ons-tab label="Productos" icon="ion-home" page="page1.html" active></ons-tab>
      <ons-tab label="Cesta" icon="ion-edit" page="page2.html"></ons-tab>
    </ons-tabbar>

  </ons-page>
</template>

<template id="page1.html">
  <ons-page id="page1">
   
   <ons-toolbar>
    <div class="left">
      <ons-toolbar-button onclick="prev()">
        <ons-icon icon="md-chevron-left"></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class="center">Productos</div>
    <div class="right">
      <ons-toolbar-button onclick="next()">
        <ons-icon icon="md-chevron-right"></ons-icon>
      </ons-toolbar-button>
    </div>
  </ons-toolbar>
  <!-- <p>
  <ons-input list="lista" onchange = "buscador(this.value)" modifier="underbar" placeholder="Nombre de producto" float></ons-input>
  <ons-list id="lista">
  Mirar este enlace: https://community.onsen.io/topic/1177/ons-input-and-datalist/5
  </ons-list>
  </p> -->
  <ons-carousel fullscreen swipeable auto-scroll overscrollable id="carousel">
    <!-- inicialmente estará vacío -->
  </ons-carousel>
  </ons-page>
</template>

<template id="page2.html">
  <ons-page id="page2">
    <ons-toolbar>
      <div class="center">Cesta</div>
    </ons-toolbar>
   
    <ons-list id="tabla">
    </ons-list>

    <ons-button modifier="large">Comprar</ons-button>
  </ons-page>

</template>
  
<script>
  var productid={};
  /* Funciones para mover el carrusel */
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
      // while(mobile.firstChild){
      //   mobile.removeChild(mobile.lastChild);
      //   optes.removeChild(optes.lastChild);
      // }
      productid={};
      console.log(json);
      json.forEach(objeto =>{
        console.log(objeto);
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
        button.innerHTML="Añadir a la cesta";
        
        div.appendChild(img);
        div.appendChild(p);
        div.appendChild(descrip);
        div.appendChild(button);
        var item = document.createElement("ons-carousel-item");
        item.appendChild(div);
        mobile.appendChild(item);
       // var opt=document.createElement("ons-list-item");
        //opt.value=objeto.name;
        //productid[objeto.name] = objeto.id;
        //optes.appendChild(opt);

      });
      //document.getElementById("busqueda").setAttribute("list","lista");
      //mobile.refresh();
    }
  }
  
  function buscador(proc){
    document.getElementById(productid[proc]).scrollIntoView({behavior: "smooth"})
  }

  // Cosas de cesta
  
(function(){
    let lista = JSON.parse(localStorage.getItem('cesta'))
    if(lista && lista.length>0)
      lista.forEach(tarea => anyadir(tarea))
})()


function anyadir2(tarea){
  
  let nodo2=document.createElement("ons-list-item")
  nodo2.setAttribute('modifier',"longdivider")
  
  let span = document.createElement('span')
  span.classList.add('data-tarea') // añadimos una nueva clase al atributo 'class'

  if (tarea){ 
    var producto=tarea.split(',')
    for( var i=0 ; i<producto.length;i++){
      let celdaFoto=document.createElement('div');
      celdaFoto.classList.add("left");
      let celda=document.createElement('div');
      celda.classList.add("center");
      
      if (i==0){
        celda.classList.add("id");
        celda.setAttribute('value',producto[i])
      }
      if (i==2){
        var variable=document.createElement("IMG")
        variable.setAttribute('src',producto[i])
        variable.classList.add("list-item__title")
        
    
      }else{
        var variable=document.createTextNode(producto[i])
      }
      celdaFoto.appendChild(variable)     
      nodo2.appendChild(celdaFoto)
      nodo2.appendChild(celda)
  }
     span.textContent = tarea
  }else /*si el contenido es vacio return */
     span.textContent = document.getElementById('tarea').value

  //nodo2.appendChild(span)
  let boton = document.createElement('ons-button')
  boton.textContent = 'Borrar'
  let celda=document.createElement('div')
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
</script>
  
</body>
</html>