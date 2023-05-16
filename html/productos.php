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
<body style="background-color: white;">
    <nav class="navbar general">
      <ul>
        <li><a href="../Index.html">Inicio</a></li>
        <li><a href="../html/productos.html">Productos</a></li>
        <li><a href="../html/ubicacion.html">Ubicacion</a></li>
      </ul>
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
                    echo        "<a href='#'><img src='https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png'  width='50' height='50' alt='' class=''></a>";
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
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div class="tarjeta-icons">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="img">
            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                <a href="" style="background-color: white; border-radius: 50%;"><img src="../img/guardarIcono.png"  width="50" height="50" alt="" class=""></a>
                <a href="" style=" border-radius: 20%;"><img src="https://cdn.icon-icons.com/icons2/606/PNG/96/shopping-cart-add-button_icon-icons.com_56132.png"  width="50" height="50" alt="" class=""></a>
            </div>
            <div class="cont">
                <p class="titulo">Titulo</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        
    </div>

    

    
    <!-- <div class="container">
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="">
            <div class="contenido">
                <div class="titular">
                    <h2>titulo del producto</h2>
                </div>
                <div class="desc">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae beatae, aspernatur, velit consectetur facere nesciunt perferendis accusantium quasi vero ab illum quam error ipsum consequatur quis minus eligendi voluptatem ut?</p>
                </div>
                <div class="precio">
                    <h2>$999</h2>
                </div>
                <a href="#">Comprar</a>
            </div>
            <img class="fav" src="http://placekitten.com/50/50" alt="">
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="">
            <div class="contenido">
                <div class="titular">
                    <h2>titulo del producto</h2>
                </div>
                <div class="desc">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae beatae, aspernatur, velit consectetur facere nesciunt perferendis accusantium quasi vero ab illum quam error ipsum consequatur quis minus eligendi voluptatem ut?</p>
                </div>
                <div class="precio">
                    <h2>$999</h2>
                </div>
                <a href="#">Comprar</a>
            </div>
            <img class="fav" src="http://placekitten.com/50/50" alt="">
        </div>
        <div class="tarjeta">
            <img src="http://placekitten.com/250/250" alt="">
            <div class="contenido">
                <div class="titular">
                    <h2>titulo del producto</h2>
                </div>
                <div class="desc">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae beatae, aspernatur, velit consectetur facere nesciunt perferendis accusantium quasi vero ab illum quam error ipsum consequatur quis minus eligendi voluptatem ut?</p>
                </div>
                <div class="precio">
                    <h2>$999</h2>
                </div>
                <a href="#">Comprar</a>
            </div>
            <img class="fav" src="http://placekitten.com/50/50" alt="">
        </div>
    </div> -->
    
</body>
</html>