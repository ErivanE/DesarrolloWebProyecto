<?php
include '../../PHP/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../../VistaUsuario/css/style.css">

    <title>Inicio Admin</title>
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
                    <li class="nav-item"><a href="#" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Productos</a></li>
                    <li class="nav-item"><a href="usuarios.php" class="nav-link">Usuarios</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Proveedores</a></li>
                </ul>
                <div>
                    <a href="../../index.php" class="btn btn-outline-primary">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <!--MAIN-->
    <!-- Buscador
    form
    botones acciones
    tabla contenido -->

    <main class="container text-white">
        <!-- BUSCADOR -->
        <!-- haz que el resultado de boton se muestre en un modal -->
        <div class="row mt-5 mb-5 justify-content-center  bg-dark rounded-3 border border-primary">
            
            <!-- form acciones -->
            <form action="../../PHP/opcionesProducto.php" method="post" class="col-12 mt-3">
                <div class="row mb-1">
                    <div class="col-12 col-lg-1">
                        <input type="text" placeholder="ID" name="id" id="id" class="form-control">
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" placeholder="Titulo" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="col-12 col-lg-4">
                        <!-- QUE SEA UNA LISTA -->
                        <input type="text" placeholder="Consola" name="consola" id="consola" class="form-control">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-12 col-lg-3">
                        <!-- agregar span con simbolo dineros -->
                        <input type="text" placeholder="Precio" name="precio" id="precio" class="form-control">
                    </div>
                    <div class="col-12 col-lg-1">
                        <input type="text" placeholder="Stock" name="stock" id="stock" class="form-control">
                    </div>
                    <div class="col-12 col-lg-8">
                        <input type="text" placeholder="Proveedor" name="proveedor" id="proveedor" class="form-control">
                    </div>
                </div>
                <input type="file" placeholder="URL Img" name="url_img" id="url_img" class="form-control mb-1">
                <textarea placeholder="Descripcion" name="descripcion" id="descripcion"
                    class="form-control mb-2"></textarea>

                <div class="d-grid gap-2 d-md-block">
                    <input type="submit" value="Agregar" name="agregarAdmin" class="btn btn-outline-primary">
                    <input type="submit" value="Modificar" name="modificarAdmin" class="btn btn-outline-primary">
                    <input type="submit" value="Eliminar" name="eliminarAdmin" class="btn btn-outline-primary">

                </div>

            </form>
            
            <!-- form busqueda / tabla-->
            <form class="col-12 mt-3 ">
                <h3 class="mt-3">Buscar Producto</h3>
                <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="form-control mb-3">
                <input type="submit" name="botonBuscar" value="Buscar" class="btn btn-outline-primary mb-3">

                <?php
                if (isset($_GET['botonBuscar'])) {
                    $buscar = $_GET['buscar'];

                    $consulta = $con->query("SELECT * FROM productos 
                                                    WHERE id = '$buscar'
                                                        or titulo LIKE '%$buscar%'
                                                        or precio = '$buscar'
                                                        or stock = '$buscar' 
                                                        or descripcion LIKE '%$buscar%'
                                                        or url_img LIKE '%$buscar%'
                                                        or id_proveedor = '$buscar'
                                                        ");
                    if ($consulta->num_rows > 0) {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm table-bordered border-primary">
                                <thead>
                                    <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <!-- <th>Consola</th> -->
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Proveedor</th>
                                        <th>IMG</th>
                                    </tr>
                                </thead>

                                <?php
                                while ($row = $consulta->fetch_assoc()) {
                                    echo "<tbody>";
                                    echo "<tr class = 'text-white'>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["titulo"] . "</td>";
                                    // echo "<td>" . $row["Consola"] . "</td>";
                                    echo "<td>" . $row["descripcion"] . "</td>";
                                    echo "<td>" . $row["precio"] . "</td>";
                                    echo "<td>" . $row["stock"] . "</td>";
                                    echo "<td>" . $row["id_proveedor"] . "</td>";
                                    echo "<td><img src = '../../img/productos/" . $row['url_img'] . "'alt = 'producto' width=100 heigt=100'></td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }

                                echo "</table>";
                                echo "</div>";
                    }
                }
                ?>
                        <div class="table-responsive text-white">
                            <table class="table table-striped table-hover table-sm table-bordered border-primary">
                                <thead>
                                    <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <th>Consola</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Proveedor</th>
                                        <th>IMG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-white">
                                        <td>1</td>
                                        <td>sadf</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
            </form>
        </div>
    </main>



    <div class="contenedorAdmin">
        <!-- <div class="adminForm">
            <form action="../../PHP/opcionesProducto.php" method="post">
                <label for="id" class="adminForm-label">Id</label>
                <input type="text" name="id" id="id" class="adminForm-input">

                <label for="titulo" class="adminForm-label">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="adminForm-input">

                <label for="descripcion" class="adminForm-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="adminForm-input">

                <label for="precio" class="adminForm-label">Precio</label>
                <input type="number" name="precio" id="precio" class="adminForm-input">

                <label for="stock" class="adminForm-label">Stock</label>
                <input type="number" name="stock" id="stock" class="adminForm-input">

                <label for="url_img" class="adminForm-label">URL Img</label>
                <input type="file" name="url_img" id="url_img" class="adminForm-input">

                <label for="proveedor" class="adminForm-label">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor" class="adminForm-input">

                <input type="submit" name="agregarAdmin" value="Agregar">
                <input type="submit" name="modificarAdmin" value="Modificar">
                <input type="submit" name="eliminarAdmin" value="Eliminar">
                <input type="submit" name="buscarAdmin" value="Buscar">

            </form>
        </div> -->
        <!-- <div class="adminTablas">
            <table>
                <thead>
                    <tr>
                        <th class="celdaPequeña"> Id</th>
                        <th class="celdaMediana"> Titulo</th>
                        <th class=""> Descripcion</th>
                        <th class="celdaPequeña"> Precio</th>
                        <th class="celdaPequeña"> Stock</th>
                        <th class=""> URL Img</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['titulo'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "<td>" . $row['precio'] . "</td>";
                            echo "<td>" . $row['stock'] . "</td>";
                            echo "<td><img src = '../../img/productos/" . $row['url_img'] . "'alt = 'producto' width=100 heigt=100'></td>";
                            echo "<tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> -->
    </div>
    <!--Form de busqueda-->
    <!-- <div class="caja">
        <form action="" method="get">
            <div class="cont">
                <h2 class="cont-titulo">Buscar Producto</h2>

                <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="cont-input">
                <input type="submit" name="enviar" value="Buscar" class="cont-boton">

                <?php
                if (isset($_GET['enviar'])) {
                    $buscar = $_GET['buscar'];

                    $consulta = $con->query("SELECT * FROM productos 
                                                            WHERE id='$buscar' 
                                                                or titulo ='$buscar' 
                                                                or precio='$buscar' 
                                                                or stock='$buscar' 
                                                                or descripcion='$buscar'");
                    if ($consulta->num_rows > 0) {
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
                            while ($row = $consulta->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["titulo"] . "</td>";
                                echo "<td>" . $row["precio"] . "</td>";
                                echo "<td>" . $row["stock"] . "</td>";
                                echo "<td>" . $row["descripcion"] . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                    }
                }
                ?>
            </div>
        </form>
    </div> -->


    <script src="../js/bootstrap.bundle.js"></script>

</body>

</html>