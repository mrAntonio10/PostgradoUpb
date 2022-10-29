<?php

/*Clase para mostrar datos de un emprendimiento
*/
//PRUEBA UNITARIA PARA JALAR EMPRENDIMIENTO ID1
$IdEmprendimiento=1;
//LO QUE REALMENTE VA
recibir_variable("GET", "emprendimiento");

//if($IdEmprendimiento == null){header("Location: ../index.php");}

$q="SELECT emprendimiento_id, emprendimiento_nombre, emprendimiento_descripcion, emprendimiento_foto FROM emprendimientos WHERE emprendimiento_id=$IdEmprendimiento and emprendimiento_bloqueos=0;";
$a=db_query($q);

//if($a->num_rows == 0){header("Location: ../index.php");}

$r = $a->fetch_object();
	$idEmprendimiento = $r->emprendimiento_id;
	$nombreEmprendimiento = $r->emprendimiento_nombre;
    $descripcionEmprendimiento = $r->emprendimiento_descripcion;
	$fotoEmprendimiento = "resources/img_banners/". (($r->emprendimiento_foto!=NULL && file_exists("resources/img_banners/". $r->emprendimiento_foto)) ? $r->emprendimiento_foto : "logoUPB.jpg");

