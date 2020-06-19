<?php
require("./clases/security.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    </head>
    <body>
        <?php
        include("./includes/headfoot.php");
        include("./includes/menu.php");
        ?>

        <main>
            <?php
            include("./includes/verpro.php");
            ?>
        </main>

        <script>
            function alerta(title, msg, btn){
                Swal.fire({  title: title,
                           text: msg,  
                           type: btn,    
                           showCancelButton: false,   
                           closeOnConfirm: false,   
                           allowOutsideClick: false,
                           showLoaderOnConfirm: true,
                           showConfirmButton: false,
                            timer: 2000 });
            }
            alerta("Proximamente","Aun no vale esto","warning");
            
            function redireccionar(){
                window.location="./";
            } 
            setTimeout ("redireccionar()",0);
        </script>
    </body>
</html>