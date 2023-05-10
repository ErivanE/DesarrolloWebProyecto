<?php
    include 'conexion.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $contrasena = $_POST['contrasena'];

    if(isset($_POST['agregar'])){
        $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena')";
        $sql = mysqli_query($con, $query);
        
        if($sql){
            header("location: ../index.html");
        } 
    }else if(isset($_POST['agregarAdmin'])){
        $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena')";
        $sql = mysqli_query($con, $query);
        
        if($sql){
            header("location: ../php/usuarios.php");
        } 
    }else if(isset($_POST['modificar'])){
        $idBuscar = $_POST['id'];
        $consulta = $con -> query("UPDATE usuarios
                                    SET nombre = '$nombre',
                                        correo = '$correo',
                                        direccion = '$direccion',
                                        cp = '$cp',
                                        contrasena = '$contrasena'
                                    WHERE id = '$idBuscar'");
        if($consulta){
            header("location: ../php/usuarios.php");
        }
    }else if(isset($_POST['eliminar'])){
        $idBuscar = $_POST['id'];
        $consulta = $con -> query("DELETE FROM usuarios WHERE id = '$idBuscar'");
        if($consulta){
            header("location: ../php/usuarios.php");
        }
    }    
?>