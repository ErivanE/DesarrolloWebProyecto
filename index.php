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
    <link rel="stylesheet" href="VistaUsuario/css/bootstrap.min.css">
    <link rel="stylesheet" href="VistaUsuario/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-KXmDlF1ri1m3+oQTxo2dPXHoqr/qndCS0fVwX6rD38eq8yzG0BZNA26DrpYToPENdzmsS2IAGU8AMr8NZlTjMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-moradito">
        <div class="container-fluid">
            <img src="img/icons/KSPGames.png" class="navbar-brand img-fluid" alt="Logo">
            <!-- <a href="#" class="navbar-brand">KSPGAMES</a> -->
            <button class="navbar-toggler m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="menu" aria-expanded="false" aria-label="Mostrar / Ocultar menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item"><a href="#" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="VistaUsuario/html/productos.php" class="nav-link">Productos</a></li>
                    <li class="nav-item"><a href="VistaUsuario/html/ubicacion.html" class="nav-link">Ubicacion</a></li>
                    <li class="nav-item"><a href="VistaUsuario/html/contacto.html" class="nav-link">Contacto</a></li>
                </ul>
                <div>
                    <a href="VistaUsuario/html/login.html" class="btn btn-outline-primary me-1">Ingresar</a>
                    <a href="VistaUsuario/html/registro.html" class="btn btn-outline-secondary">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <!--TITULO-->
    <header class="masthead" style="background-image:radial-gradient(farthest-side,
        #14112ea2, 
        #14112eb8, 
        #14112ec5, 
        #14112E
        ),
        url('img/bioColum.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mt-5 mx-auto">
                    <h1 class="h6 text-secondary">KSPGAMES</h1>
                    <p class="text-white h1 text-start">Explora nuevos mundo, encuentra grandes juegos.
                        <span class="text-naranjita">KSP Games</span>
                        , tu destino de
                        entretenimiento interactivo.
                    </p>
                </div>
                <div class="col-12 col-md-6 mt-5 text-center">
                    <img class="img-fluid rounded-circle mx-auto" src="img/controlIcon.jpg" width="250px" height="250px"
                        alt="Control Icon">
                </div>
            </div>
        </div>
    </header>

    <!--AGREGADOS RECIENTEMENTE-->
    <main class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h2 class="mt-5 text-white">Agregados Recientemente</h2>
            </div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-auto" style="width: 250px; height: 350px;">
                <?php
                    $query = "SELECT * FROM productos ORDER BY id DESC LIMIT 6";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="card">';
                        echo '<img src="img/productos/'.$row["url_img"].'" alt="Producto">';
                        echo '<a href="#" class="stretched-link"></a>';
                        echo '</div>';
                    }
                ?>                
            </div>
        </div>
    </main>


    <!--FOOTER-->
    <footer style="background: black;">
        <div class="container text-white">
            <div class="row pt-5">
                <div class="col-12 col-md-4 mb-4">
                    <h2>Encuentranos en:</h2>
                    <a href="#"><img src="img/icons/discordIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="img/icons/facebookIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="img/icons/instaIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="img/icons/twitterIcon.png" alt="" class="img-fluid"></a>
                </div>

                <div class="col-12 col-md-4 mb-4">
                    <h2>KSP Games</h2>
                    <p>KSP Games es una pagina donde puedes comprar videojuegos en formato fisico, asi como tambien
                        Consolas, controles accesorios y Ediciones de coleccion</p>
                </div>

                <div class="col-12 col-md-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <h2>Mision</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit exercitationem aperiam
                                quod praesentium amet voluptas perferendis mollitia sed.</p>
                        </div>
                        <div class="col-12">
                            <h2>Vision</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores voluptates numquam
                                voluptates illum atque eum est consequatur? Ad deleniti vel iusto suscipit. Eos numquam
                                consequuntur voluptates culpa?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- <footer class="footer-container">
        <div class="footer-column columna1">
            <p>Encuentranos en: </p>
            <ul>
                <li>
                    <a href="">
                        <img src="" alt="Facebook">
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
    </footer> -->

    <script src="VistaUsuario/js/boostrap.min.js"></script>
</body>

</html>