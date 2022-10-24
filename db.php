<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");



//DOC
$titulo=$_POST['titulo'];
$fecha=$_POST['fecha'];
$reloj=$_POST['reloj'];
$descripcion=$_POST['desc'];
$fecha_e="$fecha $reloj";


//USUARIOS
$emisor=$_POST['emisor'];
(double)$remitente=$_POST['remitente'];
(double)$responsable=$_POST['responsable'];

$sql="SELECT id_user FROM user_upb WHERE Nombre_completo='$emisor';";
$respuesta=query($sql);
foreach ($respuesta as $fila) {
  // code...
  (double)$emisor2=$fila['id_user'];
}


$sql="INSERT INTO documentos_upb(titulo_doc,fecha_e,descripcion_doc,estado_doc) VALUES ('{$titulo}','{$fecha_e}','{$descripcion}','ESPERA');";
query($sql);

//doc user
$sql="SELECT id_doc FROM documentos_upb WHERE titulo_doc='{$titulo}' and fecha_e='{$fecha_e}';";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$id_doc="{$fila['id_doc']}";
  }








$sql="INSERT INTO travel_doc (usuario_remitente,usuario_destino,usuario_responsable,documento) Values ($emisor2,$remitente,$responsable,$id_doc);";
query($sql);

$sql="SELECT id_travel from travel_doc where documento=$id_doc;";
$respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    (double)$TRAVEL="{$fila['id_travel']}";
  }
echo "TRAVEL PRUEBA AQUI $TRAVEL";
?>




  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 50px; font-size: 25px">


     <!-- BLOQUE1 -->
    <div class="col" style=" border: 3px solid #000; border-right: 0px; margin-left: 22%;"> 
      <div style="margin-left: 28%; margin-top: 54px">  
        Concepto:<br>
        Fecha de Envio: <br>
        Hora de Envio: <br>
        Responsable: <br>
        Remitente: <br>
        Receptor: <br>
        Descripci&oacute;n:
        
        <br><br>
      <!-- Fin BLOQUE 1 -->
      </DIV>
    </div>
  

   <!-- BLOQUE2 -->
    <div class="col" style="margin-right: 25%; border: 3px solid #000; border-left: 0px;"> 
      <div style="margin-left: 40px; font-size: 16px;">
        <form action="ppdedompfd.php" method="post" name="form_reloj">
          
          <?php
          echo "<h2>$id_doc</h2>";
          echo" <input type=\"text\" value=\"$titulo\" readonly name=\"titulo\" style=\" margin-top: 10px;\"> <br>";
          echo "<input type=\"text\" value=\"$fecha\" readonly name=\"fecha\" readonly style=\"margin-top: 8px;\" value=\"$fecha\"> <br>";
          echo "<input type=\"text\" value=\"$reloj\" name=\"reloj\" size=\"10\" readonly style=\"margin-top: 8px;\"> <br>";

             //SQL DE RESPONSABLE 
          $sql=" SELECT Nombre_completo from user_upb where id_user=$emisor2;";
          $respuesta=query($sql);
          foreach($respuesta as $fila){
            $nombreC=$fila['Nombre_completo'];
          }
          echo " <input type=\"text\" readonly name=\"emisor\" style=\" margin-top: 8px;\" value=\"$nombreC\"> <br>";

           //sql de REMITENTE
           $sql=" SELECT Nombre_completo from user_upb where id_user=$responsable;";
          $respuesta=query($sql);
          foreach($respuesta as $fila){
            $nombreC=$fila['Nombre_completo'];
          }

           echo "<input type=\"text\" readonly name=\"remitente\" value=\"$nombreC\" style=\" margin-top: 8px;\"> <br>";
        
            //SQL DE RECEPTOR
              $sql=" SELECT Nombre_completo from user_upb where id_user=$remitente;";
          $respuesta=query($sql);
          foreach($respuesta as $fila){
            $nombreC=$fila['Nombre_completo'];
          }
            echo "<input type=\"text\" readonly name=\"responsable\" value=\"$nombreC\" style=\" margin-top: 8px;\"> <br>";

           echo" <textarea readonly name=\"desc\" style=\"height: 100px; width: 300px; margin-top: 8px;\" maxlength=\"200\"> $descripcion </textarea>";
           ?>
         
          <br><br>
          <input type="hidden" name="c" value="1">
          <input type="submit" value="Enviar Ticket" style="font-size: 25px;">
        </form>

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

      </div>
    <!-- Fin BLOQUE 2 -->
    </div>




  		<center>
        <h2>
          Datos enviados con éxito <br>
          <a href="IndexPdf.php"> volver al inicio </a>
        </h2>
      </center>
       


<!-- Fin del apartado principal -->
  </div>
</div>
      
<?php

//CIERRE PAGINA
echo "<div class=\"text-final\">";
     include("include/footer.php");
echo "</div>";
//CIERRE DATOS EXTRAS   
include("include/dbclose.phpinc");

?>
