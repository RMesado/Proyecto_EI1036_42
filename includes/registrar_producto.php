<?php
function registro_p($table){
global $pdo;
$datos = $_REQUEST;
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (name, imagen, descripcion, precio)
                          VALUES (?,?,?,?)";
    try { 
        print_r($table);
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['producto'], $_REQUEST['url_img'],$_REQUEST['descripcion'], $_REQUEST['precio']  ));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Producto registrado! </h1>";

        //$_SESSION["usuario"] = "normal"; no se que es rafa explica me lo??
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }

}


?>