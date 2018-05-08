<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$id_cur=$_REQUEST['id_curso'];
	$id_doc=$_REQUEST['id_docente'];
	$sql="UPDATE kardex set id_asesor={$id_doc} where id_curso={$id_cur}";
	if (!$con->query($sql)) {
		echo "Falló la REGISTRO DE ASESOR: (" . $con->errno . ") " . $con->error;
	}else
		echo 1;
	$con->close();
?>