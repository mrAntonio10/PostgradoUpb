<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");


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
  <div class="row" style="background-color:white; margin-top: 200px">


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
  ECHO "<CENTER style=\"margin-top: 20px\"><h1> Usuario no encontrado: <br><a href=\"popup.php\"> volver atrás </a> </h1></CENTER>";
  exit();
 }

?>
<!-- Apartado principal -->
  <div class="col" style="  width: 75px;height: 110px; color: white; font-size: 40px; border-right: 1px solid #000;"> 
    <!-- form 1 -->
    <form action="TuEntrada.php" method="post">
         <input type="submit" value="Bandeja de Entrada" width="100" height="60">      
    </form>
    <!-- Fin form 1 -->
  </div>
  

  <!-- form 2 -->
  <div class="col" style="  width: 75px;height: 110px; color: white;  font-size: 40px;"> 

    <form action="documentos.php" method="post">
      <input type="submit" value="Enviar documento">
    </form>
  <!-- Fin form 2 -->
  </div>

<!-- Fin del apartado principal -->
    
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


