<?php
require_once("./clases/conexion.php");
require_once("./clases/security.php");
include("./clases/valida.php");

if(isset($_POST["guardar"])){
    $tmpName = $_FILES["file"]["tmp_name"];
    $partes = $_FILES["file"]["name"];
    $partes = explode(".", $partes);
    $ext = end($partes);
    $title = "";
    $msg = "";
    $btn = "";

    $sql_guardar = sprintf("INSERT INTO producto value (%s, %s, %s, %s)",
                          valida::convertir($mysqli, $_POST["codigo"], "text"),
                          valida::convertir($mysqli, $_POST["nombre"], "text"),
                          valida::convertir($mysqli, $_POST["descripcion"], "text"),
                          valida::convertir($mysqli, $ext, "text"));
    $q_guardar = mysqli_query($mysqli, $sql_guardar);
    
    if($q_guardar){
        $carpetaDestino = "./images/productos/";
        $nombre = $_POST["codigo"] . "." .$ext;
        $destino = $carpetaDestino . $nombre;
        move_uploaded_file($tmpName, $destino);
        
        echo"<script>
            var title = 'Exito!';
             var msg = 'Registro de producto exitoso';
            var btn = 'success';
        </script>";
    }else{
        echo"<script>
            var title = 'Error';
             var msg = 'Fallo en el registro del producto';
            var btn = 'error';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="./js/jquery-3.4.1.js"></script>
        <script>
            function alerta(title, msg, btn){
                Swal.fire({  title: title,
                      text: msg,  
                      type: btn,    
                      showCancelButton: false,   
                      closeOnConfirm: false,   
                      confirmButtonText: 'Aceptar', 
                      showLoaderOnConfirm: true, }, 
                     function(){   
                    setTimeout(function(){     
                        location = 'newpro.php';  
                    },0);
                });
            }
        </script>
        <!-- <script>
            $(function(){  //esperar a que el html cargue. version larga y mas entendible -> document).ready(function(){});
                $("p").dblclick(function(){
                    $(this).hide();
                });
            });
        </script> -->
    </head>
    <body>
        <?php
        include("./includes/headfoot.php");
        include("./includes/menu.php");
        ?>
        
        <main>
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <input type="text" name="codigo" placeholder="Codigo del producto" autocomplete="off" required>
                <input type="text" name="nombre" placeholder="Nombre del producto" autocomplete="off" required>
                <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Descripcion del producto"></textarea>
                <input type="file" name="file" accept="image/x-png, image/jpeg, image/gif">
                <input type="submit" name="guardar" value="Guardar">
                <input type="button" onclick="redireccionar()" value="Cancelar">
            </form>
        </main>
        
        <script>
            alerta(title, msg, btn);
            function redireccionar(){
                window.location="./";
            } 
        </script>
        
    </body>
</html>