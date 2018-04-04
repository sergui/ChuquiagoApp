<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id       = trim($_POST["id_docente"]);
	$id_user  = trim($_POST["id_usuario"]);
	$nombre   = trim($_POST["nombre"]);
    $paterno  = trim($_POST["paterno"]);
    $materno  = trim($_POST["materno"]);
    $celular  = trim($_POST["celular"]);
	$nom_user = trim($_POST["nombre_usuario"]);
	$rol= trim($_POST["id_rol"]);
	
	$sql = "UPDATE docente set nombre='{$nombre}', paterno='{$paterno}', materno='{$materno}', celular='{$celular}' where id_docente={$id}";

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();
		$con=conectar();
		$sql = "UPDATE usuario set nombre_usuario='{$nom_user}', id_rol={$rol} where id_usuario={$id_user}";
		if (!$con->query($sql)) {
			echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
		}
		$con->close();
		echo 1;
	}
	
	
?>