<?php
    include '../PHP/conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Productos</title>
    <style>
        .contenedor{
            background-color: white;
            margin: 2rem 2rem;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .tarjeta{
            width: 250px;
            margin: 20px;
            padding: 0px;
            border-radius: 0px;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }
        .icon{
            margin: -50px 0px 0px 5px;
            background-color: white;
            border-radius: 50%;
        }
        .icon:hover{
            background-color: whitesmoke;
        }
        .titulo{
            font-size: 2rem;
            text-align: center;
            margin: 0rem 0rem 1rem 0rem;
        }
        .descripcion, .precio{
            font-size: 1rem;
            margin: 1rem 1rem;
        }
        .precio{
            font-size: 2rem;
            color: purple;
        }
        .precio::before{
            content: "$";
        }
        .cont{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .tarjeta-icons{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!--NAVBAR-->
    <nav class="nav">
        <div class="nav-login-container">
            <img src="../img/icons/KSPGames.png" alt="kspLogo">
            <p class="nav-login-item">|</p>
            <a href="../indexTemp.html" class="nav-login-item">Inicio</a>
            <a href="../html/productos.php" class="nav-login-item">Productos</a>
            <a href="../html/ubicacion.html" class="nav-login-item">Ubicacion</a>
            <a href="../html/contacto.html" class="nav-login-item">Contacto</a>
        </div>
        <div class="nav-login-container">
            <a href="../html/login.html" class="nav-login-item boton botonGris">Iniciar Sesion</a>
            <a href="../html/register.html" class="nav-login-item boton botonAzul">Registrarse</a>
        </div>
    </nav>

    <div class="contenedor">
        <?php
            $query = "SELECT id, titulo, descripcion, precio, stock, url_img FROM productos";
            $result = $con->query($query);

            if($result ->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "<div class='tarjeta'>";
                    echo     "<img src='../img/".$row["url_img"]."' alt='img' width='250' height='250'>";
                    echo     "<div class='tarjeta-icons'>";
                    echo        "<a href='#'><img src='../img/guardarIcono.png'  width='50' height='50' alt=''></a>";
                    echo        "<a href='../PHP/agregarCarrito.php?var=".$row["id"]."'><img src='https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png'  width='50' height='50' alt='' class=''></a>";
                    echo     "</div>";
                    echo     "<div class='cont'>";
                    echo        "<p class='titulo'>".$row["titulo"]."</p>";
                    //echo        "<p class='descripcion'>".$row["descripcion"]."</p>";
                    echo        "<p class='precio'>".$row["precio"]."</p>";
                    echo    "</div>";
                    echo "</div>";
                }
            }
        ?>
    </div>
    <!--FOOTER-->
    <footer class="footer-container">
        <div class="footer-column columna1">
            <p>Encuentranos en:  </p>
            <ul>
                <li>
                    <a href="">
                        <img src="../img/icons/facebookIcon.png" alt="Facebook">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../img/icons/twitterIcon.png" alt="Twitter">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../img/icons/instaIcon.png" alt="Instagram">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="../img/icons/discordIcon.png" alt="Discord">
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