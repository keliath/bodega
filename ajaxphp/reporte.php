<?php

require_once("../clases/conexion.php");
require("../clases/security.php");
require("../clases/valida.php");

$param = $_POST["usu"].'%'; //nombre del producto 
$tabla = "";//tabla del pdf

$sql_reporte = sprintf("SELECT pro_nombre, pro_descri, sum(com_cantid) as compras, ifnull(ven_cantid,0) as ventas, sum(com_cantid) - sum(ifnull(ven_cantid,0)) as stock FROM producto a inner join compras b on a.pro_codigo = b.pro_codigo left join ventas c on b.id_compra = c.id_compra where pro_nombre like %s group by a.pro_nombre",
                       valida::convertir($mysqli, $param, "text"));
$q_reporte = mysqli_query($mysqli, $sql_reporte) or die ("error: ".mysqli_error($mysqli));



//crear encabezado XML
$xml=new DOMDocument("1.0","utf-8");
$reporte=$xml ->createElement("Reporte");
$reporte->setAttribute("id","reporte");
$reporte->setAttribute("version","1.1.0");
$reporte=$xml->appendChild($reporte);
//

$tabla .= '<table>'; //tabla para el pdf
$tabla .= '<tr><td>Producto</td><td>compras</td><td>ventas</td><td>stock</td></tr>';
    
//Creacion de tabla XML
echo "<div><table border = 3> \n";
echo "<tr><td>Producto</td><td>compras</td><td>ventas</td><td>stock</td></tr> \n";
while($r_reporte = mysqli_fetch_assoc($q_reporte)){
    $producto = $r_reporte["pro_nombre"];
    $compras = $r_reporte["compras"];
    $ventas = $r_reporte["ventas"];
    $stock = $r_reporte["stock"];
    echo "<tr><td>$producto</td><td>$compras</td><td>$ventas</td><td>$stock</td></tr> \n";//llenar filas de tabla

    //llenar filas de la tabla para el pdf
    $tabla .= "<tr><td>$producto</td><td>$compras</td><td>$ventas</td><td>$stock</td></tr>";

    //llenar XML
    $xmlProducto=$xml->createElement("Producto");
    $xmlProducto=$reporte->appendChild($xmlProducto);

    $xmlNombre=$xml->createElement("Nombre",$producto); 
    $xmlNombre=$xmlProducto->appendChild($xmlNombre);
    $xmlCompra=$xml->createElement("Compra",$compras);
    $xmlCompra=$xmlProducto->appendChild($xmlCompra);
    $xmlVenta=$xml->createElement("Venta",$ventas);
    $xmlVenta=$xmlProducto->appendChild($xmlVenta);
    //
}
echo "</table></div>";

$tabla .= '</table>';//fin de tabla pdf

//proceso de guardado del XML
if(!file_exists('../xmls')){
    mkdir('../xmls');
}
$xmlRuta = "../";
$xmlArchivo="xmls/reporte.xml";
$xmlDestino = $xmlRuta.$xmlArchivo;
$xml->formatOut=true;
$string_xml=$xml->saveXML();

if($xml->save($xmlDestino)){
    echo"<a href='$xmlArchivo'target='_blank'><img src='./images/xml.png' width='100px'></a>";
}
//

//crear PDF  
/* proceso si se requiere un template
$template=file_get_contents("templates/reporte.html");

$diccionario=array(
    '**nombre**'=>$_POST['nombre'],
    '**cedula**'=>$_POST['cedula'],
    '**email**'=>$_POST['correo'],
    '**fono**'=>$_POST['celular'],
    '**h1**'=>$_POST['h1'],
    '**h2**'=>$_POST['h2'],
    '**h3**'=>$_POST['h3'],
);
foreach($diccionario as $clave=>$valor){
    $template=str_replace($clave, $valor, $template);
}
*/
require_once("../html2pdf/html2pdf.class.php");
$pdf=new HTML2PDF();
$pdf->setDefaultFont('Arial');
$pdf->writeHTML($tabla);

if(!file_exists('pdfs')){
    mkdir('pdfs');
}
$path="./pdfs/reporte.pdf";
$pdf->Output($path,'F');

echo"<a href='#' id='GenerarTabla'><img src='./images/pdf.png' width='100px'></a>"; 
?>