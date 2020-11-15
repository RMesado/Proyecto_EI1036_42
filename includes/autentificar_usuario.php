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


    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    $nombre;
    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        foreach ($rows as $key => $value) {
            $usuario = array_values($value);
            if($email == $usuario[2] && $passwd == $usuario[3]){
                if($usuario[4] == "1"){
                    $_SESSION["usuario"] = "admin";
                    $nombre = $usuario[1];
                    $id_usuario = $usuario[0];
                    break;
                 }
                else {
                    $_SESSION["usuario"] = "normal";
                    $nombre = $usuario[1];
                    $_SESSION["id_usuario"] = $usuario[0];
                    break;
                }          
            //print_r($lista);
            //print_r($key);
            //print_r($value);
            }
        }
    } 
    if(is_null($_SESSION["usuario"]))
        print "<h1> Usuario no registrado </h1>"; 
    else {
        $id_usuario = $_SESSION["id_usuario"];
        print "<h1> Bienvenido $nombre</h1>";
    }
    }

?>