<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	session_start();
	
	$id = $_SESSION['id_user'];
	$user_password = trim($_REQUEST["password"]);
	$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

	$sql = "UPDATE usuario_login SET contrasenia='{$user_password_hash}' where id_usuario={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>