<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

    $nombre    = trim($_POST["nombre"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $sexo      = trim($_POST["sexo"]);
    $fn = trim($_POST["fecha_nac"]);
    $domicilio = trim($_POST["domicilio"]);
    //$id_user   = trim($_POST["id_user"]);
	$fecha_nac_aux=explode("/", $fn);
	$fecha_nac=$fecha_nac_aux[2].'-'.$fecha_nac_aux[1].'-'.$fecha_nac_aux[0];
	$sql = "INSERT INTO estudiante(nombre, paterno, materno, sexo, fecha_nac, domicilio) VALUES('{$nombre}', '{$paterno}', '{$materno}', '{$sexo}', '{$fecha_nac}', '{$domicilio}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>