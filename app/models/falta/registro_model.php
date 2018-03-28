<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$tipo        = trim($_POST["tipoFalta"]);
	$descripcion = trim($_POST["descripcion"]);
		

	$sql = "INSERT INTO faltas(tipoFalta, descripcion) VALUES('{$tipo}', '{$descripcion}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>