<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre   = trim($_POST["nombre"]);
    $paterno  = trim($_POST["paterno"]);
    $materno  = trim($_POST["materno"]);
    $celular  = trim($_POST["celular"]);
    //$id_user  = trim($_POST["id_user"]);
	
	$sql = "INSERT INTO docente(nombre, paterno, materno, celular) VALUES('{$nombre}', '{$paterno}', '{$materno}', '{$celular}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>