<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";
    $id        = trim($_POST["id_tutor"]);
	$nombres   = trim($_POST["nombres"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $celular   = trim($_POST["celular"]);
    $telefono  = trim($_POST["telefono"]);
    $domicilio = trim($_POST["domicilio"]);
	
	#call modificarcurso
	$sql = "UPDATE tutor set nombres='{$nombres}', paterno='{$paterno}', materno='{$materno}', celular='{$celular}', telefono='{$telefono}', domicilio='{$domicilio}' where id_tutor={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	
	$con->close();
?>