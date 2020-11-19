<?php

function table2html($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            if($key!="id"){
                echo "<th>", $key,"</th>";
            }
        }
        print"<th> </th>";
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            foreach ($row as $key => $val) {
                if($row["id"]!=$val){
                    echo "<td>", $val, "</td>";
                }
        }
            $coso=$row["id"].",".$row["name"].",".$row["imagen"].",".$row["precio"];
            echo"<td> <button id=$coso onclick=cesta(this.id)>comprar</button> </td>";
            print "</tr>";
        }
        
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>