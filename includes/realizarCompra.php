<?php
    function realizarCompra($table)
    {
        global $pdo;
        if(!isset($_SESSION["id_usuario"])){
            echo "<h1> inicia sesion</h1>";
        }else{
        $ids_productos=$_REQUEST["productos"];
        $ids_desconpuestos=explode(',',$ids_productos);
        try { 
            foreach($ids_desconpuestos as $id){
                $query = "INSERT INTO $table ( id_cliente , id_producto, fecha) VALUES (".$_SESSION["id_usuario"].",".$id.",now());";
                $pr= $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
            }
            if (1>$pr) echo "<h1> Inserción incorrecta </h1>";
            
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }

        echo "<h1> Compra realizada</h1>";
        }
    }
?>