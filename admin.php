<?php
require("./clases/security.php");

if($_SESSION["nivel"] !== "admin"){
    header("location:./select.php");
}
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
       
    </main>
</body>
</html>