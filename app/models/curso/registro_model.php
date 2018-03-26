<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$grado = trim($_POST["grado"]);
	$paralelo = trim($_POST["paralelo"]);	

	$sql = "INSERT INTO curso(grado, paralelo) VALUES('{$grado}', '{$paralelo}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>