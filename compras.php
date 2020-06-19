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
        <!-- <script src="./js/jquery-3.4.1.js"></script>
        <script src="./js/form.js"></script>
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    alert("sdsd");
                    $("#popup").toggle();
                });
            });
        </script> -->
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
        </body>
</html>