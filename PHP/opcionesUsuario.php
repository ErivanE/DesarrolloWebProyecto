<?php
    include 'conexion.php';

    $id = $_POST['id']??NULL;
    $nombre = $_POST['nombre']??NULL;
    $correo = $_POST['correo']??NULL;
    $direccion = $_POST['direccion']??NULL;
    $cp = $_POST['cp']??NULL;
    $contrasena = $_POST['contrasena']??NULL;
    

    if(isset($_POST['agregar'])){
        $query = "INSERT INTO usuarios (id, nombre, correo, direccion, cp, contrasena) VALUES(0,'$nombre','$correo','$direccion','$cp','$contrasena')";
        $sql = mysqli_query($con, $query);
        
        if($sql){
            header("location: ../VistaUsuario/html/indexUser.php?user=".$correo);
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
    }else if(isset($_POST['login'])){
        $consulta = $con -> query("SELECT * from usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
        if($consulta -> num_rows > 0){
            while($row = $consulta -> fetch_assoc()){
                echo $row['id'];
                header("location: ../html/inicioUsuario.php?val=".$row["id"]);
            }
        }
        /*if($consulta != null){
            header("location: ../html/inicioUsuario.php?val=".$consulta."");
        }
                                        while($row = $consulta ->fetch_assoc()){
                                            echo "<tr>";
                                                echo "<td>".$row["id"]."</td>";
                                                echo "<td>".$row["titulo"]."</td>"; 
                                                echo "<td>".$row["precio"]."</td>"; 
                                                echo "<td>".$row["stock"]."</td>"; 
                                                echo "<td>".$row["descripcion"]."</td>";
                                            echo "</tr>";
        */
    }    
?>