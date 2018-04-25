<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	$id_curso = trim($_POST["curso"]);
	$id_asigantura = trim($_POST["asignatura"]);
	$id_docente = trim($_POST["docente"]);

	$sql = "INSERT INTO tiene(id_curso, id_asignatura, id_docente) VALUES({$id_curso},{$id_asigantura},{$id_docente} )";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>