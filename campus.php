<?php 
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");
?>



  <!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="background-color:white;">


<center> <h2>CAMPUS</h2>  </center>
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
<!-- Apartado principal -->
  <div class="col" style="margin-top: 100px; width: 75px;height: 110px; color: black; font-size: 24px;"> <br>
    <h3><a href="indexPdf.php"> Volver al men&uacute; principal </a></h3>
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