<?php
    //Eliminar carrito
    include 'conexion.php';
    $user = $_GET['user'];
    $borrar = $con ->query("DELETE FROM carrito");
    if($borrar){
        header("location: ../VistaUsuario/html/carrito.php?user=$user");
    }
?>