<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");





//DOC
$titulo=$_POST['titulo'];
$fecha=$_POST['fecha'];
$reloj=$_POST['reloj'];
$descripcion=$_POST['desc'];
$fecha_e="$fecha $reloj";


//USUARIOS
$emisor=$_POST['emisor'];
$remitente=$_POST['remitente'];
$responsable=$_POST['responsable'];




//doc user
$sql="SELECT id_doc FROM documentos_upb WHERE titulo_doc='{$titulo}' and fecha_e='{$fecha_e}';";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$id_doc="{$fila['id_doc']}";
  }



$sql="SELECT id_travel from travel_doc where documento=$id_doc;";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$TRAVEL="{$fila['id_travel']}";
  }


//ob_start();
?>
<html>
	<head> <title> QR - Postgrado</title></head>
<body>

  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 100%; text-align:center;">
  <div class="row" style="background-color:white; margin-top: 50px; font-size: 15px">

<center>
     <!-- BLOQUE1 -->
     
      	<form>
        Concepto: <input type="text" <?php echo"value=\"$titulo\"";?> readonly name="titulo" style=" margin-top: 10px;"><br> <br>
        Fecha de Envio: <?php  echo "<input type=\"text\" value=\"$fecha\" readonly name=\"fecha\" readonly style=\"margin-top: 8px;\" value=\"$fecha\"> <br>"; ?><br><br>
        Hora de Envio: <?php   echo "<input type=\"text\" value=\"$reloj\" name=\"reloj\" size=\"10\" readonly style=\"margin-top: 8px;\"> <br>";?> <br><br>
        Responsable: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$emisor\"> <br>";
?><br><br>
        Remitente: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$remitente\"> <br>";
?><br><br>
        Receptor: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$responsable\"> <br>";
?><br><br>
        Descripci&oacute;n: <?php  echo" <textarea readonly name=\"desc\" style=\"height: 100px; width: 300px; margin-top: 8px;\" maxlength=\"200\"> $descripcion </textarea>"; ?>
  <!-- QR -->
        <div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->

  <?php
  /*Método que envia datos en la URL del qr
    id_travel: para mostrar que és ese el ticket
    id_doc: para identificar el documento y cambiar el estado :D
    
  */
    echo "<img alt=\"Barcode Generator TEC-IT\"
       src=\"http://barcode.tec-it.com/barcode.ashx?data=192.168.0.22/UPB_F/qr.php?sent=$TRAVEL-$id_doc&code=QRCode&eclevel=L\"/>"
  ?>
        </div>
        </form>
</center>
       


<!-- Fin del apartado principal -->
  </div>
</div>



</body>
</html>

<?php
/*
$html=ob_get_clean();
require_once 'libreria/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("$Nombres$Apellido_p".'_'."$id", array("Attachment"  => false));
*/
?>

