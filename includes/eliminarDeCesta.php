<?php

function eliminarDeCesta(){

    $id=$_REQUEST["item_id"];
    $cesta=explode(",",$_SESSION["cesta"]);
    $nueva_cesta=array();
    $booleano=TRUE;
    foreach($cesta as $clave){
        if ( $id==$clave && $booleano ){
            $booleano=FALSE;
        }else{

            array_push($nueva_cesta,$clave);
        }
    }
    if(sizeof($nueva_cesta)<1){
        $_SESSION["cesta"]=null;
    }else{
        $_SESSION["cesta"]=implode(",",$nueva_cesta);
    }
    verCesta();
}



?>