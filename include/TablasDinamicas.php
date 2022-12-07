<?php
function bandejaEntrada($respuesta){
?>
<table id="workers_table" class="table table-dark" style="width:100%">
<thead>
              <tr>
                <?php
                 echo "<th style=\"border-right: 1px solid #FDFEFE\"> Estado </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> T&iacute;tulo </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Fecha de Envio </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Responsable </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Remitente </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\">  </th>";
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
               
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">{$fila['estado_doc']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";

      echo "{$fila['titulo_doc']}
        </td>";


      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha_e']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u1']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u2']} </td>";

      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" value=\"+\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>

<?php
function bandejaSalida($respuesta){
  ?>
<table id="workers_table2" class="table table-dark" style="width:100%;">
<thead>
              <tr>
                <?php
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Estado </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> T&iacute;tulo </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Fecha de Envio </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\"> Receptor </th>";
    echo "<th style=\"border-right: 1px solid #FDFEFE\">  </th>";
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";

      echo "<td style=\"border-right: 1px solid #FDFEFE\">{$fila['es']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";
      echo "{$fila['titulo_doc']}
        </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha_e']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['u1']} </td>";

      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" value=\"+\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>

         
            <?php
}

?>
  
            