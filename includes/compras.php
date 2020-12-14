<?php
    include(dirname(__FILE__)."/ejecutarSQL.php");
    include(dirname(__FILE__)."/conector_BD.php");
    header('Content-Type: application/json');
    global $pdo;
    header('Content-Type: application/json');
    $ids_productos=$_REQUEST["productos"];
    if ($ids_productos != null) {
        $ids_desconpuestos=explode(',', $ids_productos);
            foreach ($ids_desconpuestos as $id) {
                $query = "INSERT INTO compras ( id_cliente , id_producto, fecha) VALUES (10,".$id.",now());";
                $pr= $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
            }
            if (1>$pr) {
                $datos=array('resultado' => 'KO');
                echo json_encode($datos);
            }
            $datos=array('resultado' => 'OK');
            echo json_encode($datos);
            }else{
                $datos=array('resultado' => 'KO');
                echo json_encode($datos);
            }
?>