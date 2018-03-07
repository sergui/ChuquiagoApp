<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre = trim($_POST["name"]);
	$fechaRegistro = date('Y-m-d H:i:s');
	$user_name = trim($_POST["user"]);
	$user_password = $_POST['password'];
	$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
	$rol=trim($_POST["rol"]);; //0 super usuario, 1 Administrador, 2 Cajeros

	$sql = "CALL insertarUsuario('{$nombre}','{$fechaRegistro}','{$user_name}','{$user_password_hash}',{$rol});";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>