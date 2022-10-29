<?php

    //datos jalados de TuEntrada.php
      //$idd = id_destino doc
      //$ido = id_origen  doc
      //$desc = descripcion doc
    $sql="SELECT id_user from user_upb where correo='$user';";
    $respuesta=query($sql);
    foreach ($respuesta as $fila) {
      // code...
      $idd="{$fila['id_user']}";
    }

    $sql ="SELECT co.campus as coo,cd.campus as cdd from user_campus as uo, user_campus as ud, campus_upb as co, campus_upb as cd where uo.usuario=$ido and ud.usuario=$idd and co.id_campus=uo.campus and cd.id_campus=ud.campus;";
    $respuesta=query($sql);
    foreach ($respuesta as $fila) {
      // code...
      $co="{$fila['coo']}";
      $cd="{$fila['cdd']}";
    }
//POP UP :D de ventana
echo "<div class=\"ventana\" id=\"vent\" style=\"color: white;\">";

  //BOTON Cerrar
echo "<div id=\"cerrar\">";
    echo "<a href=\"javascript: cerrar()\">";
    ECHO "<img src=\"https://w7.pngwing.com/pngs/844/786/png-transparent-maine-computer-icons-close-icon-thumbnail.png\" widht=\"15\" height=\"25\">";
   echo " </a>";
echo "</div>";
//FIN DEL BOTON CERRAR
//FORM
 echo "<center>";
   echo "<h4 style=\"margin:0px;\">";
   ECHO "Datos del Documento";
   echo "<br><br>";
    echo "<b><h4>";
    ECHO "Campus Origen:";
    echo "</h4> </b> <input placeholder=\"$co\"  name=\"USER\" readonly style=\"text-align: center;\">";
  echo "<br>";
   echo "<b><h4>";
    ECHO "Campus Destino:";
     echo"</h4></b> <input placeholder=\"$cd\"  name=\"PASS\" readonly style=\"text-align: center;\">";
    echo "<br>";
    echo "<b><h4>";
    ECHO "Descripci&oacute;n:";
     echo"</h4></b> <textarea name=\"desc\" style=\"font-size: 20px;height: 200px; width: 300px; margin-top: 8px; text-align: center;\" maxlength=\"200\" readonly > $desc </textarea><br><br>";
    echo "<br>";
 echo"</center>";
//FIN DEL POP UP
 ECHO "</div>";
echo "</form>";

 echo " <script> ";
   echo "function continuar() {";
    echo "document.getElementById(\"boton\").style.display=\"block\";";
  echo "}";

  echo "function abrir(){";
    echo "document.getElementById(\"vent\").style.display=\"block\";";
 echo  "}";
  echo "function cerrar(){";
    echo "document.getElementById(\"vent\").style.display=\"none\";";
  echo "}";
echo "</script>";

?>