<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id       = trim($_POST["id_docente"]);
	$nombre   = trim($_POST["nombre"]);
    $paterno  = trim($_POST["paterno"]);
    $materno  = trim($_POST["materno"]);
    $celular  = trim($_POST["celular"]);
	
	#call modificarcurso
	$sql = "UPDATE docente set nombre='{$nombre}', paterno='{$paterno}', materno='{$materno}', celular='{$celular}' where id_docente={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	
	$con->close();
?>