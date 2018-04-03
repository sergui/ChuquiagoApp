<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$id=$_REQUEST['id_docente'];	
	$sql="SELECT d.id_docente,d.ci
			,d.nombre
			,d.paterno
			,d.materno
			,d.materno
			,d.celular
			,u.nombre_usuario,u.id_usuario
			,r.nombre AS nombre_rol, r.id_rol
			FROM docente d, usuario u, roles r
			WHERE d.id_user=u.id_usuario AND u.id_rol=r.id_rol
			AND d.estado=1 and u.id_docente={$id};";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['docente'] = $row;
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta";
	}
    echo json_encode($jsondata);
    
    $con->close();
?>