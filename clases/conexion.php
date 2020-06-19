<?php
$host = "localhost";
$user = "tester";
$pass = "1234";
$db = "bodega";

$mysqli = mysqli_connect($host, $user, $pass, $db);
if(!$mysqli){
    echo("Erro en conexion: ". mysqli_error($mysqli));
}
?>