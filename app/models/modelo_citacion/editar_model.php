<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id      = trim($_POST["id_citacion"]);
	$formato = trim($_POST["formato"]);
	
	#call modificarcurso
	$sql = "UPDATE modelo_citacion set formato='{$formato}' where id_citacion={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>