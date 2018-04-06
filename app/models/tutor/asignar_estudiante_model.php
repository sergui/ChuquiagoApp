<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id_tutor   = trim($_POST["id_tutor"]);
    $id_rude   = trim($_POST["id_rude"]);
    //$id_user = trim($_POST["id_user"]);

	$sql = "INSERT INTO encargado(id_tutor, id_rude) VALUES('{$id_tutor}', '{$id_rude}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>