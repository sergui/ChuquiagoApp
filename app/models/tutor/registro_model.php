<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombres   = trim($_POST["nombres"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $celular   = trim($_POST["celular"]);
    $telefono  = trim($_POST["telefono"]);
	$domicilio = trim($_POST["domicilio"]);
	
	//Obtenemos el usuario del tutor

	$nombreUser = substr($nombres,0,1)."".substr($paterno,0,1)."".substr($materno,0,1);
	$sqlSearchNomUser = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '". $nombreUser."'";
	$resSearchNomUser = $con->query($sqlSearchNomUser);
	if($resSearchNomUser->num_rows == 0){			
			$sqlInsertUser = "INSERT INTO usuario (id_usuario, nombre_usuario, password, estado, id_rol) VALUES (NULL, '{$nombreUser}', '{$nombreUser}', '1', '3')";
			if(!$con->query($sqlInsertUser)){
				echo ("<h1>ERROR AL INSERTAR EL USUARIO</h1>");
			}else{
				echo ("");
				$sqlIdUser = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
				$resIdUser = $con->query($sqlIdUser);
				if($resIdUser->num_rows == 1){
					$fila = $resIdUser->fetch_array();
					$sql = "INSERT INTO tutor(nombres, paterno, materno, celular, telefono, domicilio,estado, id_user) VALUES('{$nombres}', '{$paterno}', '{$materno}', '{$celular}', '{$telefono}', '{$domicilio}', 1,'{$fila[0]}')";
						if (!$con->query($sql)) {
							echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
						}
						else
							echo 1;
				}
			}
			
	}else{
		echo ("<h1>YA EXISTE USUARIO</h1>");
	}
	
	$con->close();
?>