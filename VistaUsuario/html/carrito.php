<?php include '../../php/conexion.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table{
            background-color: white;
        }
        h1{
            color: white;
        }
    </style>
</head>
<body>
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="../../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#"   class="nav-login-item">Productos</a>
            <a href="carrito.php"  class="nav-login-item">Carrito</a>
        </div>
        <div class="nav-login-container">
            <?php 
                $user = $_GET['user'];
                echo '<p class="nav-login-item">'.$user.'</p>'; 
            ?>
            <a href="../../index.php"   class="nav-login-item boton botonAzul">Salir</a>
        </div>
    </nav>
    <!--main-->
    <section class="fondo-titulo-alterado">
        <div  class="contenedor">

            <h1 >Carrito de compras</h1>
            <table style="width: 80%;"  class="caja ">
                <thead>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                <?php
                        $query = "SELECT id, id_producto, nombre_producto, precio, url_img FROM carrito";
                        $result = $con -> query($query);
    
                        if($result -> num_rows > 0){
                            while ($row = $result ->fetch_assoc()){
                                echo "<tr>";
                                    echo "<td>".$row["id_producto"]."</td>";
                                    echo "<td>".$row["nombre_producto"]."</td>"; 
                                    echo "<td><img src ='../img/".$row['url_img']."' alt = 'Imagen del Producto jeje' width='100' height='100'></td>"; 
                                    echo "<td>".$row["precio"]."</td>";
                                    echo "<td><a href='../PHP/eliminarCarrito.php?var=".$row['id']."'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <!--FOOTER-->
    <footer class="footer-container">
        <div class="footer-column columna1">
            <p>Encuentranos en:  </p>
            <ul>
                <li> 
                    <a href="">
                        <img src="../../img/icons/facebookIcon.png" alt="Facebook">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../../img/icons/twitterIcon.png" alt="Twitter">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../../img/icons/instaIcon.png" alt="Instagram">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../../img/icons/discordIcon.png" alt="Discord">
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-column columna2">
            <h2>KSP Games</h2>
            <p>
                KSP Games es una pagina donde puedes comprar videojuegos en formato fisico, 
                asi como tambien Consolas, controles, accesorios y Ediciones de coleccion
            </p>
            
        </div>
        <div class="footer-column columna2">
            <h2>Mision</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Corrupti in ipsum inventore, fugiat provident ex, possimus, 
                aspernatur ut laboriosam nisi consequuntur et officia quaerat
                 id totam repellendus deleniti omnis numquam!
                </p>
            <h2>Vision</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Assumenda repellendus odio officiis rem voluptatibus ipsa sapiente, 
                error exercitationem quam doloremque distinctio quia porro, aut nesciunt 
                aspernatur nihil omnis, quae praesentium.
            </p>
        </div>
    </footer>
</body>
</html>