<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre_usuario = trim($_POST["nombre_usuario"]);
	$password       = trim($_POST["password"]);
	
	$sql = "INSERT INTO usuario (nombre_usuario, password) VALUES('{$nombre_usuario}', '{$password}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>