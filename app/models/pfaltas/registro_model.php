<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$maximo        = trim($_POST["max_faltas"]);
	$sql = "INSERT INTO pfaltas(max_faltas) VALUES({$maximo})";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>