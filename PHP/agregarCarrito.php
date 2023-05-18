<?php
    include 'conexion.php';

    $a = $_GET["var"];
    $id;
    $titulo;
    $precio;
    $url_img;

    $select = $con -> query("SELECT id, titulo, precio, url_img FROM productos WHERE id = '$a'");
    if($select -> num_rows>0){
        while($row = $select ->fetch_assoc()){
            $id  = $row["id"];
            $titulo = $row["titulo"];
            $precio = $row["precio"];
            $url_img = $row["url_img"];
        }
    }

    $insert = $con->query("INSERT INTO carrito (id, id_producto, nombre_producto, url_img, precio)
                            VALUES (0, '$id', '$titulo', '$url_img', '$precio')");
    if($insert){
        header("location: ../html/productos.php");
    }
?>