<?php  //script para mostrar los productos
require_once("./clases/conexion.php");

$sql_mostrar = sprintf("SELECT * FROM producto");
$q_mostrar = mysqli_query($mysqli, $sql_mostrar) or die("error: ".mysqli_error($mysqli));

if($q_mostrar){ 
    echo "<div class = 'contenedor'>";
    while($r_mostrar = mysqli_fetch_assoc($q_mostrar)){
        $titulo = $r_mostrar["pro_nombre"];
        $codigo = $r_mostrar["pro_codigo"];
        $img = $codigo. "." .$r_mostrar["pro_img"];
        if(isset($_GET["com"])){ //condicion que verificara si se tiene la variable de compras para que el enlace sea el de comrpas
            echo (sprintf("<div class='producto'>
            <span class='titulo'>%s</span>
            <a href = 'compro.php?com=%s'class = 'vista'><img src='./images/productos/%s' alt='Algo salio mal xd'></a>
            </div>",
                          $titulo,
                          $codigo,
                          $img));
            
        }elseif(isset($_GET["ven"])){ //condicion que verificara si se tiene la variable ventas para que el enlace sea ventas
            echo (sprintf("<div class='producto'>
            <span class='titulo'>%s</span>
            <a href = 'venpro.php?ven=%s'><img src='./images/productos/%s' alt='Algo salio mal xd'></a>
            </div>",
                          $titulo,
                          $codigo,
                          $img));
        }

    }
    echo "</div>";
}
?>


