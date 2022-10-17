<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
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
    <body onload="mueveReloj()">
<!-- script para tener en cuenta la hora ACTUAL en la que se envió el Doc-->
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = (momentoActual.getMinutes()<10?'0':'')+momentoActual.getMinutes()
    segundo = (momentoActual.getSeconds()<10?'0':'')+momentoActual.getSeconds()
    horaImprimible = hora+":"+minuto+":"+segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>


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
      <div style="margin-left: 38%; margin-top: 5px">  
        Concepto:<br>
        Fecha de Envio: <br>
        Hora de Envio: <br>
        Remitente: <br>
        Receptor: <br>
        Responsable: <br>
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
           //sql de REMITENTE
             $sql="SELECT id_user,correo,Nombre_completo FROM user_upb;";
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
            //SQL DE RECEPTOR
                  echo "<select name=\"remitente\" style=\" margin-top: 8px;\"> ";
                  foreach ($respuesta as $fila) {
                    $id_user=$fila['id_user'];
                    $nombre=$fila['Nombre_completo'];
                    echo"<option value=\"$id_user\">";
                    echo "$nombre";
                    echo "</option>";
                  }
          echo"</select><br>";
            //SQL DE RESPONSABLE 
          $sql="SELECT Nombre_completo from user_upb where correo='{$user}';";
          $respuesta=query($sql);
          foreach($respuesta as $fila){
            $nombreC=$fila['Nombre_completo'];
          }
          echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$nombreC\"> <br>";
           ?>
          <input type="file" name="file"  accept="image/png,image/jpeg,application/pdf" style=" margin-top: 8px;"> <br>
          <textarea name="desc" style="height: 100px; width: 300px; margin-top: 8px;" maxlength="200">  </textarea><br><br>
          <input type="submit" value="Enviar" style="font-size: 25px;">
        </form>
      </div>
    <!-- Fin BLOQUE 2 -->
    </div>

    
    <center><h3><a href="indexPdf.php"> Volver al men&uacute; principal </a></h3></center>
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

