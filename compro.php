<?php
require_once("./clases/conexion.php");
require("./clases/security.php");
include("./clases/valida.php");

$idPro = $_GET["com"];

$sql_producto = sprintf("SELECT pro_nombre FROM producto where pro_codigo = %s",
                        valida::convertir($mysqli, $idPro, "text"));
$q_producto = mysqli_query($mysqli, $sql_producto);
$r_producto = mysqli_fetch_assoc($q_producto);

$sql_proveedor = "SELECT * FROM proveedor";
$q_proveedor = mysqli_query($mysqli, $sql_proveedor);
$t_proveedor = mysqli_num_rows($q_proveedor);

if(isset($_POST["comprar"])){
    $date = date("Y-m-d");
    $sql_comprar = sprintf("INSERT INTO compras (pro_codigo, prv_ruc, com_precio, com_pvp, com_cantid, com_fecha) VALUES 
    (%s, %s, %s, %s, %s, %s)",
                           valida::convertir($mysqli, $_GET["com"], "text"),
                           valida::convertir($mysqli, $_POST["proveedor"], "text"),
                           valida::convertir($mysqli, $_POST["precio"], "double"),
                           valida::convertir($mysqli, $_POST["pvp"], "double"),
                           valida::convertir($mysqli, $_POST["cantidad"], "int"),
                           valida::convertir($mysqli, $date, "date"));
    $q_comprar = mysqli_query($mysqli, $sql_comprar) or die ("error: ".mysqli_error($mysqli));
    
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <body>
            <?php
            include("./includes/headfoot.php");
            include("./includes/menu.php");
            ?>

            <main>
                <form action="" class="form" method="post">
                   <h3>Compra de producto</h3>
                    <input type="text" name="nombre" readonly value ="<?php echo $r_producto["pro_nombre"];?>">
                    <select name="proveedor" id="">
                        <option value="">Seleccione el proveedor</option>
                        <?php
                            while($r_proveedor = mysqli_fetch_assoc($q_proveedor)){
                                $idPrv = $r_proveedor["prv_ruc"];
                                $nombre = $r_proveedor["prv_nombre"];
                                $opciones = sprintf("<option value = '%s'>%s</option>",
                                                    $idPrv,
                                                    $nombre);
                                echo $opciones;
                            }
                        ?>
                    </select>
                    <input type="text" name="precio" placeholder="Precio de compra">
                    <input type="text" name="pvp" placeholder="Precio de venta al publico">
                    <input type="text" name="cantidad" placeholder="Cantidad del producto">
                    <input type="submit" name="comprar" value="Comprar">
                    <input type="button" value="Cancelar" onclick="history.back()">
                </form>
            </main>
        </body>
</html>