<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");

$var1=$_REQUEST['sent'];
//ID_TRAVEL y ID_DOC
$var=explode("-",$var1);
$travel=$var[0];
$doc=$var[1];
?>

<!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 100px">
     <center> <h2>TICKET ID : <?php echo $travel;?> </h2> </center>
     <?php 
     //controlador
     $c=$_POST['ac'];
     if($c==0){
     ?>
     <br><br><br>    
     <!-- aceptar ticket form-->
     <form action="#" method="post">
          <input type="hidden" name="ac" value="1">
          <input type="submit" name="envio" value="Aceptar Ticket" style="width: 200px; height: 100px; font-size: 25px; ">
     </form>
  
     <!-- devolver ticket form -->
    
     <form action="#" method="post">
          <input type="hidden" name="ac" value="2">
          <input type="submit" name="envio" value="Devolver Ticket" style="width: 200px; height: 100px; font-size: 25px; "> 
     </form>
     <?php
     }
     else if($c==1){
          $sql="UPDATE documentos_upb set estado_doc='recibido' where id_doc=$doc;";
          query($sql);
          echo "Tikect $travel RECIBIDO";
     }
     else if($c==2){
           $sql="UPDATE documentos_upb set estado_doc='devuelto' where id_doc=$doc;";
          query($sql);
          echo "Tikect $travel en estado de devolución";
     }
     ?>
<!-- FIN CONTAINER 2 -->
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