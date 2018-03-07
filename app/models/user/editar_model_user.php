<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	session_start();
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id = $_SESSION['id_user'];
	$user = trim($_REQUEST["user"]);

	$sql = "UPDATE usuario_login set usuario='{$user}' where id_usuario={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>