<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre_asignatura = trim($_POST["nombre_asignatura"]);
	$sigla             = trim($_POST["sigla"]);
	
	$sql = "INSERT INTO asignatura(nombre_asignatura, sigla) VALUES('{$nombre_asignatura}', '{$sigla}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>