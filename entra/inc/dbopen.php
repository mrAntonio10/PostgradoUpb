<?php
    $dblink = new mysqli('rriver.cat', $db_user, $db_pass, $db_name); //$dblink = new mysqli($IPuser, $db_user, $db_pass, $db_name);
    $dblink->set_charset("utf8");
    if ($dblink->connect_error) {
      die('Error al conectar a la Base de Datos (' . $dblink->connect_errno . ') '
            . $dblink->connect_error);
    }
?>
