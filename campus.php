<?php 
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/header.php");
?>

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
    <a href="documentos.php?campus=Cochabamba">
      <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-cbba-565x580.jpg" class="card-img-top">
      </a>
      <div class="card-body">
        <h5 class="card-title">Cochabamba</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <a href="documentos.php?campus=La Paz">
      <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-lapaz-565x580.jpg" class="card-img-top" alt="...">
      </a>

      <div class="card-body">
        <h5 class="card-title">La Paz</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <a href="documentos.php?campus=SantaCruz"> 
      <img src="https://www.upb.edu/sites/default/files/bloque-ciudades/campus-santa-cruz-4.jpg" class="card-img-top" alt="...">
      </a>

      <div class="card-body">
        <h5 class="card-title">Santa Cruz</h5>
      </div>
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