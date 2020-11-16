<?php
    //view_form.php

/**
 * * Descripción: Ejemplo de proyecto
 * *
 * *
 * *
 * * @author  Rafael Berlanga
 * * @copyright 2020 Rafa B.
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */

session_start();

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");

include(dirname(__FILE__)."/includes/añadirCesta.php");
include(dirname(__FILE__)."/includes/verCesta.php");
include(dirname(__FILE__)."/includes/eliminarDeCesta.php");
include(dirname(__FILE__)."/includes/realizarCompra.php");

include(dirname(__FILE__)."/partials/ventanita.php");
include(dirname(__FILE__)."/includes/phpToJs.php");
include(dirname(__FILE__)."/partials/cestaV2.php");

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST["action"];
} else {
    $action = "home";
}


switch ($action) {
    case "home":
        $central = "/partials/centro.php";
        break;
    case "login":
        $central = "/partials/login.php"; //formulario login
        break;
    case "do_login":
        $central = autentificar_usuario(); //fijar $_SESSION["usuario"]
        break;
    case "registrar_usuario":
        $central = "/partials/registro_usuario.php"; //formulario usuarios
        break;
    case "insertar_usuario":
        $central = registrar_usuario("clientes_portal"); //tabla usuarios
        break;
    case "listar_productos":
        $central = table2html("productos"); //tabla productos
        break;
    case "registrar_producto":
        $central = "/partials/registro_producto.php"; //formulario producto
        break;
    case "insertar_producto":
        $central = "<p>Todavía no puedo insertar productos en la BD</p>"; //tabla productos
        break;
    case "ver_cesta":
        $central = verCesta(); //cesta en $_SESSION["cesta"]
        break;
    case "encestar":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //tabla compras
        break;
    case "realizar_compra":
        if ($_SESSION["id_usuario"]=="") {
            $central = "/partials/login.php";
        } else {
            $central = realizarCompra();
        } //cesta en $_SESSION["cesta"]
        break;
    case "logout":
        $_SESSION["usuario"] = null;
        $_SESSION["id_usuario"] = "";
        $_SESSION["cesta"] = null;
        $central="/partials/centro.php";
        break;
    case "add":
        $central=añadirCesta();
        break;
    case "delete":
        $central=eliminarDeCesta();
        break;
    case "upload":
        $central = subirImagen();
        break;
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";

}

if ($central <> "") {
    include(dirname(__FILE__).$central);
}

include(dirname(__FILE__)."/partials/footer.php");
