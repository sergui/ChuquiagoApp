<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");


    //$observacion = $trim($_GET["observacion"]);
    $observacion = "Registardo desde la app";
    //$contador    = $trim($_GET["contador"]);
    $contador    = 0;
    $estado      = 1;
    $fecha       = trim($_GET["fecha"]);
    $id_kardex   = trim($_GET["id_kardex"]);
    $id_user     = trim($_GET["id_user"]);
    $id_falta    = trim($_GET["id_falta"]);
	
	$sql = "INSERT INTO `faltas_cometidas` (`id_fal_com`, `obseracion`, `contador`, `fecha`, `estado`, `id_kardex`, `id_user`, `id_falta`) VALUES  (null,'{$observacion}','{$contador}','{$fecha}','{$estado}','{$id_kardex}','{$id_user}','{$id_falta}')";
    //echo $sql;
	if (!$con->query($sql)) {
        //echo "Falló la insercion falta cometidas: (" . $con->errno . ") " . $con->error;
        $faltas['estado']="0";//No existe registros en la consulta
        $json['faltasave'][]=$faltas;
	}
	else{
        $faltas['estado']="1";//Registrado correctamente
        $json['faltasave'][]=$faltas;
    }
    echo json_encode($json);
	$con->close();
?>