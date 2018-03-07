<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id = trim($_REQUEST["id"]);
	$nombre = trim($_REQUEST["name"]);
	$user = trim($_REQUEST["user"]);

	$sql = "UPDATE usuario_login set nombre='{$nombre}', usuario='{$user}' where id_usuario={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>