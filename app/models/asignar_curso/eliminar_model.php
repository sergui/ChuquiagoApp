<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$iddoc = trim($_REQUEST["id_docente"]);
	$idcur = trim($_REQUEST["id_curso"]);
	$idasig = trim($_REQUEST["id_asignatura"]);

	$sql = "DELETE FROM tiene where id_asignatura={$idasig} and id_docente={$iddoc} and id_curso={$idcur}";

	if (!$con->query($sql)) {
		echo "Falló eliminacion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>