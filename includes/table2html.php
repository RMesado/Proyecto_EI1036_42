<?php

function table2html($table)
{
    if (isset( $_SESSION["usuario"])) {

        $query = " SELECT client_id FROM  clientes_portal where username like(?);";
        $id_user = ejecutarSQL($query,explode(',',$_SESSION["usuario"] ));
    }
    else $id_user = "";
    
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            echo "<th>", $key,"</th>";
        }
        print"<th> </th>";
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";
            }

            echo"<td> <a href=\"?action=add&client_id=",$id_user,"&product=",$row["id"], "\" class=\"btn btn-success\"> Compra me</a> </td>";
            print "</tr>";
        }
        
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>