<?php 
    include 'conexion.php';
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
            <img src="../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#" class="nav-login-item">Inicio</a>
            <a href="../php/productos.php" class="nav-login-item">Productos</a>
            <a href="../PHP/usuarios.php" class="nav-login-item">Usuarios</a>
            <a href="#" class="nav-login-item">Proveedores</a>
        </div>
        <div class="nav-login-container">
            <a href="#" class="nav-login-item boton botonAzul">Salir</a>
        </div>
    </nav>
    <!--MAIN-->
    <div class="contenedorAdmin">
        <div class="adminForm">
            <form action="" method>
                <label for="id" class="adminForm-label">Id</label>
                <input type="text" name="id" id="id" class="adminForm-input">

                <label for="titulo" class="adminForm-label">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="adminForm-input">

                <label for="descripcion" class="adminForm-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="adminForm-input">

                <label for="precio" class="adminForm-label">Precio</label>
                <input type="text" name="precio" id="precio" class="adminForm-input">

                <label for="stock" class="adminForm-label">Stock</label>
                <input type="text" name="stock" id="stock" class="adminForm-input">

                <label for="url_img" class="adminForm-label">URL Img</label>
                <input type="text" name="url_img" id="url_img" class="adminForm-input">

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
                        <th class="celdaPequeña">Id</th>
                        <th class="celdaMediana">Titulo</th>
                        <th id="desc">Descripcion</th>
                        <th class="celdaPequeña">Precio</th>
                        <th class="celdaPequeña">Stock</th>
                        <th id="url_img">URL Img</th>
                        <th class="celdaMediana">Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <!--form agregar Producto-->
        <div class="caja">
            <form action="../PHP/registrarProducto.php" method="post">
                <div class="cont">
                    <h2 class="cont-titulo">Agregar Producto</h2>
                    <label for="titulo" class="cont-label">Titulo:  </label>
                    <input class="cont-input" type="text" name="titulo" id="titulo">
                    
                    <label for="precio" class="cont-label">Precio:  </label>
                    <input class="cont-input" type="number" name="precio" id="precio">
                    
                    <label for="stock" class="cont-label">Stock:    </label>
                    <input type="number" class="cont-input" name="stock" id="stock">

                    <label for="imagen" class="cont-label">URL Imagen:    </label>
                    <input class="cont-input" type="file" name="imagenUrl" id="imagenUrl" style="color:white" >
                </div>
                <div class="cont">
                    <label for="descripcion" class="cont-label">Descripcion:    </label>
                    <div>
                        <textarea class="cont-input" name="descripcion" id="descripcion" cols="50" rows="10"></textarea>    
                    </div>
                </div>
                
                <input class="cont-boton" type="submit" id="enviar" value="Agregar" >
            </form>
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
    <!--FORM ELIMINAR-->
        <div class="caja">
            <form action="" method="get">
                <div class="cont">
                    <h2 class="cont-titulo">Eliminar Productos</h2>
                    <input type="text" placeholder="Ingrese el Id" class="cont-input" name="buscar">
                    <input type="submit" value="Eliminar" name="eliminar" class="cont-boton">

                    <?php
                        if(isset($_GET['eliminar'])){
                            $buscar = $_GET['buscar'];
                            $consulta = $con -> query("DELETE FROM productos WHERE id = '$buscar'");
                            
                            //header("location: ../PHP/productos.php"); 
                        }
                    ?>
                </div>
            </form>
        </div>
    <!--FORM MODIFICAR-->
        <div class="caja">
            <form action="modificarProducto.php" method="post">
                <div class="cont">
                    <h2 class="cont-titulo">Modificar Producto</h2>
                    <p style="color: white;">*Indique mediante el id el producto a modificar*</p>
                    <input type="text" class="cont-input" placeholder="id"      name="id">
                    <input type="text" class="cont-input" placeholder="Titulo"  name="titulo">
                    <input type="text" class="cont-input" placeholder="Precio"  name="precio">
                    <input type="text" class="cont-input" placeholder="Stock"   name="stock">
                    <input type="file" class="cont-input" placeholder="URL"     name="url_img" style="color: white;">
                    <input type="text" class="cont-input" placeholder="Descripcion" name="descripcion">
                    <input type="submit" class="cont-boton" value="Modificar" name="modificar">
                </div>
            </form>
        </div>
    <!--Table Ver producto-->
        <div class="caja">
            <div class="cont">
                <h2 class="cont-titulo">Productos</h2>
                <table style="background-color: white;">
                    <thead>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th>IMG</th>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT id, titulo, precio, stock, descripcion, url_img FROM productos";
                            $result = $con -> query($query);
    
                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                    echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['titulo']."</td>";
                                        echo "<td>".$row['precio']."</td>";
                                        echo "<td>".$row['stock']."</td>";
                                        echo "<td>".$row['descripcion']."</td>";
                                        echo "<td><img src ='../img/".$row['url_img']."' alt = 'Imagen del Producto jeje' width='100' height='100'></td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</body>
</html>