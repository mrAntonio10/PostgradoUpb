<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");
//script
include("libreria/script/geoloc.php");

$var1=$_REQUEST['sent'];
//ID_TRAVEL y ID_DOC
$var=explode("-",$var1);
$travel=$var[0];
$doc=$var[1];

     //verificar si establecimos conexion
     if(empty($user)){
           echo " <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=popup.php\">";
     }
else{
  
?>
<!--  BODY  -->
    <body onload="geoloc();">

<!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 100px">
     <center> <h2>TICKET ID : <?php echo $travel;?> </h2> </center>
     <?php 
     //controlador
     $c=$_POST['ac'];
     $geo=$_POST['geo'];
               //SQL PARA ENVIAR CORREO
          $sql="SELECT t.id_travel as travel, r.Nombre_completo as remitente,res.correo as c1,o.Nombre_completo as responsable,o.correo as c2,res.Nombre_completo as emisor ,doc.titulo_doc as titulo,doc.descripcion_doc as descripcion,doc.estado_doc as estado from travel_doc as t,user_upb as r,user_upb as o, user_upb as res,documentos_upb as doc  where t.id_travel=$travel and r.id_user=t.usuario_remitente and o.id_user=t.usuario_destino and res.id_user=t.usuario_responsable and doc.id_doc=t.documento;";
     $respuesta=query($sql);
          foreach ($respuesta as $fila) {
          $TRAVEL="{$fila['travel']}";
          $titulo="{$fila['titulo']}";
          $emisor="{$fila['remitente']}";
          $remitente="{$fila['responsable']}";
          $responsable="{$fila['emisor']}";
          $descripcion="{$fila['descripcion']}";
          $estado="{$fila['estado']}";
          $correo="{$fila['c1']}";
          $correo2="{$fila['c2']}";
          }
     //fin del mensaje
     if($c==0){
     ?>
     <br><br><br>    
     <!-- aceptar ticket form-->
     <form action="#" method="post" name="form_reloj">
          <input type="hidden" name="ac" value="1">
        <textarea name="acep" style="height: 100px; width: 300px; margin-top: 8px;" maxlength="100">  </textarea><br>
          <br>      
          <input type="submit" name="envio" value="Aceptar Ticket" style="width: 200px; height: 100px; font-size: 25px; ">
     </form>
  
     <!-- devolver ticket form -->
    
     <form action="#" method="post" name="form_reloj2">
          <input type="hidden" name="ac" value="2">
          <textarea name="dev" style="height: 100px; width: 300px; margin-top: 8px;" maxlength="100">  </textarea><br>
          <br>      
          <input type="submit" name="envio" value="Devolver Ticket" style="width: 200px; height: 100px; font-size: 25px; "> 
     </form>
     <?php
     }
     else if($c==1){
          $mensaje=$_POST['acep'];
          $sql="UPDATE documentos_upb set estado_doc='recibido' where id_doc=$doc;";
          query($sql);
          echo "Tikect $travel RECIBIDO";         
           $a= "<BR>Travel: $TRAVEL<br>TITULO: $titulo<br>REMITENTE $remitente<br>RESPONSABLE $responsable<br>EMISOR $emisor<br>DESCRIPCION $descripcion<br>ESTADO $estado<br>C1 $correo<br>C2 $correo2<br>Mensaje Check out: $mensaje";
           include("mailconc.php");
     }
     else if($c==2){
          $mensaje=$_POST['dev'];
           $sql="UPDATE documentos_upb set estado_doc='devuelto' where id_doc=$doc;";
          query($sql);
          echo "Tikect $travel en estado de devolución";
           $a= "<BR>Travel: $TRAVEL<br>TITULO: $titulo<br>REMITENTE $remitente<br>RESPONSABLE $responsable<br>EMISOR $emisor<br>DESCRIPCION $descripcion<br>ESTADO $estado<br>C1 $correo<br>C2 $correo2<br>Mensaje Check out: $mensaje";
                    include_once("mailconc.php");
     }
     ?>
<!-- FIN CONTAINER 2 -->
  </div>
</div>
</body>

<?php


}
//CIERRE PAGINA
echo "<div class=\"text-final\">";
     include("include/footer.php");
echo "</div>";
//CIERRE DATOS EXTRAS   
include("include/dbclose.phpinc");

?>