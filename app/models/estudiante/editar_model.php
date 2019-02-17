<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id        = trim($_POST["id_rude"]);
	//$id_rude   = trim($_POST["id_rude"]);
    $nombre    = trim($_POST["nombre"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $sexo      = trim($_POST["sexo"]);
    // $fn = trim($_POST["fecha_nac"]);
    $domicilio = trim($_POST["domicilio"]);
	
	// $fecha_nac_aux=explode("/", $fn);
	//$fecha_nac=$fecha_nac_aux[2].'-'.$fecha_nac_aux[1].'-'.$fecha_nac_aux[0];
	// $sql = "UPDATE estudiante set nombre='{$nombre}', paterno='{$paterno}', materno='{$materno}', sexo='{$sexo}', fecha_nac='{$fecha_nac}', domicilio='{$domicilio}' where id_rude={$id}";
	$sql = "UPDATE estudiante set nombre='{$nombre}', paterno='{$paterno}', materno='{$materno}', sexo='{$sexo}', domicilio='{$domicilio}' where id_rude={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>