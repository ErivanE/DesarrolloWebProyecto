<?php
    include "conexion.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $url_img = $_POST['url_img'];
    $descripcion = $_POST['descripcion'];
    $url_pag = $_POST['0'];
    $proovedor = $_POST['-'];

    $query = "UPDATE productos
                SET titulo = '$titulo',
                    precio = '$precio',
                    stock = '$stock',
                    url_img = '$url_img',
                    descripcion = '$descripcion'
                WHERE id = '$id' ";
    $sql = mysqli_query($con, $query);
    
    if($sql){
        header("location: ../php/productos.php");
    }else{
        echo "producto no agregado";
    }
?>