<?php 
    include '../../PHP/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/estiloAdmin.css">
    <title>Inicio Admin</title>
</head>
<body >
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="../../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#" class="nav-login-item">Inicio</a>
            <a href="#" class="nav-login-item">Productos</a>
            <a href="usuarios.php" class="nav-login-item">Usuarios</a>
            <a href="#" class="nav-login-item">Proveedores</a>
        </div>
        <div class="nav-login-container">
            <a href="../../index.php" class="nav-login-item boton botonAzul">Salir</a>
        </div>
    </nav>
    <!--MAIN-->
    <div class="contenedorAdmin">
        <div class="adminForm">
            <form action="../../PHP/opcionesProducto.php" method="post">
                <label for="id" class="adminForm-label">Id</label>
                <input type="text" name="id" id="id" class="adminForm-input">

                <label for="titulo" class="adminForm-label">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="adminForm-input">

                <label for="descripcion" class="adminForm-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="adminForm-input">

                <label for="precio" class="adminForm-label">Precio</label>
                <input type="number" name="precio" id="precio" class="adminForm-input">

                <label for="stock" class="adminForm-label">Stock</label>
                <input type="number" name="stock" id="stock" class="adminForm-input">

                <label for="url_img" class="adminForm-label">URL Img</label>
                <input type="file" name="url_img" id="url_img" class="adminForm-input">

                <label for="proveedor" class="adminForm-label">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor" class="adminForm-input">

                <input type="submit" name="agregarAdmin"    value="Agregar">
                <input type="submit" name="modificarAdmin"  value="Modificar">
                <input type="submit" name="eliminarAdmin"   value="Eliminar">
                <input type="submit" name="buscarAdmin"     value="Buscar">

            </form>
        </div>
        <div class="adminTablas">
            <table>
                <thead>
                    <tr>
                        <th class="celdaPequeña">   Id</th>
                        <th class="celdaMediana">   Titulo</th>
                        <th class="">               Descripcion</th>
                        <th class="celdaPequeña">   Precio</th>
                        <th class="celdaPequeña">   Stock</th>
                        <th class="">               URL Img</th>
                        <!--<th class="celdaMediana">   Proveedor</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
                        $result = $con -> query($query);

                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['titulo']."</td>";
                                    echo "<td>".$row['descripcion']."</td>";
                                    echo "<td>".$row['precio']."</td>";
                                    echo "<td>".$row['stock']."</td>";
                                    echo "<td><img src = '../../img/productos/".$row['url_img']."'alt = 'producto' width=100 heigt=100'></td>";
                                echo "<tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <!--Form de busqueda-->
        <div class="caja">
            <form action="" method="get">
                <div class="cont">
                    <h2 class="cont-titulo">Buscar Producto</h2>

                    <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="cont-input">
                    <input type="submit" name="enviar" value="Buscar" class="cont-boton">

                    <?php
                        if(isset($_GET['enviar'])){
                            $buscar = $_GET['buscar'];

                            $consulta = $con -> query("SELECT * FROM productos 
                                                            WHERE id='$buscar' 
                                                                or titulo ='$buscar' 
                                                                or precio='$buscar' 
                                                                or stock='$buscar' 
                                                                or descripcion='$buscar'");
                            if($consulta -> num_rows > 0){
                    ?>
                                <table style="background-color: white;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Descripcion</th>
                                    </tr>
                                    <?php
                                        while($row = $consulta ->fetch_assoc()){
                                            echo "<tr>";
                                                echo "<td>".$row["id"]."</td>";
                                                echo "<td>".$row["titulo"]."</td>"; 
                                                echo "<td>".$row["precio"]."</td>"; 
                                                echo "<td>".$row["stock"]."</td>"; 
                                                echo "<td>".$row["descripcion"]."</td>";
                                            echo "</tr>";
                                        }
                                    
                                echo "</table>";
                            }
                        }
                    ?>
                </div>
            </form>
        </div>  
</body>
</html>