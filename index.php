<?php
include 'PHP/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="VistaUsuario/css/navbar.css">
    <link rel="stylesheet" href="VistaUsuario/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-KXmDlF1ri1m3+oQTxo2dPXHoqr/qndCS0fVwX6rD38eq8yzG0BZNA26DrpYToPENdzmsS2IAGU8AMr8NZlTjMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="#" class="nav-login-item">Inicio</a>
            <a href="VistaUsuario/html/productos.php" class="nav-login-item">Productos</a>
            <a href="VistaUsuario/html/ubicacion.html" class="nav-login-item">Ubicacion</a>
            <a href="VistaUsuario/html/contacto.html" class="nav-login-item">Contacto</a>
        </div>
        <div class="nav-login-container">
            <a href="VistaUsuario/html/login.html" class="nav-login-item boton botonGris">Iniciar Sesion</a>
            <a href="VistaUsuario/html/registro.html" class="nav-login-item boton botonAzul">Registrarse</a>
        </div>
    </nav>
    <!--TITULO-->
    <section class="titulo-principal">
        <div class="parrafo">
            <h1 id="inicio">KSP Games</h1>
            <p>
                Explora nuevos mundos, encuentra grandes juegos.<span> KSP Games</span>,
                tu destino de entretenimiento interactivo.
            </p>
        </div>
        <div class="parrafo-img">
            <img src="img/controlIcon.jpg" alt="" width="250px" height="250px">
        </div>
    </section>
    <main>
        <!--AGREGADOS RECIENTEMENTE-->
        <section class="agregados">
            <div class="apartado">
                <h2>Agregados Recientemente</h2>
            </div>
            <div>
                <div class="agregados-container">
                    <?php
                    $query = "SELECT * FROM productos ORDER BY id DESC LIMIT 6";
                    #$result = $con->query($query);
                    $result = mysqli_query($con, $query);
                    #$result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        #$nombre = $row['titulo'];
                        #$url_img = $row['url_img'];
                        //TARJETA
                        echo '<div class="agregados-tarjeta">';
                        echo '<a href="#">';
                        echo '<img src= "img/productos/' . $row["url_img"] . '" width="200" height="300" alt="producto">';
                        echo '</a>';
                        echo '<p>' . $row['titulo'] . '</p>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </section>


    </main>
    <!--FOOTER-->
    <footer class="footer-container">
        <div class="footer-column columna1">
            <p>Encuentranos en: </p>
            <ul>
                <li>
                    <a href="">
                        <img src="img/icons/facebookIcon.png" alt="Facebook">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="img/icons/twitterIcon.png" alt="Twitter">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="img/icons/instaIcon.png" alt="Instagram">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="img/icons/discordIcon.png" alt="Discord">
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