<?php 
    include 'conexion.php';
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
    <title>Inicio Admin</title>
</head>
<body >
    <nav class="navbar general">
        <ul>
          <li><a href="#">Usuarios</a></li>
          <li><a href="#">Productos</a></li>
        </ul>
    </nav>
    <div class="fondo-titulo-alterado">
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
                    <input class="cont-input" type="url" name="imagenUrl" id="imagenUrl" >
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
            <form action="" method="post">
                <div class="cont">
                    <h2 class="cont-titulo">Buscar Producto</h2>

                    <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="cont-input">
                    <input type="submit" value="Buscar" class="cont-boton">
                </div>
            </form>
        </div>
        <!--Table Ver producto-->
        <div class="caja">
            <div class="cont">
                <h2 class="cont-titulo">Productos</h2>
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT id, titulo, precio, stock, descripcion FROM productos";
                            $result = $con -> query($query);
    
                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                    echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['titulo']."</td>";
                                        echo "<td>".$row['precio']."</td>";
                                        echo "<td>".$row['stock']."</td>";
                                        echo "<td>".$row['descripcion']."</td>";
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