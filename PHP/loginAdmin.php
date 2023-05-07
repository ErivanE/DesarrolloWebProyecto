<?php
    include 'conexion.php';

    $usuario = $_POST['nombre'];
    $contra = $_POST['contrasena'];

    $sql = mysqli_query($con, "SELECT nombre, contrasena FROM admin WHERE nombre = '$usuario' AND contrasena = '$contra'");
    

    if($sql -> num_rows > 0){
        header("location: ../html/prueba.html");
    }else{
        echo "no";
    }
?>