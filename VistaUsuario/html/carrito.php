<?php include '../php/conexion.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/estiloAdmin.css">
    <link rel="stylesheet" href="../css/estilo.css">
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
    <nav class="navbar general">
        <ul>
            <li><a href="../Index.html">Inicio</a></li>
            <li><a href="../html/productos.php">Productos</a></li>
            <li><a href="../html/ubicacion.html">Ubicacion</a></li>
            <li><a href="../html/carrito.php">Carrito</a></li>
        </ul>
    </nav>
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
    <footer>
        <div class="footer-contain mision-vision_content">
            <div class="social-media">
                <h2 class="blanco">Encuentranos en: </h2>
                <ul>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1293/PNG/96/2363208-app-chat-discord-game-gamer-social_85471.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1753/PNG/96/iconfinder-social-media-applications-3instagram-4102579_113804.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/836/PNG/96/Facebook_icon-icons.com_66805.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1211/PNG/96/1491579583-yumminkysocialmedia02_83111.png" alt=""></a></li>
                
                </ul>
            </div>
            <p class="blanco">
                Estamos ubicados en Guadalajara, Jalisco
                <br>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit unde quis veritatis provident ullam explicabo at doloremque minus, adipisci mollitia nemo. Necessitatibus error voluptatibus ex reprehenderit officia beatae? Voluptate, tempora!
                Nisi harum maxime eius veritatis suscipit dolores aspernatur dolore porro ea deserunt culpa id expedita commodi omnis ab officiis saepe, dolorem quos iusto vitae molestiae? Quasi id dolor sunt error.
                Veritatis iusto nam dolorem deserunt iste qui voluptatibus ex, temporibus quia inventore quidem porro maxime, doloremque vel, consectetur sed praesentium cupiditate minima neque nulla facere voluptate. Quas sapiente id necessitatibus.
            </p>
        </div>
    </footer>
</body>
</html>