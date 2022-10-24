<?php
//HEADER
echo "<html>";
 echo "<head><title>.:Postgrado SCZ:.</title>";
 ?>
  <style>
 @import "style.css"
</style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!--  BODY  -->
<body>

    
<?php
  //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
      //$user & $pass
 //-------------------------------------------------
   $sql="SELECT correo,contrasena,id_user from user_upb where correo='$user' and contrasena='$pass';";
  $respuesta=query($sql);

 foreach ($respuesta as $fila) {
   // code...
  $usuario="{$fila['correo']}";
  $contrasena="{$fila['contrasena']}";

 }
?>

<!-- CONTAINER1 -->
<div class="container-fluid" style="background-color: #08239C; ">
  <div class="row" style="height:18%;width: 100%; color: white; margin-left: 0.2%;">
    <div class="col"  style="height: 110px; margin-top:5px; ">
    <h2>
    UPB POSTGRADO   </h2>   
     Campus Santa Cruz

      </div>
      <div class="col" style="margin-top:50px; text-align: right;">
        <?php
        echo "Cuenta:<img src=\"https://us.123rf.com/450wm/valentint/valentint1602/valentint160203120/52348140-icono-de-perfil-de-usuario-bot%C3%B3n-de-internet-sobre-fondo-azul-.jpg?ver=6\" width=\"40px\"> <br> $usuario";
        ?>
      </div>
   
  </div>
</div>
