<?php
include '../../PHP/conexion.php';
$user = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Productos</title>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-moradito">
        <div class="container-fluid">
            <img src="../../img/icons/KSPGames.png" class="navbar-brand img-fluid" alt="Logo">
            <!-- <a href="#" class="navbar-brand">KSPGAMES</a> -->
            <button class="navbar-toggler m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="menu" aria-expanded="false" aria-label="Mostrar / Ocultar menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item"><a href="#" class="nav-link disabled">Productos</a></li>
                    <li class="nav-item"><a href="carrito.php?user=<?php echo $user ?>" class="nav-link">Carrito</a>
                    </li>
                    <li class="nav-item"><a href="http://10.0.33.3/VirtualizacionWebDav/index.php?user=<?php echo $user ?> "
                            class="nav-link">Pedidos</a></li>
                </ul>
                <div>
                    <a href="login.html" class="btn btn-outline-secondary me-1 disabled">
                        <?php echo $user ?>
                    </a>
                    <a href="registro.html" class="btn btn-outline-primary">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <!--BANNER-->
    <section class="masthead" style="background-image:radial-gradient(farthest-side,
        #14112ea2, 
        #14112eb8, 
        #14112ec5, 
        #14112E
        ),
        url('../../img/spider.jpg');">
        <div class="container">
            <div class="row align-items-center" style="height: 60vh;">
                <div class="col-12 ">
                    <p class="h1 text-center">¡Encuentra tu próximo desafío virtual y conviértete en un verdadero
                        jugador!</p>

                </div>
            </div>
        </div>
    </section>

    <!-- MAIN -->
    <main style="background: white">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 mt-5 py-5 g-3">
                <?php
                $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card shadow">
                                <img class="card-img-top img-fluid imagen-normalizada"
                                    src="../../img/productos/<?php echo $row["url_img"] ?>" alt="CyberBug777">
                                <div class="card-body">
                                    <p class="h2 card-text">$
                                        <?php echo $row["precio"] ?>
                                    </p>
                                    <h4 class="card-title">
                                        <?php echo $row["titulo"] ?>
                                    </h4>
                                    <p class="card-text"><small class="text-muted">Consola</small></p>
                                    <a href="#" class="btn btn-outline-primary disabled">Comprar</a>
                                    <a href="../../PHP/carritoAgregar.php?user=<?php echo $user?>&var=<?php echo $row["id"]?>" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z">
                                            </path>
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
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
                    <a href="#"><img src="../../img/icons/discordIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="../../img/icons/facebookIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="../../img/icons/instaIcon.png" alt="" class="img-fluid"></a>
                    <a href="#"><img src="../../img/icons/twitterIcon.png" alt="" class="img-fluid"></a>
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

    <script src="VistaUsuario/js/boostrap.min.js"></script>
</body>

</html>