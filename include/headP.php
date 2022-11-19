<?php
//HEADER
echo "<html>";
echo "<head><title>.:Postgrado SCZ:.</title>";
?>
<style>
  @import "style.css"
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!--  BODY  -->

<body>


  <?php
  //TOMAR EN CUENTA QUE LOS DATOS USER PASS ESTÁN EN COOKIES
  //Cookies obtenidas gracias al include/conf.phpinc
  //$user & $pass
  //-------------------------------------------------
  $sql = "SELECT Nombre_completo,contrasena,id_user from user_upb where correo='$user' and contrasena='$pass';";
  $respuesta = query($sql);

  foreach ($respuesta as $fila) {
    // code...
    $usuario = "{$fila['Nombre_completo']}";
    $contrasena = "{$fila['contrasena']}";
  }
  ?>
  <nav class="navbar navbar-expand-lg" style="background-color:  #FAFBFB;">
    <div class=" container-fluid">
      <a class="navbar-brand" href="">
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1f/Logo_UPB.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        UPB POSTGRADO
      </a>
        <div class="col-15">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 20 20">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
          <?php
          echo "$usuario";
          echo "$campus";

          ?>
        </div>
      </div>
    </div>
  </nav>



