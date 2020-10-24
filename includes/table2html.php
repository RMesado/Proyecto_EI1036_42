<?php

function table2html($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            echo "<th>", $key,"</th>";
        }
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";
            }
            print "</tr>";
        }
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>