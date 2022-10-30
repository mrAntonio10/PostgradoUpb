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
<body style="background-color:#030428;">

<?php

//Condicional IF-ELSE para LOG IN 
if ($fijo != 1) {

  echo "<form action=\"#\" method=\"post\">";

  echo "<div class=\"container text-center\" style= \"margin-top:170px\"; >" ;
  echo "<div class=\"col-md-4 offset-md-4\">";

  echo "<div class=\"card\" style=\"max-width: 50rem;\">";

  echo "<div class=\"card-header\" style=\"font-size: 30px; font-weight: bold;\">";
  echo "<img src=\"https://upload.wikimedia.org/wikipedia/commons/1/1f/Logo_UPB.jpg\" alt=\"Logo\" width=\"35\" height=\"35\" class=\"d-inline-block align-text-rigth\">";
  echo "upbdocs";

  echo "</div>";

  echo "<div class=\"card-body\">";
  echo "<div class=\"row my-2\">";
  echo "<input placeholder=\"Email institucional\"  name=\"USER\" required style=\"text-align:\">"; 
  echo "</div>";

  echo "<div class=\"row my-2\">";

  echo "<input type=\"password\" placeholder=\"Contraseña\"  name=\"PASS\" required style=\"text-align:\" >";

  echo "</div>";
  echo "</div>";


  echo "<div class=\"card-footer bg-transparent\">";
  echo "<div class=\"row my-2\">";
  echo "<input type=\"hidden\" name=\"fijo\" value=\"1\">";
  echo "<input type=\"submit\"  class=\"btn \" name=\"accion\" value=\"Log in\" style=\"background-color: #E8B82B\"> ";
  echo "</div>";
  echo "</div>";



  echo "</div>";


  echo "</div>";
  echo "</div>";




  echo "</form>";

} else {
  echo " <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=IndexPdf.php\">";
}

?>
</body>

