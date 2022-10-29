<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
include("include/header.php");

//scripts
include("libreria/script/reloj.php");
include("libreria/script/geoloc.php");
//PAGINA
?>
  <?php
//HEADER
echo "<html>";
 echo "<head><title>.:Postgrado SCZ:.</title>";
 ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



<!--  BODY  -->
    <body onload="geoloc();mueveReloj();">





  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 50px; font-size: 25px">


<?php




  //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
      //$user & $pass
 //-------------------------------------------------
   $sql="SELECT correo,contrasena from user_upb where correo='$user' and contrasena='$pass';";
  $respuesta=query($sql);

 foreach ($respuesta as $fila) {
   // code...
  $usuario="{$fila['correo']}";
  $contrasena="{$fila['contrasena']}";
 }

//controlador de error
 if(empty($usuario)&&empty($contrasena)){
  ECHO "<CENTER style=\"margin-top: 200px\"><h1> Usuario no encontrado: <br><a href=\"popup.php\"> volver atrás </a> </h1></CENTER>";
 }
 //FECHA Y HORA (boliviana) EN LA CUAL SE INGRESÓ AL LLENADO DE FORMULARIO
 date_default_timezone_set('America/La_Paz');
 $fecha=date('Y-m-d', time());
?>
  <!-- BLOQUE1 -->
    <div class="col" style=" border: 3px solid #000; border-right: 0px; margin-left: 22%;"> 
      <div style="margin-left: 28%; margin-top: 5px">  
        Concepto:<br>
        Fecha de Envio: <br>
        Hora de Envio: <br>
        Responsable: <br>
        Remitente: <br>
        Receptor: <br>
        Documento: <br>
        Descripci&oacute;n
        
        <br><br>
      <!-- Fin BLOQUE 1 -->
      </DIV>
    </div>
  

   <!-- BLOQUE2 -->
    <div class="col" style="margin-right: 25%; border: 3px solid #000; border-left: 0px;"> 
      <div style="margin-left: 40px; font-size: 16px;">
        <form action="db.php" method="post" name="form_reloj">
          <input type="text" name="titulo" style=" margin-top: 10px;"> <br>
          <?php
          echo "<input type=\"text\" name=\"fecha\" readonly style=\"margin-top: 8px;\" value=\"$fecha\"> <br>";
          echo "<input type=\"text\" name=\"reloj\" size=\"10\" readonly style=\"margin-top: 8px;\"> <br>";

             //SQL DE RESPONSABLE  --emisor
          $sql=" SELECT Nombre_completo,campus_upb.campus as cu from user_upb,user_campus,campus_upb where correo='$user' and user_upb.id_user=user_campus.usuario and user_campus.campus=campus_upb.id_campus;";
          $respuesta=query($sql);
          foreach($respuesta as $fila){
            $nombreC=$fila['Nombre_completo'];
            $campus=$fila['cu'];
          }
          echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$nombreC\"> <br>";

           //sql de REMITENTE --responsable
            $sql="SELECT id_user,Nombre_completo from user_upb,campus_upb,user_campus where campus_upb.campus='$campus' and campus_upb.id_campus=user_campus.campus and user_upb.id_user=user_campus.usuario;";
          $respuesta=query($sql);

           echo "<select name=\"responsable\" style=\" margin-top: 8px;\"> <br>";
            foreach ($respuesta as $fila) {
                    $id_user=$fila['id_user'];
                    $nombre=$fila['Nombre_completo'];
                    echo"<option value=\"$id_user\">";
                    echo "$nombre";
                    echo "</option>";
                  }
          echo "</select><br>";
            //SQL DE RECEPTOR --remitente 
          $campus=$_REQUEST['campus'];
          $sql="SELECT id_user,Nombre_completo from user_upb,campus_upb,user_campus where campus_upb.campus='$campus' and campus_upb.id_campus=user_campus.campus and user_upb.id_user=user_campus.usuario;";
          $respuesta=query($sql);
                  echo "<select name=\"remitente\" style=\" margin-top: 8px;\"> ";
                  foreach ($respuesta as $fila) {
                    $id_user=$fila['id_user'];
                    $nombre=$fila['Nombre_completo'];
                    echo"<option value=\"$id_user\">";
                    echo "$nombre";
                    echo "</option>";
                  }
          echo"</select><br>";
           
           ?>
          <input type="file" name="file"  accept="image/png,image/jpeg,application/pdf" style=" margin-top: 8px;"> <br>
          <textarea name="desc" style="height: 100px; width: 300px; margin-top: 8px;" maxlength="200">  </textarea><br><br>
          <input type="hidden" name="geo"> 
          <input type="submit" value="Crear Ticket" style="font-size: 25px;">

        </form>
      </div>
    <!-- Fin BLOQUE 2 -->
    </div>

    
<!-- Fin del apartado principal -->
  </div>
</div>
</div></body>

<?php
//CIERRE PAGINA
echo "<div class=\"text-final\">";
     include("include/footer.php");
echo "</div>";
//CIERRE DATOS EXTRAS   
include("include/dbclose.phpinc");

?>

