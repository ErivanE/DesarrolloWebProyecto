<?php
include '../../PHP/conexion.php';
$user = $_GET['user'];
$id=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <?php
    $query = "SELECT id FROM usuarios WHERE correo = '$user'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
            $id = $fila["id"];
        }
    }
    ?>
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
                    <li class="nav-item"><a href="indexUser.php?user=<?php echo $user ?>" class="nav-link">Productos</a>
                    </li>
                    <li class="nav-item"><a href="" class="nav-link disabled">Carrito</a>
                    </li>
                    <li class="nav-item"><a
                            href="http://www.kspgames.com.webdav/VirtualizacionWebDav/index.php?user=<?php echo $user?>&id=<?php echo $id ?> "
                            class="nav-link">Pedidos</a></li>
                </ul>
                <div>
                    <a href="login.html" class="btn btn-outline-secondary me-1 disabled">
                        <?php echo $user ?>
                    </a>
                    <a href="../../index.php" class="btn btn-outline-primary">Salir</a>
                </div>
            </div>
        </div>
    </nav>
    <!--main-->
    <main class="container bg-white rounded-3">
        <div class="row g-3 my-5 py-5">
            <div class="col-12 col-lg-8 rounded-2 table-responsive">
                <h2>Resumen de la compra</h2>
                <table class="tabla table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr class="table-dark"></tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Consola</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $array = [];
                        $query = "SELECT id, id_producto, nombre_usuario, nombre_producto, precio, url_img FROM carrito WHERE nombre_usuario = '$user'";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                array_push($array, $row);
                                ?>
                                <tr>
                                    <td><img class="img-thumbnail"
                                            src="../../img/productos/<?php echo $row["url_img"] ?? null ?>" alt="Img Producto"
                                            width="100" height="100"></td>
                                    <td>
                                        <?php echo $row["nombre_producto"] ?? null ?>
                                    </td>
                                    <td>
                                        <?php echo $row["consola"] ?? null ?>
                                    </td>
                                    <td>
                                        <?php echo $row["precio"] ?? null ?>
                                    </td>
                                    <td>
                                        <?php echo $row["Descripcion"] ?? null ?>
                                    </td>
                                    <td><a
                                            href="../../PHP/carritoEliminar.php?user=<?php echo $user ?>&var=<?php echo $row["id"] ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-4 ">
                <h2>Finalizar Compra</h2>
                <form action="../../PHP/generarPDF.php?user=<?php echo $user ?>" method="post" class="mt-5 text-center">
                    <input type="submit" class="btn btn-success btn-lg w-100" value="Comprar">
                </form>
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