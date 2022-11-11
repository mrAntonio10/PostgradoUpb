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

<<<<<<< HEAD
          <?php
//BANDEJA DE ENTRADA TABLE
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

          bandejaEntrada($respuesta);
          ?>
          <!-- Apartado principal -->
          <div class="col" style="  width: 75px;height: 110px; color: black; font-size: 24px; border-right: 1px solid #000;">

            <!-- Fin del apartado principal -->

            <!-- FIN CONTAINER 2 -->
          </div>
        </div>

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
        <!-- Fin form 1 -->
      </div>
    </div>




    <!-- FORM 2 ENVIADOS -->

    <div class="col-6" style="   font-size: 20px; border-right: 1px solid #000;">
=======
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
>>>>>>> f12a2f560f4c82eb9760a58ed2c326418d014ca3

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

<<<<<<< HEAD
          <?php
//BANDEJA DE SALIDA TABLE
          //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
          //Cookies obtenidas gracias al include/conf.phpinc
          //$user & $pass
          //-------------------------------------------------
          $sql = "SELECT * from user_upb where correo='{$user}' and contrasena='{$pass}';";
          $respuesta = query($sql);
          
          bandejaSalida($respuesta);
          ?>
          <!-- Apartado principal -->
          <div class="col" style="  width: 75px;height: 110px; color: black; font-size: 24px; border-right: 1px solid #000;">
          
            <!-- Fin del apartado principal -->

            <!-- FIN CONTAINER 2 -->
          </div>
        </div>

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
        <!-- Fin form 1 -->
      </div>
=======
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

>>>>>>> f12a2f560f4c82eb9760a58ed2c326418d014ca3
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