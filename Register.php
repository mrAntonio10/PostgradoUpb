<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
include_once("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
$default_style = "style_form";
 
//TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
    //$user & $pass
    //-------------------------------------------------
    $sql = "SELECT * from user_upb where correo='{$user}' and contrasena='{$pass}' and Nombre_completo='admin';";
    $respuesta = query($sql);

    foreach ($respuesta as $fila) {
      // code...
      $usuario = "{$fila['correo']}";
      $contrasena = "{$fila['contrasena']}";
      $id_log = "{$fila['id_user']}";
    }

    //controlador de error
    if (empty($usuario) && empty($contrasena)) {
      echo "<CENTER style=\"margin-top: 20px\"><h1> Usuario no encontrado: <br><a href=\"popup.php\"> volver atrás </a> </h1></CENTER>";
      exit();
    }


 //valores
  $nombre=$_POST['USER'];
  $correo=$_POST['correo'];
  $pass=$_POST['PASS'];
  $ciudad=$_POST['ciudad'];
  $fijo=$_POST['fijo'];

?>
<body class="d-flex justify-content-center align-items-center vh-100"  style="background-color:#030428;">

<?php
//Condicional IF-ELSE para LOG IN 
if ($fijo != 1) {

  echo "<form action=\"#\" method=\"post\">";
 
  echo "<div class=\"bg-white p-5 rounded-5 text-secondary shadow\" style=\"width: 25rem;\">";

  echo "<div class=\"d-flex justify-content-center\";>";
  echo "<img src=\"https://upload.wikimedia.org/wikipedia/commons/1/1f/Logo_UPB.jpg\" alt=\"login-icon\" style= \"height: 7rem\"; >";
  echo "</div>";

  echo "<div class=\"text-center fs-1 fw-bold\";>";
  echo "upb registros";
  echo "</div>";

  echo "<div class=\"input-group mt-4\";>";
  echo "<input  class=\"form-control bg-light\" placeholder=\"Nombre\"  name=\"USER\" required style=\"text-align:\" >"; 
  echo "</div>";

  echo "<div class=\"input-group mt-1\";>";
  echo "<input  class=\"form-control bg-light\" type=\"email\" placeholder=\"Correo\"  name=\"correo\" required style=\"text-align:\" >"; 
  echo "</div>";

  echo "<div class=\"input-group mt-1\";>";
  echo "<input class=\"form-control bg-light\" type=\"password\" placeholder=\"Contraseña\"  name=\"PASS\" required style=\"text-align:\" >";
  echo "</div>";

  echo "<center>";
  echo "Santa Cruz<br> <input type=\"radio\" name=\"ciudad\" required style=\"text-align:\" value=\"1\">"; echo "<br>"; 
  echo "Cochabamba <br> <input type=\"radio\" name=\"ciudad\" required style=\"text-align:\" value=\"2\">"; echo "<br>"; 
  echo "La Paz <br> <input type=\"radio\" name=\"ciudad\" required style=\"text-align:\" value=\"3\">"; echo "<br>"; 
  echo "</center>";

  echo "<div class=\"btn btn-warning w-100 mt-4 fw-bold shadow\";>";
  echo "<input type=\"hidden\" name=\"fijo\" value=\"1\">";
  echo "<input type=\"submit\"  class=\"btn d-grid gap-2 col-12 mx-auto\" name=\"accion\" value=\"Registrar\" > ";
  echo "</div>";

  echo "</div>";  

  echo "</form>";

} else {
//INSERT de usuario
  $sql="INSERT into user_upb (Nombre_completo,correo,contrasena) VALUES ('$nombre','$correo','$pass');";
  query($sql);
//Obtener id del insert
  $sql="SELECT id_user from user_upb WHERE correo='$correo';";
  $respuesta=query($sql);
  foreach ($respuesta as $fila) {
    // code...
    $id=$fila['id_user'];
  }
//Insert usuario campus
  $sql="INSERT into user_campus VALUES ($id,$ciudad);";
  query($sql);
  echo " <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=popup.php\">";
}

?>
</body>