<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$id=$_REQUEST['id_pfalta'];
	$sql="SELECT * FROM pfaltas WHERE id_pfalta={$id}";
	$jsondata['ok']="todo bien";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['pfaltas'] = $row;
			}
		}
	}else{
		echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
		$jsondata['estado']="Error en la consulta";
	}
    echo json_encode($jsondata);
    
    $con->close();
?>