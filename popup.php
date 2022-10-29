<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php
include_once("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
$default_style = "style_form";

//Cookies 
$USER = $_POST['USER'];
$PASS = $_POST['PASS'];
$fijo = $_POST['fijo'];
setcookie("USER", $USER);
setcookie("PASS", $PASS);

?>
<div style="font-size: 30px; font-weight: bold; ">
    <center> 
    <img src="https://www.upb.edu/sites/default/files/styles/nivo_slider_front_page__1920x630/public/Marca-UPB---cuadrado_0.png?itok=sPNbq0A3" width="100" height="60" style="position: absolute; margin-left: -280px; margin-top:20px">
    <img src="https://www.upb.edu/sites/default/files/styles/nivo_slider_front_page__1920x630/public/Marca-UPB---cuadrado_0.png?itok=sPNbq0A3" width="100" height="60" style="position: absolute; margin-left: 180px; margin-top: 20px;">
     <br>UPB DOCS<br>
    </center>
</div>

<section class="formulario-pantalla">
<div id="formulario-contenedor">
<h2>UPB DOCS</h2>
<?php
//Condicional IF-ELSE para LOG IN 
if ($fijo != 1) {

  echo "<form action=\"#\" method=\"post\">";
  echo "<div class=\"row my-2\">";
  echo "</h3> </b> <input placeholder=\"Email institucional\"  name=\"USER\" required style=\"text-align:\">";
  echo "</h3></b> <input type=\"password\" placeholder=\"Contraseña\"  name=\"PASS\" required style=\"text-align:\" >";
  echo "</div>";

  echo "<div class=\"row my-2\">";
  echo "<input type=\"hidden\" name=\"fijo\" value=\"1\">";
  echo "<input type=\"submit\"  class=\"btn btn-primary\" name=\"accion\" value=\"Log in\" style=\"background-color: skyblue\"> ";
  echo "</div>";

  echo "</form>";

} else {
  echo " <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=IndexPdf.php\">";
}

?>

        </div>

</section>
