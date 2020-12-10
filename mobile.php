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
   
    <ons-list>
       <ons-list-item><span class="miItem">BLUE</span> <ons-button class="elimina">X</ons-button></ons-list-item>
      <ons-list-item><span class="miItem">RED</span> <ons-button class="elimina">X</ons-button></ons-list-item>
    </ons-list>

    <ons-button modifier="large">Comprar</ons-button>
  </ons-page>

</template>
  
<script>
  
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
      var productid={};
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
        var item = document.createElement("ons-carousel-item");
        item.appendChild(div);
        mobile.appendChild(item);
        var opt=document.createElement("ons-list-item");
        opt.value=objeto.name;
        productid[objeto.name] = objeto.id;
        optes.appendChild(opt);

      });
      //document.getElementById("busqueda").setAttribute("list","lista");
      //mobile.refresh();
    }
  }
  

  function buscador(proc){
    document.getElementById(productid[proc]).scrollIntoView({behavior: "smooth"})
  }
</script>
  
</body>
</html>