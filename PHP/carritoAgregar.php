<?php
    include 'conexion.php';
    //agregarCarrito
    $a = $_GET["var"];
    $user = $_GET["user"];
    $idProducto;
    $titulo;
    $precio;
    $url_img;
    $idUsuario;
    $nombre;
    
    $selectProducto = $con -> query("SELECT id, titulo, precio, url_img FROM productos WHERE id = '$a'");
    $selectUsuario = $con -> query("SELECT id, correo FROM usuarios WHERE correo = '$user'");

    if($selectProducto -> num_rows>0){
        while($row = $selectProducto ->fetch_assoc()){
            $idProducto = $row["id"];
            $titulo = $row["titulo"];
            $precio = $row["precio"];
            $url_img = $row["url_img"];
        }
    }
    if($selectUsuario -> num_rows>0){
        while($row = $selectUsuario -> fetch_assoc()){
            $idUsuario = $row["id"];
            $correo = $row["correo"];
        }
    }
    $insert = $con->query("INSERT INTO carrito (id, id_producto, id_usuario, nombre_producto, nombre_usuario, url_img, precio)
                            VALUES (0, '$idProducto', '$idUsuario', '$titulo', '$correo', '$url_img', '$precio')");
    if($insert){
        header("location: ../VistaUsuario/html/indexUser.php?user=$user");
    }  
?>