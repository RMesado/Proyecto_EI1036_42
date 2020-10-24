<?php
/* ejecutar SQL  */

function ejecutarSQL($query, $valor) {

    global $pdo;

    try{
        $consult = $pdo->prepare($query);
        $a = $consult->execute($valor);
    }
    catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        return NULL;
    }
    return $a;
}

?>