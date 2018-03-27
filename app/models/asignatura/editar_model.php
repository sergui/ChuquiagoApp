<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre_asignatura = trim($_POST["nombre_asignatura"]);
	$sigla             = trim($_POST["sigla"]);
	
	#call modificarcurso
	$sql = "UPDATE asignatura set nombre_asignatura='{$nombre_asignatura}', sigla='{$sigla}' where id_asignatura={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	
	$con->close();
?>