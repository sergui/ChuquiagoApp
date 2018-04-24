<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
    
    //Datos que segun la consulta en este caso se pedira id_user , id_kardex
    
    $id_user   = $_REQUEST['id_user'];
    $id_kardex = $_REQUEST['id_kardex'];    
    
    $sql="SELECT * FROM faltas_cometidas WHERE id_user={$id_user} && id_kardex={$id_kardex}";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['faltas_cometidas'] = $row[0];
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta faltas cometidas";
	}
    echo json_encode($jsondata);
    
    $con->close();
?>