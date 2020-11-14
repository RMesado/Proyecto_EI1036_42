<?php
    function subirImagen(){//esto tiene que recoger la puta imagen guay a que si
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        echo $target_file;
        if(isset($_POST["submit"])) {

        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        $uploadOk = 0;
        } 
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>