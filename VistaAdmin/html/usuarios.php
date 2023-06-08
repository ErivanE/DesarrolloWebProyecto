<?php 
    include '../../PHP/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/estiloAdmin.css">
    <title>Administrar usuarios</title>
    <style>
        .cont{
            display: flex;
        }
        .cont-titulo{
            color: black;
        }
        #datos{
            width: 20%;
            padding: 1rem;
        }
        #datos label, input{
            display: block;
        }
        #usuarios{
            padding: 1rem;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        tr:hover{
            background-color: #e0e0e0;
            cursor: pointer;
        }
        
    </style>
</head>
<body style="background-color: white;">
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="../../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#" class="nav-login-item">Inicio</a>
            <a href="productos.php" class="nav-login-item">Productos</a>
            <a href="#" class="nav-login-item">Usuarios</a>
            <a href="#" class="nav-login-item">Proveedores</a>
        </div>
        <div class="nav-login-container">
            <a href="../../index.php" class="nav-login-item boton botonAzul">Salir</a>
        </div>
    </nav>
    <!--MAIN-->
    <div class="cont">
        <div id="datos">
            <h2 class="cont-titulo">Datos</h2>
            <form action="../PHP/opcionesUsuario.php" method="post">
                <label for="">ID</label>
                <input type="text" name="id">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <label for="correo">Correo</label>
                <input type="text" name="correo">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion">
                <label for="cp">Cp</label>
                <input type="text" name="cp">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contrasena">
                
                <input type="submit" value="Agregar"    name="agregarAdmin">
                <input type="submit" value="Modificar"  name="modificar">
                <input type="submit" value="Eliminar"   name="eliminar">
            </form>
        </div>
        <div id="usuarios">
            <h2 class="cont-titulo">Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Cp</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT id, nombre, correo, direccion, cp, contrasena FROM usuarios";
                    $result = $con -> query($query);

                    if($result -> num_rows > 0){
                        while ($row = $result ->fetch_assoc()){
                            echo "<tr>";
                                echo "<td>".$row["id"]."</td>";
                                echo "<td>".$row["nombre"]."</td>"; 
                                echo "<td>".$row["correo"]."</td>"; 
                                echo "<td>".$row["direccion"]."</td>"; 
                                echo "<td>".$row["cp"]."</td>";
                                echo "<td>".$row["contrasena"]."</td>"; 
                                echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>