<?php
include(dirname(__FILE__)."/ejecutarSQL.php");
include(dirname(__FILE__)."/conector_BD.php");
function busquedpr(){
    header('Content-type: application/json');
    global $pdo;
    header('Content-type: application/json');
    $querry = "SELECT * FROM productos WHERE precio BETWEEN ? AND ?";
    $consult = $pdo -> prepare($query);
    $consult->execute(array($_REQUEST['min'], $_REQUEST['max']));
    $datos = $consult->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
}
busquedpr()
?>