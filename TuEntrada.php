<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");

      //apartado del post para obtener informacion de cada documento
      $desc=$_POST['desc'];
      $ido=$_POST['id_o'];
      $point=$_POST['point'];

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
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="background-color:white;">


<?php
  //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
      //$user & $pass
 //-------------------------------------------------
   $sql="SELECT * from user_upb where correo='{$user}' and contrasena='{$pass}';";
  $respuesta=query($sql);

 foreach ($respuesta as $fila) {
   // code...
  $usuario="{$fila['correo']}";
  $contrasena="{$fila['contrasena']}";
  $id_log="{$fila['id_user']}";
 }

//controlador de error
 if(empty($usuario)&&empty($contrasena)){
  ECHO "<CENTER style=\"margin-top: 20px\"><h1> Usuario no encontrado: <br><a href=\"popup.php\"> volver atrás </a> </h1></CENTER>";
  exit();
 }
 
 $sql="SELECT uu.id_user as oop,du.descripcion_doc,du.estado_doc,du.titulo_doc,du.fecha_e,uu.correo as u1,uu2.correo as u2 from documentos_upb as du, travel_doc as td, user_upb as uu, user_upb as uu2 Where td.usuario_destino=$id_log and td.documento=du.id_doc and td.usuario_responsable=uu.id_user and td.usuario_remitente=uu2.id_user ORDER by td.documento DESC;";
 $respuesta=query($sql);
  //INICIO DE LA TABLA :D
      echo "<table class=\"table table-dark\"
      style=\"border: 1px solid #FDFEFE\">";
        echo "<tr style=\"text-align: center;\">";
        echo "<th style=\"border-right: 1px solid #FDFEFE\"> Estado </th>";
        echo "<th style=\"border-right: 1px solid #FDFEFE\"> T&iacute;tulo </th>";
        echo "<th style=\"border-right: 1px solid #FDFEFE\"> Fecha de Envio </th>";
        echo "<th style=\"border-right: 1px solid #FDFEFE\"> Responsable </th>";
        echo "<th style=\"border-right: 1px solid #FDFEFE\"> Remitente </th>";
        echo "<th style=\"border-right: 1px solid #FDFEFE\">  </th>";
        echo "</tr>";

      
        foreach ($respuesta as $fila) {
      
          // code...
        echo "<tr style=\"text-align: center; \">";
        echo "<td style=\"border-right: 1px solid #FDFEFE\">{$fila['estado_doc']} </td>";
        echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";
       
        echo "{$fila['titulo_doc']}
        </td>";

      
        echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha_e']} </td>";
        echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u1']} </td>";
        echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u2']} </td>";

        ECHO "<form action=\"#\" method=\"post\">";
          $descripcion="{$fila['descripcion_doc']}";
          $id_origen="{$fila['oop']}";
          echo"<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
          echo"<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
          echo"<input name=\"point\" type=\"hidden\" value=\"10\">";
        echo "<td style=\"border-right: 1px solid #FDFEFE\">";
          echo "<input type=\"submit\" value=\"+\">";
        echo "</td>";
         echo "</form>";
        echo "</tr>";
     
      }
      
      echo "</table>";


?>
<!-- Apartado principal -->
  <div class="col" style="  width: 75px;height: 110px; color: black; font-size: 24px; border-right: 1px solid #000;"> 
    <h3><a href="indexPdf.php"> Volver al men&uacute; principal </a></h3>

<!-- Fin del apartado principal -->
    
<!-- FIN CONTAINER 2 -->
  </div>
</div>

<?php   
 include("pruebota.php");

      if(!empty($point)){
?>
      <script type="text/javascript">
     window.onload = abrir();
   </script>
<?php
      } 
 
//CIERRE PAGINA
echo "<div class=\"text-final\">";
     include("include/footer.php");
echo "</div>";
//CIERRE DATOS EXTRAS   
include("include/dbclose.phpinc");

?>


