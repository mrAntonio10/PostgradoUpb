<?php 
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/header.php");
?>

  <!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row align-items-center" style="background-color:white;">


<!-- Cochabamba -->
<div class="col" style="border-right: 1px solid #000; border-bottom: 1px solid #000;">
 <a href="documentos.php?campus=Cochabamba"> <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-cbba-565x580.jpg" style="width: 500px; height:230px; margin-top:60px"></a>
  <br><br>
</div>
<!-- La Paz -->
<div class="col" style="border-bottom: 1px solid #000;">
 <a href="documentos.php?campus=La Paz"> <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-lapaz-565x580.jpg" style="width: 500px; height:230px; margin-top:60px;">
 </a>
</div>
<!-- Santa Cruz-->
<div class="col" style="border-right: 1px solid #000;">
 <a href="documentos.php?campus=Santa Cruz"> <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-santa-cruz-4.jpg" style="width: 500px; height:230px; margin-top:30px">
</a>
</div>

    
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