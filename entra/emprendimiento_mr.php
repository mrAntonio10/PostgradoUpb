<?php
include_once("inc/conf.php");
include_once("inc/functions.php");
include_once("inc/dbopen.php");

$default_style = "style_form";
include_once("inc/head.php");
include_once("inc/header_out.php");
include_once("crud/mostrar_emprendimiento_mr.php");
include_once("crud/listar_productos_emprendimiento.php");


?>

<main class="emprendimiento-pantalla">
    <h1 class="emprendimiento-nombre">
        <?= $nombreEmprendimiento ?>
    </h1>
    <div class="emprendimiento-contenedor">
        <img src="<?= $fotoEmprendimiento ?>" alt="" class="emprendimiento-banner">
        <div class="emprendimiento-info">
            <b> <?= $nombreEmprendimiento ?></b>
            <p><?= $descripcionEmprendimiento ?></p>
            <?php if (isAdmin()) { ?>
            <a href="crud/delete_emprendimiento.php?emprendimiento=<?= $IdEmprendimiento ?>" title="Borrar"><i
                    class="fa-solid fa-trash"></i></a>
            <?php }
            if (isAutenticado() && $_SESSION["id"] == $IdEmprendimiento) { ?>
            <a href="actualizar_emprendimiento.php?emprendimiento=<?= $IdEmprendimiento ?>"
                title="Editar información">Editar información<i class="fa-solid fa-pen"></i></a>
            <?php } ?>
        </div>
    </div>

    <h2 class="productos-titulo">Productos
        <?php if (isAutenticado() && $IdEmprendimiento == $_SESSION["id"]) { ?>
        <a href="nuevo_producto.php" class="producto-add">
            <i class="fa-solid fa-plus"></i>
        </a>
        <?php } ?>
    </h2>
    <div class="productos-contenedor">
        <?php
        foreach ($productos as $producto) {
        ?>
        <div class="producto-contenedor">
            <img src="<?= $producto["fotoProducto"] ?>" alt="imagen-producto"
                title="<?= $producto["nombreProducto"] ?>">
            <div class="producto-info">
                <h3><?= $producto["nombreProducto"] ?></h3>
                <p>
                    <?= $producto["descripcionProducto"] ?>
                </p>
                <?php if (isAutenticado() && $_SESSION["id"] == $IdEmprendimiento || isAdmin()) { ?>
                <br>
                <a href="crud/delete_producto.php?id=<?= $producto["id"] ?>" title="Borrar"><i
                        class="fa-solid fa-trash"></i></a>
                <?php if (!isAdmin()) { ?>
                <a href="actualizar_producto.php?id=<?= $producto["id"] ?>" title="Editar"><i
                        class="fa-solid fa-pen"></i></a>
                <?php }
                    } ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</main>

<?php
include_once("inc/footer.php");
include_once("inc/dbclose.php");

?>