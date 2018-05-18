<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	session_start();

    
    $contador    = 0;
    $fecha       = "";
    $id_kardex   = trim($_POST["id_kardex"]);
    $id_user     = $_SESSION["id_user"];
	$cantidad=count($_REQUEST['id_falta']);
	$id_asignatura = ($_REQUEST['id_asignatura']);
	$verifica=0;
	for ($i=0; $i <$cantidad ; $i++) {
		$id_falta=$_REQUEST['id_falta'][$i];
		$observacion = trim($_POST["observacion"][$i]);
		$sql = "INSERT INTO faltas_cometidas (obseracion, contador, fecha, id_kardex, id_user ,id_falta, id_asignatura) VALUES ('{$observacion}',{$contador},CURDATE(),{$id_kardex},{$id_user},{$id_falta}, {$id_asignatura});";
		if (!$con->query($sql)) {
			echo "Falló la insercion falta cometidas: (" . $con->errno . ") " . $con->error;
		}
		else{
			$verifica++;
		}
	}
	
	if($verifica==$cantidad)
		echo 1;	
	else
		echo "Falló la insercion falta cometidas: ";
	$con->close();
?>