<?php

function autentificar_usuario()
{
    global $pdo;

    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion of mostar error

    $_SESSION["usuario"] = role
    */

    $query = "SELECT * FROM  clientes_portal;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    $user = $_POST["username"];
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        foreach ($rows as $key => $value) {
            if(in_array($user,$value) && in_array($email,$value) && in_array($passwd,$value)){
                if(in_array("admin",$value)){
                    $_SESSION["usuario"] = "admin";
                 }
                else $_SESSION["usuario"] = "normal";
            //print_r($lista);
            //print_r($key);
            //print_r($value);
            }
        }
    } 
    if(is_null($_SESSION["usuario"]))
        print "<h1> Usuario no registrado </h1>"; 
    else print "<h1> Bienvenido $user </h1>";
}

?>