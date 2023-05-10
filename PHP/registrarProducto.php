<?php
    include "conexion.php";

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $url_img = $_POST['imagenUrl'];
    $url_pag = $_POST['0'];
    $proovedor = $_POST['-'];

    $query = "INSERT INTO productos (id, titulo, precio, stock, url_img, descripcion) VALUES(0,'$titulo','$precio','$stock','$url_img','$descripcion')";
    $sql = mysqli_query($con, $query);
    
    if($sql){
        header("location: ../php/productos.php");
    }else{
        echo "producto no agregado";
    }
?>