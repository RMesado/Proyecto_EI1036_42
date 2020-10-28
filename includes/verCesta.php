<?php
    function verCesta(){
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
            $query ="SELECT * FROM productos WHERE id like(?)";
            $ids_productos=explode(",",$_SESSION["cesta"]);
            
            foreach($ids_productos as $id_producto){
                $producto=ejecutarSQL($query,$id_producto);
                //poner bonitooo
            }

        }

        
    }
?>