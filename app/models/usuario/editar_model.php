<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id      = trim($_POST["id_usuario"]);
	$nombre_usuario = trim($_POST["nombre_usuario"]);
	$password       = trim($_POST["password"]);
		
	#call modificarcurso
	$sql = "UPDATE usuario set nombre_usuario='{$nombre_usuario}', password='{$password}' where id_usuario={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>