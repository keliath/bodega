<?php
require_once("./conexion.php");
include("./valida.php");

session_start();

$sql_status = sprintf("UPDATE usuarios SET usu_status = 0 where usu_mail = %s",
                     valida::convertir($mysqli, $_SESSION["mail"], "text"));
$q_status = mysqli_query($mysqli, $sql_status) or die ("Error: ".mysqli_error($mysqli));

session_destroy();
header("location:../");
?>