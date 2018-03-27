<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombres   = trim($_POST["nombres"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $celular   = trim($_POST["celular"]);
    $telefono  = trim($_POST["telefono"]);
    $domicilio = trim($_POST["domicilio"]);
    //$id_user = trim($_POST["id_user"]);
	
	$sql = "INSERT INTO tutor(nombres, paterno, materno, celular, telefono, domicilio) VALUES('{$nombres}', '{$paterno}', '{$materno}', '{$celular}', '{$telefono}', '{$domicilio}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>