<?php 
    include 'conexion.php';
    echo '
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
                <form action="../BD/registrarProducto.php" method="post">
                    <title>Agregar Producto</title>
                    
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
                    <title>Busqueda</title>
                    
                    <div class="cont">
                        <h2>Buscar Producto</h2>
                        <p>Buscar por:  </p>
    
                        <label for="idCB" class="cont-label">Id</label>
                        <input type="radio" name="idCB" id="idCB" class="cont-input">
            
                        <label for="tituloCB" class="cont-label">Titulo</label>
                        <input type="radio" name="titluloCB" id="tituloCB" class="cont-input">
            
                        <label for="descripcionCB" class="cont-label">Descripcion</label>
                        <input type="radio" name="descripcionCB" id="descripcionCB" class="cont-input">
            
                        <label for="precioCB" class="cont-label">Precio</label>
                        <input type="radio" name="precioCB" id="precioCB" class="cont-input">
                        </div>
                        
                        <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="cont-input">
                        <input type="submit" value="Buscar" class="cont-boton">
                </form>
            </div>
            ';
                
            
    $consulta = "SELECT id,titulo,precio, stock, descripcion, url_img FROM productos";
    $result = $con ->query($consulta);

    if($result -> num_rows > 0){
        echo '
            <!--Table Ver producto-->
            <div class="caja">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Descripcion</th>
                            <th>URL Image</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
        ';
        while($row = $result ->fetch_assoc()) {
            echo '
                <tr>
                    <td>'. $row['id']. '</td>
                    <td>'. $row['titulo']. '</td>
                    <td>'. $row['precio']. '</td>
                    <td>'. $row['stock']. '</td>
                    <td>'. $row['descripcion']. '</td>
                    <td>'. $row['url_img']. '</td>
                    <td></td>
                    
                </tr>';
        }
    }
    $con ->close();
    echo '
                </tbody>
                    </table>
                </div>
            </div>  
        </body>
        </html>
    ';

?>