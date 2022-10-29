<header>
    <div class="left">
        <a href="index.php"><h1>EmprendimientosUPB</h1></a>
        <div>
            <p><b>¡La mejor opción para darte a conocer!</b></p>
            <p>
            EmprendimientosUPB es una plataforma web llevada a cabo por el equipo de desarrollo RPV, esta fue realizada para ofrecer a los estudiantes de la Universidad Privada Boliviana un apartado para que puedan publicar sus diferentes productos con el fin de dar a conocer su emprendimiento al público logrando así llegar a muchas personas y aumentar las ventas de sus productos.
            </p>
        </div>
    </div>
    <div>
    <?php if(!isAutenticado()){?>
        <a href="inicio_sesion.php" title="Iniciar sesión">
            <i class="fa-solid fa-right-to-bracket"></i>  
        </a>
        <?php }else{ if(!isAdmin()){ ?>
        <a href="emprendimiento.php?emprendimiento=<?=$_SESSION["id"]?>" title="Mi emprendimiento">
            <i class="fa-solid fa-user"></i> 
        </a>
        <?php } ?>
        <a href="cerrar_sesion.php" title="Cerrar sesión">
            <i class="fa-solid fa-right-from-bracket"></i> 
        </a>
        <?php } ?>
    </div>
</header>