<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id      = trim($_POST["id_curso"]);
	$grado   = trim($_POST["grado"]);
	$paralelo = trim($_POST["paralelo"]);
	
	#call modificarcurso
	$sql = "UPDATE curso set grado='{$grado}', paralelo='{$paralelo}' where id_curso={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>