<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
    
    $id_rude   = trim($_POST["id_rude"]);
    $nombre    = trim($_POST["nombre"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $sexo      = trim($_POST["sexo"]);
    $fecha_nac = trim($_POST["fecha_nac"]);
    $domicilio = trim($_POST["domicilio"]);
    //$id_user   = trim($_POST["id_user"]);
	
	$sql = "INSERT INTO estudiante(id_rude, nombre, paterno, materno, sexo, fecha_nac, domicilio) VALUES('{$id_rude}', '{$nombre}', '{$paterno}', '{$materno}', '{$sexo}', '{$fecha_nac}', '{$domicilio}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>