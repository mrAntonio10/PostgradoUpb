<?php

include_once("conf.phpinc");
    $dblink = new mysqli('localhost',$db_user, $db_pass, $db_name,3307);

     if ($dblink->connect_error) {
 die('<center> (' . $dblink->connect_errno . ') '." <br><h1>Error a la hora de conectar</h1> <a href=\"popup.php\" style=\"font-size:45px;\"> <br>volver atras... </a></center>");
    }
 

  /*
   
  */

?>