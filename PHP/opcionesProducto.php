<?php
    include "conexion.php";
    $id          = $_POST['id'];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];    
    $precio      = $_POST['precio'];
    $stock       = $_POST['stock'];
    $url_img     = $_POST['url_img'];
    $proveedor   = $_POST['proveedor'];    
    //AGREGAR
    if(isset($_POST['agregarAdmin'])){
        $consulta = $con ->query("INSERT INTO productos(id,titulo,precio,stock,url_img,descripcion)
        VALUES (0,'$titulo','$precio','$stock','$url_img','$descripcion')");
        header("location: ../VistaAdmin/html/productos.php");
    }else
    //MODIFICAR
    if(isset($_POST['modificarAdmin'])){
        $consulta = $con->query("UPDATE productos
                        SET titulo = '$titulo', 
                            precio = '$precio', 
                            stock = '$stock', 
                            url_img = '$url_img', 
                            descripcion = '$descripcion' 
                        WHERE id = '$id'");
        header("location: ../VistaAdmin/html/productos.php");
    }else
    //ELIMINAR
    if(isset($_POST['eliminarAdmin'])){
        $indice = $_POST['id'];
        $consulta = $con->query("DELETE FROM productos WHERE id = '$indice'");
        header("location: ../VistaAdmin/html/productos.php");
    }else
    //BUSCAR
    if(isset($_POST['buscarAdmin'])){

    }
?>