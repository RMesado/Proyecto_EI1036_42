<?php
    function subirImagen(){//ya recoge la imagen
        $target_dir = "img/";
        $target_file = $target_dir.basename($_FILES["url_img"]["name"]);
        $uploadOk = 1;
        if(isset($_POST["submit"])) {

        }
        if (file_exists($target_file)) {
            echo "Archivo existente";
        $uploadOk = 0;
        } 
        if (move_uploaded_file($_FILES["url_img"]["tmp_name"], $target_file)) {
            header("Location: http://localhost:3000/portal.php?action=registrar_producto");
        exit();
        //echo "El archivo ". htmlspecialchars( basename( $_FILES["url_img"]["name"])). " ha sido subio.";
        } else {
            echo "Se produjo un error al subir el el archio";
        }

    }
?>