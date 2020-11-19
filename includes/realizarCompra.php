<?php
    function realizarCompra($table)
    {
        if(!isset($_SESSION["usuario"])){
            echo "<h1> inicia sesion</h1>";
        }else{
        $ids_productos=$_REQUEST["productos"];
        $ids_desconpuestos=explode(',',$ids_productos);
        $query = "INSERT INTO $table ( id_cliente , id_producto, fecha)
                          VALUES (?,?,?)";
        try { 
        $consult = $pdo -> prepare($query);
        $fecha=date("Y-m-d H:i:s");
        foreach($ids_desconpuestos as $id){
            $a = $consult->execute(array($_SESSION["usuario"], $id, $fecha ));
        }
        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Producto registrado! </h1>";

        //$_SESSION["usuario"] = "normal"; no se que es rafa explica me lo??
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }

        echo "<h1> Compra realizada</h1>";
        }
    }
?>