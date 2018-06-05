<?php 
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 

    $id_kardex   = trim($_GET["id_kardex"]);
    $citacion   = trim($_GET["citacion"]);
    $fechayhora = trim($_GET["fechayhora"]);
    
	$sql = "INSERT INTO citacion (id_citacion, tipo, citacion, fecha, estado, id_kardex) VALUES (NULL, 'estandar', '{$citacion}', '{$fechayhora}', 1, {$id_kardex})";
    //echo $sql;
	if (!$con->query($sql)) {
        //echo "Falló la insercion de citacion: (" . $con->errno . ") " . $con->error;
        $faltas['estado']="0";//No existe registros en la consulta
        $json['rescitacion'][]=$faltas;
	}
	else{
        $faltas['estado']="1";//Registrado correctamente
        $json['rescitacion'][]=$faltas;
    }
    echo json_encode($json);
	$con->close();
?>