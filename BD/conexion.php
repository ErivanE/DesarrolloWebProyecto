<?php

$server = "localhost";
$database = "kspGames";
$username = "root";
$password = "1234";

$con = mysq_connect($server, $database, $username, $password);

if($con){
    echo "conexion exitosa";
}else{
    echo  "sin conexion";
}

?>