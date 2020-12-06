<?php
function busquedpr(){
    header('Content-type: application/json');
    $querry = "SLELECT * FROM productos WHERE precio BETWEEN ? AND ?;";
    $consult = $pdo -> prepare($query);
    $consult->execute(array($_REQUEST['min'], $_REQUEST['max']));
    $datos = $consult->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
}
busquedpr()
?>