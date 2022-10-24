<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");


?>

  
  <!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 200px">


<?php
//controlador de error
 if(empty($usuario)&&empty($contrasena)){
  ECHO "<CENTER style=\"margin-top: 20px\"><h2> Usuario no encontrado: Por favor ingrese los datos correctos <br><a href=\"popup.php\"> volver atrás </a> </h2></CENTER>";
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

    <form action="campus.php" method="post">
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


