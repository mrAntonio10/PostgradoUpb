<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
 





//DOC variables
$titulo=$_POST['titulo'];
$fecha=$_POST['fecha'];
$reloj=$_POST['reloj'];
$descripcion=$_POST['desc'];
$fecha_e="$fecha $reloj";

//para almacenar en la base de datos
$date = date_create($fecha_e);
$date=date_format($date, 'Y-m-d H:i:s');

//geo
$geo=$_POST['geo'];

//USUARIOS
$emisor=$_POST['emisor'];
$remitente=$_POST['remitente'];
$responsable=$_POST['responsable'];





//doc user
$sql="SELECT id_doc,estado_doc FROM documentos_upb WHERE titulo_doc='{$titulo}' and fecha_e='{$date}';";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$id_doc="{$fila['id_doc']}";
    $estado="{$fila['estado_doc']}";
  }



$sql="SELECT id_travel from travel_doc where documento=$id_doc;";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$TRAVEL="{$fila['id_travel']}";
  }


ob_start();
?>
<html>
	<head> <title> QR - Postgrado</title></head>
<body>

  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 40%;  border: 1px solid #000;">
  <div class="row" style="background-color:white;font-size: 15px">


     <!-- BLOQUE1 -->
 <H3><center> <?php echo "Correspondencia UPB <img style=\"position: absolute;margin-left:15%\"src=\"libreria/logo.png\" width=\"40\" height=\"40\"><br>Tiket# $TRAVEL";?> </center></H3>
      	<form style="margin-left: 50px;">
         
        Concepto: <input type="text" <?php echo"value=\"$titulo\"";?> readonly name="titulo" style=" margin-top: 10px; margin-left: 74px;"><br> <br>
        Fecha de Envio: <?php 
        echo "<input type=\"text\" value=\"$fecha\" readonly name=\"fecha\" readonly style=\"margin-top: 8px; margin-left:38px\"> <br>"; ?><br>
        Hora de Envio: <?php   echo "<input type=\"text\" value=\"$reloj\" name=\"reloj\" size=\"10\" readonly style=\"margin-top: 8px; margin-left:40px\"> <br>";?> <br>
        Responsable: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;margin-left:54px\" value=\"$emisor\"> <br>";
?><br>
        Remitente: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;margin-left:65px\" value=\"$remitente\"> <br>";
?><br>
        Receptor: <?php  echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;margin-left:74px\" value=\"$responsable\"> <br>";
?><br>
       <a style="margin-left: 100px"> Descripci&oacute;n:</a> <br><?php  echo" <textarea readonly name=\"desc\" style=\"height: 100px; width: 300px; margin-top: 8px;margin-left:2px\" maxlength=\"200\"> $descripcion </textarea>"; 
        ?>
  <!-- QR -->
  <?php
  require_once("libreria/phpqrcode/qrlib.php");
  QRcode::png("http://192.168.35.213/PostgradoUpb/qr.php?sent=$TRAVEL-$id_doc","test.png");

  //mail
  // Enviarlo   $responsable
  $sql="SELECT correo FROM user_upb WHERE Nombre_completo='{$responsable}';";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    $correo="{$fila['correo']}";
  }
  ?>
  <br>
       <img src="test.png" width="150" height="150" style="margin-left:25%">
    
        </div>
        </form>
       


<!-- Fin del apartado principal -->
  </div>
</div>



</body>
</html>

<?php

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
// PARA EN VIAR EL CORREO :D
//include_once("mailconc.php");
?>

