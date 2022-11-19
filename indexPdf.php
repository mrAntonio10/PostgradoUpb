<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");
?>

<?php
//controlador de error
if (empty($usuario) && empty($contrasena)) {
  echo "<CENTER style=\"margin-top: 20px\"><h2> Usuario no encontrado: Por favor ingrese los datos correctos <br><a href=\"popup.php\"> volver atrás </a> </h2></CENTER>";
  exit();
}
?>
<nav class="navbar navbar-expand-lg" style="background-color:  #FAFBFB;">
  <div class=" container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto mb-2 mb-lg-0">
        <a type="button" class="btn btn-warning" href="campus.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 20 20">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
          </svg>
          Enviar Documento
        </a>
      </div>
    </div>
</nav>

<div class="row">
  <div class="col-6" style="font-size: 30px; font-weight: bold;">
    Bandeja de entrada

    <?php
    //apartado del post para obtener informacion de cada documento
    $desc = $_POST['desc'];
    $ido = $_POST['id_o'];
    $point = $_POST['point'];
    ?>
    <?php
    //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
    //$user & $pass
    //-------------------------------------------------
    $sql = "SELECT * from user_upb where correo='{$user}' and contrasena='{$pass}';";
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

    $sql = "SELECT uu.id_user as oop,du.descripcion_doc,du.estado_doc,du.titulo_doc,du.fecha_e,uu.Nombre_completo as u1,uu2.Nombre_completo as u2 from documentos_upb as du, travel_doc as td, user_upb as uu, user_upb as uu2 Where td.usuario_destino=$id_log and td.documento=du.id_doc and td.usuario_responsable=uu.id_user and td.usuario_remitente=uu2.id_user ORDER by td.documento DESC;";
    $respuesta = query($sql);
    //INICIO DE LA TABLA :D

    echo "<table class=\"table table-dark\"
      style=\"border: 1px solid #FDFEFE\">";
    echo "<tr style=\"text-align: center;\">";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Estado </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> T&iacute;tulo </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Fecha de Envio </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Responsable </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Remitente </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\">  </th>";
    echo "</tr>";


    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">{$fila['estado_doc']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";

      echo "{$fila['titulo_doc']}
        </td>";


      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha_e']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u1']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u2']} </td>";

      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" value=\"+\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }

    echo "</table>";


    ?>

    <?php
    include("pruebota.php");

    if (!empty($point)) {
    ?>
      <script type="text/javascript">
        window.onload = abrir();
      </script>
    <?php
    }

    ?>

  </div>
  <div class="col-6" style="font-size: 30px; font-weight: bold;">
    Bandeja de salida
    <?php
    //apartado del post para obtener informacion de cada documento
    $desc = $_POST['desc'];
    $ido = $_POST['id_o'];
    $point = $_POST['point'];
    ?>
    <?php
    //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
    //Cookies obtenidas gracias al include/conf.phpinc
    //$user & $pass
    //-------------------------------------------------
    $sql = "SELECT * from user_upb where correo='{$user}' and contrasena='{$pass}';";
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

    $sql = "SELECT uu.id_user as oop,du.descripcion_doc,du.estado_doc,du.titulo_doc,du.fecha_e,uu.Nombre_completo as u1,uu2.Nombre_completo as u2 from documentos_upb as du, travel_doc as td, user_upb as uu, user_upb as uu2 Where td.usuario_remitente=$id_log and td.documento=du.id_doc and td.usuario_destino=uu.id_user and td.usuario_remitente=uu2.id_user ORDER by td.documento DESC;";
    $respuesta = query($sql);
    //INICIO DE LA TABLA :D

    echo "<table class=\"table table-dark\"
      style=\"border: 1px solid #FDFEFE\">";
    echo "<tr style=\"text-align: center;\">";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> T&iacute;tulo </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Fecha de Envio </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Receptor </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\">  </th>";
    echo "</tr>";


    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";

      echo "{$fila['titulo_doc']}
        </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha_e']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u1']} </td>";

      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" value=\"+\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }

    echo "</table>";
    ?>
    <?php
    include("pruebota.php");
    if (!empty($point)) {
    ?>
      <script type="text/javascript">
        window.onload = abrir();
      </script>
    <?php
    }
    ?>

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