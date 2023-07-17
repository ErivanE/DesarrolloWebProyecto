<?php 
include '../../PHP/conexion.php'; 
$user = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexUser.css">
    <title>Inicio</title>
</head>
<body>
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="../../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#"            class="nav-login-item">Productos</a>
            <?php 
            echo '<a href=carrito.php?user='.$user.' class="nav-login-item">Carrito</a>';
            //<a href="carrito.php?user=".$user.""  class="nav-login-item">Carrito</a>
            ?>
        </div>
        <div class="nav-login-container">
            <?php 
                
                echo '<p class="nav-login-item">'.$user.'</p>'; 
            ?>
            <a href="../../index.php"   class="nav-login-item boton botonAzul">Salir</a>
        </div>
    </nav>
    <!--MAIN-->
    <!--TITULO-->
    <section class="titulo-principal">
        <div class="parrafo">
            <p> 
                ¡Encuentra tu próximo desafío virtual y conviértete en un verdadero jugador!
            </p>
        </div>
    </section>
    <main>
    <div class="contenedorP"></div>
    <div class="contenedor">
        <?php
            $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
            $result = $con->query($query);

            if($result ->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "<div class='tarjeta'>";
                    //Imagen
                    echo     "<img src='../../img/productos/".$row["url_img"]."' alt='img' width='250' height='300'>";
                    echo     "<div class='tarjeta-icons'>"; 
                    //Icono Carrito
                    echo     "<a href='../../PHP/carritoAgregar.php?user=".$user."&var=".$row["id"]."'><img src='../../img/icons/carrito.png' name='agregarCarrito' width='35' height='35' alt='' class=''></a>";
                    echo     "</div>";
                    echo     "<div class='cont'>";
                    //Titulo producto
                    echo        "<p class='titulo'>".$row["titulo"]."</p>";
                    //echo        "<p class='descripcion'>".$row["descripcion"]."</p>";
                    //Precio
                    echo        "<p class='precio'>$".$row["precio"]."</p>";
                    echo    "</div>";
                    echo "</div>";
                }
            }
        ?>
        
    </div>
        
        
    </main>
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