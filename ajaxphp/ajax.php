<?php
require_once("../clases/conexion.php");
require_once("../clases/valida.php");
require("../clases/security.php");

$usu = $_POST["usu"];

if($usu != ''){
    $sql_prueba = sprintf("select usu_mail from usuarios where usu_mail = %s",
                          valida::convertir($mysqli, $usu, "text"));
    $q_prueba = mysqli_query($mysqli, $sql_prueba) or die("error: ".mysqli_error($mysqli));

    if(mysqli_num_rows($q_prueba) != 0){
        echo "<br><span class = 'error'>usuario ya existe</span>";
    }else{
        echo "<br><span style='color:green'>mail valido</span>";
    }
}

?>