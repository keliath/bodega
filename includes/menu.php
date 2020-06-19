<?php //script para mostrar un solo menu en todas las paginas
@session_start();

if($_SESSION["nivel"] == "admin"){ //condicion que verificara la variable 'nivel' para mostrar ciertas opciones si es admin o no
    echo "<nav>
    <ul>
    <li><a href='./'>Home</a></li>
    <li><a href='./compras.php?com'>Comprar productos</a></li>
    <li><a href='./newpro.php'>Nuevo producto</a></li>
    <li><a href='./ventas.php?ven'>Vender</a></li>
    <li><a href='./reportes.php'>Reportes</a></li>
    <li><a href='./clases/close.php' class='cerrar'>cerrar sesion</a></li>
    </ul>
    </nav>";
}else{
    echo "<nav>
    <ul>
    <li><a href='./'>Home</a></li>
    <li><a href='./ventas.php?ven'>Vender</a></li>
    <li><a href='./clases/close.php' class='cerrar'>cerrar sesion</a></li>
    </ul>
    </nav>";
}

?>
   