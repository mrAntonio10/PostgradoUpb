<?php
include("inc/conf.php");
include("inc/dbopen.php");
include ("inc/functions.php");
$agregar="INSERT into usuarios (usuario_correo, usuario_nombre, usuario_password,usuario_tipo) values('marco','polo', 'polito',0);";
    db_query($agregar);
echo "hola";
?>