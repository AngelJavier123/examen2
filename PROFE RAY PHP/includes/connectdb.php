<?php
function conectarDB(){
    $db = mysqli_connect("localhost", "root", "", "bienesraices2");

    if (!$db) {
        echo "Error: No se pudo conectar a la base de datos";
        exit;
    } 

    return $db;
}
?>
