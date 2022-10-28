<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
include("include/headP.php");

//scripts
include("libreria/script/reloj.php");
include("libreria/script/geoloc.php");
header("Location: ppdedompfd.php");
//PAGINA
?>





  <!-- Container2-->
<div class="container-fluid" style="background-color: white;width: 100%;">
  <div class="row" style="background-color:white; margin-top: 50px; font-size: 25px">

    
    <center><h3><a href="campus.php"> Volver a escoger el campus </a></h3></center>
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

