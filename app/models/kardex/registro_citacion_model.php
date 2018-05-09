<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";

    $citacion = trim($_POST["citacion"]);
    $tipo    = "estandar";
    $id_kardex   = trim($_POST["id_kardex"]);
    $sql = "INSERT INTO citacion (tipo, citacion, fecha, id_kardex) VALUES ('{$tipo}','{$citacion}',NOW(),{$id_kardex})";
	if (!$con->query($sql)) {
		echo "Falló la insercion falta cometidas: (" . $con->errno . ") " . $con->error;
	}else{
		echo 1;	
	}
	$con->close();
?>