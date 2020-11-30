<?php
function datos(){
    header('Content-type: application/json');
    global $pdo;
    $result = $pdo->prepare("SELECT * FROM productos");
    $result->execute();
    $datos = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
}
datos();
?>