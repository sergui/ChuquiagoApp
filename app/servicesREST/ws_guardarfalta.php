<?php 
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 


    //$observacion = $trim($_GET["observacion"]);
    $observacion = trim($_GET["obs"]);
    //$contador    = $trim($_GET["contador"]);
    $contador    = 0;
    $estado      = 1;
    $fecha       = trim($_GET["fecha"]);
    $id_kardex   = trim($_GET["id_kardex"]);
    $id_user     = trim($_GET["id_user"]);
    $id_falta    = trim($_GET["id_falta"]);
    $id_asignatura    = trim($_GET["id_asignatura"]);
    
	$sql = "INSERT INTO `faltas_cometidas` (`id_fal_com`, `obseracion`, `contador`, `fecha`, `estado`, `id_kardex`, `id_user`, `id_falta`,`id_asignatura`) VALUES  (null,'{$observacion}','{$contador}','{$fecha}','{$estado}','{$id_kardex}','{$id_user}','{$id_falta}','{$id_asignatura}')";
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