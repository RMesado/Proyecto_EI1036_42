<?php
    function verCesta(){
        global $pdo;
        if(!isset($_SESSION["cesta"])){
           
            $query = "SELECT * FROM  productos;";
            $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
            if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
                print '<table><thead>';
                foreach($rows[0] as $key => $value) {
                    echo "<th>", $key,"</th>";
                }
                print"<th> </th>";
                print "</thead>";
                print "</table>";
            }
        }else{
            
            print'<table><thead>';
            foreach(explode(",",$_SESSION["cesta"]) as $id_producto){
                $query ="SELECT * FROM productos WHERE id =".$id_producto.";";
                $producto=$pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
                //atascado aqui no se porque los productos no los devuelve bien es raro
                print"<br>";
                print "<tr>";
                if(is_array($producto)){
                foreach($producto as $componente){
                    echo "<td>", $componente, "</td>";

                }
                echo"<td> <a href=\"?action=delete&item_id=",$producto['id']," \" class=\"btn btn-success\"> Compra me</a> </td>";
                }
                print "</tr>";
            }
            print "</table>";
        }

        
    }
?>