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


ECHO "MOSTRAR ESTA CAGADA:";
echo "$titulo ";
$sql="INSERT INTO documentos_upb(titulo_doc,fecha_e,descripcion_doc,estado_doc) VALUES ('{$titulo}','{$fecha_e}','{$descripcion}','ESPERA');";
query($sql);

//USUARIOS
$emisor=$_POST['emisor'];
$remitente=$_POST['remitente'];
$responsable=$_POST['responsable'];

echo "$emisor $remitente $responsable";

//doc user
$sql="SELECT id_doc FROM documentos_upb WHERE titulo_doc='{$titulo}' and fecha_e='{$fecha_e}';";
$respuesta=query($sql);
	foreach ($respuesta as $fila) {
		// code...
		$id_doc="{$fila['id_doc']}";
	}

$sql="INSERT INTO travel_doc (usuario_remitente, usuario_destino, usuario_responsable, documento) Values ($emisor,$remitente,$responsable,$id_doc);";
query($sql);
?>
   <!-- CONTAINER1 -->
<div class="container-fluid" style="background-color: #083388; ">
  <div class="row" style="height:18%;width: 100%; color: white; margin-left: 0.2%;">
    <h2 style="margin-top: 1%;">
    UPB POSTGRADO
    </h2>
    <div style="color: white; margin-left: 0.2%; font-size: 20px;">
     Campus Santa Cruz
    </div>
  </div>
</div>


  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 50px; font-size: 25px">
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
