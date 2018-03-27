<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id          = trim($_POST["id_falta"]);
	$tipoFalta   = trim($_POST["tipoFalta"]);
	$descripcion = trim($_POST["descripcion"]);
	
	#call modificarcurso
	$sql = "UPDATE faltas set tipoFalta='{$tipoFalta}', decripcion='{$descripcion}' where id_falta={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>  