<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena')";
    $sql = mysqli_query($con, $query);
    
    if($sql){
        header("location: ../index.html");
    }else{
        echo "usuario no agregado";
    }
?>