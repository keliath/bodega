<?php
require("./clases/security.php");
//echo $_SESSION["nivel"];exit();
if($_SESSION["nivel"] !== "user"){
    header("location:./select.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>usuario</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php
    include("./includes/headfoot.php");
    include("./includes/menu.php");
    ?>
</body>
</html>