<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$id_tutor   = trim($_REQUEST["id_tutor"]);
    $id_rude   = trim($_REQUEST["id_rude"]);

    $sql="INSERT INTO encargado (id_tutor,id_rude) values({$id_tutor},{$id_rude})";
	if(!$con->query($sql)){
		"Falló la insercion: (" . $con->errno . ") " . $con->error;
	}else{
		echo 1;
	}
	$con->close();
?>