<?php
  session_start();
  function recibir_variable($metodo, $nombre_variable) {
    $nombre_variable=filter_var(trim($nombre_variable),FILTER_SANITIZE_SPECIAL_CHARS);
    $variable_interna = null;
    if ($metodo == "POST") {
      $variable_interna = (isset($_POST[$nombre_variable]) ? $_POST[$nombre_variable] : null);
    } elseif ($metodo == "GET") {
      $variable_interna = (isset($_GET[$nombre_variable]) ? $_GET[$nombre_variable] : null);
    } elseif ($metodo == "REQUEST") {
      $variable_interna = (isset($_REQUEST[$nombre_variable]) ? $_REQUEST[$nombre_variable] : null);
    }
    if (!is_array($variable_interna)) {
      $variable_interna = trim(str_replace("'", "", $variable_interna));
    }
    return $variable_interna;
  }

  function db_query( $q ) {
     global $dblink;
     global $db_user, $db_pass, $db_name;

     // Verificar que el servidor este prendido antes de hacer el query
     if (!$dblink->ping()) {
       $dblink->close();
       $dblink = new mysqli('localhost', $db_user, $db_pass, $db_name);
       if ($dblink->connect_error) {
        die('Error al conectar a la Base de Datos (' . $dblink->connect_errno . ') '
              . $dblink->connect_error);
       }
     }
     $result = $dblink->query( $q );
     unset( $error );
     $error = $dblink->error;
     if( $error ) {
         echo "Error de SQL, por favor rep&oacute;rtelo a la administraci&oacute;n<br />\n";
     }
     return $result;
     $result->close();
  }

function poseeProducto($id, $idProducto){
  $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  $r = db_query("SELECT IdEmprendedor FROM Producto WHERE IdProducto = $idProducto;");
  $a = $r->fetch_object();
  return $a->IdEmprendedor == $id;
}
function isBloqueado($id){
  $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  $r = db_query("SELECT isBloqueado FROM UsuarioEmprendedor WHERE IdEmprendedor = $id;");
  $a = $r->fetch_object();
  return $a->isBloqueado;
}

function isAutenticado(){
  return isset($_SESSION["id"]) && $_SESSION["id"] != null;
}
function isAdmin(){
  return isset($_SESSION["typeUser"]) && strcmp($_SESSION["typeUser"], ("administrador")) === 0;
}

function validarEmail($email){
  return preg_match("/^[A-Za-z\d]+@[g][m][a][i][l].[c][o][m]/", $email);
}

?>
	