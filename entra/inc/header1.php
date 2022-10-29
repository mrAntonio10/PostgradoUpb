<header>
    <a href="index.php"><img src="resources/img/emprendimientosupb_logo.png" alt="EmprendimientosUPB" class="img-logo"></a>
    <div>
    <?php if(!isAutenticado()){?>
        <a href="inicio_sesion_mr.php" title="Iniciar sesión">
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