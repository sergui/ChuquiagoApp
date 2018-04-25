<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

    $observacion = $trim($_POST["observacion"]);
    $contador    = $trim($_POST["contador"]);
    $fecha       = $trim($_POST["fecha"]);
    $id_kardex   = $trim($_POST["id_kardex"]);
    $id_user     = $trim($_POST["id_user"]);
	
	$sql = "INSERT INTO 'faltas_cometidas' ('obseracion', 'contador', 'fecha', 'id_kardex', 'id_user') VALUES ('{$observacion}','{$contador}','{$fecha}','{$id_kardex}','{$id_user}');";

	if (!$con->query($sql)) {
		echo "Falló la insercion falta cometidas: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
		$con->close();
?>