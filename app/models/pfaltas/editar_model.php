<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id          = trim($_POST["id_pfalta"]);
	$maximo   = trim($_POST["max_faltas"]);	
	
	$sql = "UPDATE pfaltas set max_faltas={$maximo} where id_pfalta={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>  