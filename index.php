<?php
require_once("./clases/conexion.php");
require("./clases/valida.php");

session_start();

//preguntar si hay sesion iniciada ya
if(isset($_SESSION["mail"])){
    header("location:./select.php");
}

//condiciones de alert para el registro
if(isset($_GET["reg"])){
    if($_GET["reg"] == 1){
        echo "<script> alert('Registro exitoso'); </script>";
    }elseif($_GET["reg"] == 0){
        echo "<script> alert('Error en registro'); </script>";
    }
}


//
if(isset($_POST['ingresar'])){
    $sql_login = sprintf("select * from usuarios where usu_mail =  %s and usu_pass = %s",
                         valida::convertir($mysqli, $_POST["mail"],"text"),
                         valida::convertir($mysqli,md5($_POST["pass"]),"text"));
    $q_login = mysqli_query($mysqli, $sql_login);
    $r_login = mysqli_fetch_assoc($q_login);
    $t_login = mysqli_num_rows($q_login);

    if($t_login == 0){
        header("location:./?err");
    }else{
        $_SESSION["mail"] = $r_login["usu_mail"]; 
        $_SESSION["nivel"] = $r_login["usu_nivel"];
        
        $sql_status = sprintf("UPDATE usuarios SET usu_status = 1 where usu_mail = %s",
                             valida::convertir($mysqli, $_POST["mail"], "text"));
        $q_status = mysqli_query($mysqli, $sql_status) or die ("error: ".mysqli_error($mysqli));
        
        header("location:./select.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="./css/login.css">
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <main>
            <form action="" method="post" class="form">
                <input type="text" name="mail" placeholder="Ingrese su correo electronico">
                <input type="password" name="pass" placeholder="Ingrese su contraseña">
                <input type="submit" name="ingresar" value="Ingresar">
                <?php
                if(isset($_GET["err"])){
                    echo "<span class='error'>usuario incorrecto</span>";
                }
                if(isset($_GET["sec"])){
                    echo "<span class='error'>usuario no autorizado</span>";
                }
                ?>
                <br>
                <a href="./restorepass" id="restorepass">Olvido su contraseña?</a>
                <a href="./registro.php" id="registro"  style="float:right">registrar nuevo usuario</a>
                <div id="display"></div>
            </form>
        </main>
    </body>
</html>