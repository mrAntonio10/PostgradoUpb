<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
include("include/header.php");
//scripts
include("libreria/script/reloj.php");
include("libreria/script/geoloc.php");
//PAGINA
?>
<?php
//HEADER
echo "<html>";
echo "<head><title>.:Postgrado SCZ:.</title>";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<!--  BODY  -->

<body onload="geoloc();mueveReloj();">


<div class="col-md-6 offset-md-3">

<div
      class="bg-white p-5 rounded-5 text-secondary shadow-lg d-flex justify-content-center vh-200"
      style="width: 40rem"
    >

  <?php
  //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
  //Cookies obtenidas gracias al include/conf.phpinc
  //$user & $pass
  //-------------------------------------------------
  $sql = "SELECT correo,contrasena from user_upb where correo='$user' and contrasena='$pass';";
  $respuesta = query($sql);

  foreach ($respuesta as $fila) {
    // code...
    $usuario = "{$fila['correo']}";
    $contrasena = "{$fila['contrasena']}";
  }

  //controlador de error
  if (empty($usuario) && empty($contrasena)) {
    echo "<CENTER style=\"margin-top: 200px\"><h1> Usuario no encontrado: <br><a href=\"popup.php\"> volver atrás </a> </h1></CENTER>";
  }
  //FECHA Y HORA (boliviana) EN LA CUAL SE INGRESÓ AL LLENADO DE FORMULARIO
  date_default_timezone_set('America/La_Paz');
  $fecha = date('d-m-Y', time());
  ?>

  <!-- BLOQUE2 -->
  <form action="db.php" method="post" name="form_reloj">
    Concepto
    <input type="text" name="titulo" style=" margin-top: 10px;"> <br>

    <?php
    echo "Fecha de Envio ";
    echo "<input type=\"text\" name=\"fecha\" readonly style=\"margin-top: 8px;\" value=\"$fecha\"> <br>";
    echo "Hora de Envio ";
    echo "<input type=\"text\" name=\"reloj\" size=\"10\" readonly style=\"margin-top: 8px;\"> <br>";

    echo "Responsable";
    //SQL DE RESPONSABLE  --emisor
    $sql = " SELECT Nombre_completo,campus_upb.campus as cu from user_upb,user_campus,campus_upb where correo='$user' and user_upb.id_user=user_campus.usuario and user_campus.campus=campus_upb.id_campus;";
    $respuesta = query($sql);
    foreach ($respuesta as $fila) {
      $nombreC = $fila['Nombre_completo'];
      $campus = $fila['cu'];
    }
    echo " <input type=\"text\" name=\"emisor\" readonly style=\" margin-top: 8px;\" value=\"$nombreC\"> <br>";

    echo "Remitente ";
    //sql de REMITENTE --responsable
    $sql = "SELECT id_user,Nombre_completo from user_upb,campus_upb,user_campus where campus_upb.campus='$campus' and campus_upb.id_campus=user_campus.campus and user_upb.id_user=user_campus.usuario;";
    $respuesta = query($sql);

    echo "<select name=\"responsable\" style=\" margin-top: 8px;\"> <br>";
    foreach ($respuesta as $fila) {
      $id_user = $fila['id_user'];
      $nombre = $fila['Nombre_completo'];
      echo "<option value=\"$id_user\">";
      echo "$nombre";
      echo "</option>";
    }
    echo "</select><br>";

    echo "Receptor ";
    //SQL DE RECEPTOR --remitente 
    $campus = $_REQUEST['campus'];
    $sql = "SELECT id_user,Nombre_completo from user_upb,campus_upb,user_campus where campus_upb.campus='$campus' and campus_upb.id_campus=user_campus.campus and user_upb.id_user=user_campus.usuario;";
    $respuesta = query($sql);
    echo "<select name=\"remitente\" style=\" margin-top: 8px;\"> ";
    foreach ($respuesta as $fila) {
      $id_user = $fila['id_user'];
      $nombre = $fila['Nombre_completo'];
      echo "<option value=\"$id_user\">";
      echo "$nombre";
      echo "</option>";
    }
    echo "</select><br>";

    ?>

    Documento
    <input type="file" name="txtImagen" accept="image/x-png,image/gif,image/jpeg" style=" margin-top: 8px;">
    <br>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
      <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <input type="hidden" name="geo">

    <input type="submit" value="Crear Ticket" class="btn btn-warning col-6 ">
    </input>
  </form>
  <!-- Fin BLOQUE 2 -->
  <!-- Fin del apartado principal -->
  </div>
  </div>
  </div>

</body>




<?php
//CIERRE PAGINA
echo "<div class=\"text-final\">";
include("include/footer.php");
echo "</div>";
//CIERRE DATOS EXTRAS   
include("include/dbclose.phpinc");
?>