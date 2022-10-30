<?php 
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/header.php");
?>

<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <a href="documentos.php?campus=Cochabamba">
        <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-cbba-565x580.jpg" style="width: 500px; height:230px; margin-top:60px">
      </a>
    </div>
    <div class="col">
      <a href="documentos.php?campus=La Paz"> <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-lapaz-565x580.jpg" style="width: 500px; height:230px; margin-top:60px;">
    </div>
    <div class="col">
      <a href="documentos.php?campus=Santa Cruz"> <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-santa-cruz-4.jpg" style="width: 500px; height:230px; margin-top:30px">
    </div>
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