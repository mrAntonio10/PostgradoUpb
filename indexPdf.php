<?php
//DATOS EXTRAS

include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//PAGINA
include("include/headP.php");


?>


<!-- Container2-->
<div class="container-fluid" style="text-align: center; background-color: white;width: 100%;">
  <div class="row" style="height: 100%;">


    <?php
    //controlador de error
    if (empty($usuario) && empty($contrasena)) {
      echo "<CENTER style=\"margin-top: 20px\"><h2> Usuario no encontrado: Por favor ingrese los datos correctos <br><a href=\"popup.php\"> volver atrás </a> </h2></CENTER>";
      exit();
    }

    ?>

    <!--BANDEJA ENTRADA-->
    <div class="col-6" style=" font-size: 20px; border-right: 1px solid #000; height: 100%; ">
      <?php
      //apartado del post para obtener informacion de cada documento
      $desc = $_POST['desc'];
      $ido = $_POST['id_o'];
      $point = $_POST['point'];
      ?>

      <!-- Container2-->
      <div class="container-fluid" style="text-align: center; background-color: white;width: 103.8%; margin-left: -1.8%  ;">
        <div class="row" style="background-color:white;">

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

      <?php
      //apartado del post para obtener informacion de cada documento
      $desc = $_POST['desc'];
      $ido = $_POST['id_o'];
      $point = $_POST['point'];
      ?>

      <!-- Container2-->
      <div class="container-fluid" style="text-align: center; background-color: white;width: 103.8%; margin-left: -2.2%  ;">
        <div class="row" style="background-color:white;">


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