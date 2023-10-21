<?php
    //Eliminar carrito
    include 'conexion.php';
    
    $a = $_GET["var"];
    $user = $_GET['user'];
    $borrar = $con ->query("DELETE FROM carrito WHERE id = '$a'");
    if($borrar){
        header("location: ../VistaUsuario/html/carrito.php?user=$user");
    }
?>