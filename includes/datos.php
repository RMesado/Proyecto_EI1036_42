<?php
include(dirname(__FILE__)."/ejecutarSQL.php");
include(dirname(__FILE__)."/conector_BD.php");

function datos(){
    global $pdo;
    header('Content-Type: application/json');
    $result = $pdo->prepare("SELECT * FROM productos");
    $result->execute();
    $datos = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
}
datos();
?>