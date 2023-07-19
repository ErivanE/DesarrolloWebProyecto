<?php
    include 'conexion.php';

    $id = $_POST['id']??NULL;
    $nombre = $_POST['nombre']??NULL;
    $correo = $_POST['correo']??NULL;
    $direccion = $_POST['direccion']??NULL;
    $cp = $_POST['cp']??NULL;
    $contrasena = $_POST['contrasena']??NULL;
    

    if(isset($_POST['agregar'])){
        $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena, numeroCompra) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena',1)";
        $sql = mysqli_query($con, $query);
        
        if($sql){
            header("location: ../VistaUsuario/html/login.html");
        } 
    }else if(isset($_POST['agregarAdmin'])){
        $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena, numeroCompra) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena',1)";
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
    }else 
    if(isset($_POST['login'])){
        $consulta = $con -> query("SELECT * from usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
        $nr = mysqli_num_rows($consulta);

        if($nr == 1){
            $usuario = mysqli_fetch_array($consulta); // El usuario se autenticó correctamente
            // $nombre = $usuario['nombre'];
            // $correo = $usuario['correo'];
            // $direccion = $usuario['direccion'];
            // $cp = $usuario['cp'];

            $_SESSION['id_usuario'] = $usuario['id']; // Guardar el ID de usuario en una variable de sesión
            $_SESSION['nombre']  = $nombre;
            $_SESSION['correo']  = $correo;
            $_SESSION['cp']      = $cp;
            
            header('location: ../VistaUsuario/html/indexUser.php?user='.$correo.'');
        }else{
            header('location: ../pruebas.html');
        }
    }   
?>