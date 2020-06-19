<?php
require_once("./clases/conexion.php");
include("./clases/valida.php");

if(isset($_POST["registrar"])){
    $sql_registro = sprintf("INSERT INTO usuarios VALUES (%s, %s, %s, %s)",
                           valida::convertir($mysqli, $_POST["mail"], "text"),
                           valida::convertir($mysqli, $_POST["nombre"], "text"),
                           valida::convertir($mysqli, md5($_POST["pass"]), "text"),
                           valida::convertir($mysqli, $_POST["level"], "text"));
    $q_registro = mysqli_query($mysqli, $sql_registro);
    
    if($q_registro){
        header("location:./?reg=1");
    }else{
        header("location:./?reg=0");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <main>
        <form action="" method="post">
            <input type="text" name="mail" placeholder="Ingrese un correo" required>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
            <input type="password" name="pass" placeholder="Ingrese una contrasena" required>
            <select name="level" id="" required>
                <option value="">Seleccione nivel de  usuario</option>
                <option value="admin">Administrador</option>
                <option value="user">Usuario</option>
            </select>
            <input type="submit" name="registrar" value="Registrar">
            <input type="button" onclick="history.back()" value="Cancelar">
        </form>
    </main>
</body>
</html>