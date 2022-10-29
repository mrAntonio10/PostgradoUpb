<?php
/*Clase para autenticar un administrador para su inicio de sesion
*/
header("Location: ../../index.php");
include_once("../inc/conf.php");
include_once("../inc/dbopen.php");
include_once("../inc/functions.php");

$Email = filter_var(trim(recibir_variable("POST", "email")), FILTER_SANITIZE_EMAIL);
$Password = filter_var(trim(recibir_variable("POST", "password")), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$q="SELECT usuario_id,usuario_tipo from usuarios WHERE usuario_correo=\"$Email\" and usuario_password=\"$Password\" and usuario_bloqueos = 0;";
$respuesta=db_query($q);

$r = $respuesta->fetch_object();
if($r == null || $r->usuario_id == null){
	$_SESSION["mensaje"] = "Fallo de autenticación";
	header("Location: ../inicio_sesion_mr.php");
	exit;
}
session_destroy();
session_start();

$_SESSION["id"] = $r->usuario_id;
$_SESSION["typeUser"] = $r->usuario_tipo;
include_once("../inc/dbclose.php");
exit;
?>