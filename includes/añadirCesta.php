<?php

function añadirCesta(){
    
    if(!isset($_SESSION["cesta"])){
        $producto=$_REQUEST["product"];
        $_SESSION["cesta"]=$producto;
    }else{
        $productos=$_SESSION["cesta"];
        $producto=$_REQUEST['product'];
        $productos=$productos.",".$producto;
        $_SESSION["cesta"]=$productos;
        echo $_SESSION["cesta"];
    }
    verCesta();

}


?>