<?php
    include 'conexion.php';

    $a = $_GET["var"];
    $borrar = $con ->query("DELETE FROM carrito WHERE id = '$a'");
    if($borrar){
        header("location: ../html/carrito.php");
    }
?>