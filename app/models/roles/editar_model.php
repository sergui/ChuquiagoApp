<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id     = trim($_POST["id_rol"]);
	$nombre = trim($_POST["nombre"]);
	
	#call modificarcurso
	$sql = "UPDATE roles set nombre='{$nombre}' where id_rol={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>