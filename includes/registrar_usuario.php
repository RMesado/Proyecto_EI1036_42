<?php

function registrar_usuario($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (nombre, email, clave)
                          VALUES (?,?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['userName'], $_REQUEST['email'],$_REQUEST['passwd']  ));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Usuario registrado! </h1>";

        $_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>