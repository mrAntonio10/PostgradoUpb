 <?php
include_once("inc/conf.php");
include_once("inc/functions.php");
$default_style = "style_form";
include_once("inc/head.php");
include_once("inc/header1.php");
?>
<div style="font-size: 30px; font-weight: bold; ">
    <center> 
    <img src="https://www.upb.edu/sites/default/files/styles/nivo_slider_front_page__1920x630/public/Marca-UPB---cuadrado_0.png?itok=sPNbq0A3" width="100" height="60" style="position: absolute; margin-left: -280px; margin-top:20px">
        Este es tu Sector
    <img src="https://www.upb.edu/sites/default/files/styles/nivo_slider_front_page__1920x630/public/Marca-UPB---cuadrado_0.png?itok=sPNbq0A3" width="100" height="60" style="position: absolute; margin-left: 180px; margin-top: 20px;">
     <br>¡Impulsemos nuestros emprendimientos!<br>
    UPB Subí La Vara
    </center>
</div>
<section class="formulario-pantalla">
        <div id="formulario-contenedor">
            <h2>EmprendimientosUPB</h2>
            <?php if(isset($_SESSION['mensaje'])){ echo "<P>".$_SESSION['mensaje']."</P><br>"; unset($_SESSION['mensaje']);}?>
            <form action="crud/login_usuario_mr.php" method="post">
            <!--  Variable de nombre email : metodo post-->
                <input type="email" name="email" class="input" placeholder="Correo electrónico">
            <!--  Variable de nombre password : metodo post-->
                <input type="password" name="password" class="input" placeholder="Contraseña">

                <button class="cta" type="submit">
                    <span>Iniciar Sesión</span>
                    <svg viewBox="0 0 13 10" height="10px" width="15px">
                      <path d="M1,5 L11,5"></path>
                      <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                  </button>

                <br>
                <a href="registro.php">¿Quieres registrar tu Usuario?</a>
            </form>
        </div>
    </section>

<?php
include_once("inc/banner.php");
include_once("inc/footer.php");
?>