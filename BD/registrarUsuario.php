<?php
    include 'conexion.php';

    $nombre =$_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $contrasena = $_POST['contrasena'];

    $sql = mysqli_query($con, "INSERT INTO usuarios(id, nombre, correo, direccion, cp, contrasena) 
        VALUES(0, '$nombre','$correo','$direccion','$cp','$contrasena')");
    
    if($sql){
        header("location: ../index.html");
    }else{
        echo "usuario no agregado";
    }
?>