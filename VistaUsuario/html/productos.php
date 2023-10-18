<?php
include '../../PHP/conexion.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

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
                    <li class="nav-item"><a href="../../index.php" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Productos</a></li>
                    <li class="nav-item"><a href="ubicacion.html" class="nav-link">Ubicacion</a></li>
                    <li class="nav-item"><a href="contacto.html" class="nav-link">Contacto</a></li>
                </ul>
                <div>
                    <a href="login.html" class="btn btn-outline-primary me-1">Ingresar</a>
                    <a href="registro.html" class="btn btn-outline-secondary">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row mt-5">
            <!-- tarjeta -->
            <!-- <div class="col-2">
                <div class="card bg-dark text-white">
                    <img src="../../img/productos/cyberP2077.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Cyber pun 777</h5>
                        <h6 class="card-subtitle text-muted mb-2">nintendo</h6> 
                    <a href="#" class="btn btn-outline-primary">$500</a>
                    </div>
                </div>
            </div> -->
            
            <?php 
            $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
            $result = $con->query($query);

            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo '<div class="col-2 mb-2 " >';
                    echo '<div class="card bg-dark text-white">';
                    #IMAGEN
                    echo '<img src="../../img/productos/'.$row["url_img"].'" class="card-img-top img-fluid" alt="">';
                    echo '<div class="card-body">';
                    #TITULO
                    echo '<h5 class="card-title">'.$row["titulo"].'</h5>';
                    #PLATAFORMA
                    #echo '<h6 class="card-subtitle text-muted mb-2">'.$row[""].'</h6>';
                    #PRECIO
                    echo '<a href="login.html" class="btn btn-outline-primary">$'.$row["precio"].'</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>


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
</body>

</html>