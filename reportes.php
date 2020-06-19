<?php
require_once("./clases/conexion.php");
require("./clases/security.php");
require("./clases/valida.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/ajax.js"></script>
        <script src="./js/funciones.js"></script>
        <script src="jspdf/dist/jspdf.min.js"></script>
        <script src="js/jspdf.plugin.autotable.min.js"></script>
        <body>
            <?php
            include("./includes/headfoot.php");
            include("./includes/menu.php");
            ?>

            <main>
                <form action="" class="form">
                    <input type="text" name="texto" placeholder="Buscar">
                    <input type="button" id="generar" name="buscar" value="buscar" onclick="ajax('./ajaxphp/reporte.php','display', texto)">
                    <a href='#' id='GenerarTabla'><img src='./images/pdf.png' width='100px'></a>
                </form>
                <div id="display"></div>
            </main>
           
        </body>
</html>