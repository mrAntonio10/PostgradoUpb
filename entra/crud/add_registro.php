<?php
/*Clase para añadir emprendimiento
*/
header("Location: ../inicio_sesion_mr.php");
include_once("../inc/conf.php");
include_once("../inc/dbopen.php");
include_once("../inc/functions.php");

$Email =  filter_var(trim(recibir_variable("POST", "Email"), FILTER_SANITIZE_EMAIL));
$Password =  filter_var(trim(recibir_variable("POST", "Password"), FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$User =  filter_var(trim(recibir_variable("POST", "User"), FILTER_SANITIZE_FULL_SPECIAL_CHARS));

 echo $Email;
echo "hola";

if(empty($Email) || empty($Password) || empty($User)){
    $_SESSION['mensaje'] = "Intenta denuevo";
    header("Location: ../registro.php");
    exit;
}
if(! validarEmail($Email)){
    $_SESSION['mensaje'] = "Email no válido";
    header("Location: ../registro.php");
    exit;
}
if(strlen($Password) < 8){
    $_SESSION['mensaje'] = "La contraseña debe tener al menos 8 caracteres";
    header("Location: ../registro.php");
    exit;
}
$q="SELECT usuario_id from usuarios WHERE usuario_correo=\"$Email\";";
$respuesta=db_query($q);
$r = $respuesta->fetch_object();

if(! $r->usuario_id == NULL){
    $_SESSION['mensaje'] = "Ya existe una cuenta con ese email";
    header("Location: ../registro.php");
    exit;
}
//TIPO 0 referente a usuario=>Emprendedor  ,tipo   ,"0"
$agregar="INSERT into usuarios (usuario_correo, usuario_nombre, usuario_password,usuario_tipo) values('$Email','$User', '$Password',0);";
    db_query($agregar);
echo "vardum:".PHP_EOL;
    var_dump($agregar);
    $_SESSION['mensaje'] = "Cuenta creada exitosamente";

include_once("../inc/dbclose.php");
exit;
?>