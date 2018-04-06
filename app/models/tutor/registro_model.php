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

	$nombreUser = substr($nombres,0,1).".".$paterno;
	$contraseniaUser = password_hash($nombreUser, PASSWORD_DEFAULT);
	$sqlSearchNomUser = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '".$nombreUser."'";
	$resSearchNomUser = $con->query($sqlSearchNomUser);

	if($resSearchNomUser->num_rows == 0){			
			$sqlInsertUser = "INSERT INTO usuario (id_usuario, nombre_usuario, password, estado, id_rol) VALUES (NULL, '{$nombreUser}', '{$contraseniaUser}', '1', '3')";
			if(!$con->query($sqlInsertUser)){
				echo ("<h3>ERROR AL INSERTAR EL USUARIO</h3>");
			}else{
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
		//echo ("<h3>YA EXISTE USUARIO</h3>");
		$sqlIdUserLast = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
		$resIdUserLast = $con->query($sqlIdUserLast);

		if($resIdUserLast->num_rows == 1){
			$fila = $resIdUserLast->fetch_array();
			$nombreUser = $nombreUser.$fila[0]+1;
			$contraseniaUser = password_hash($nombreUser, PASSWORD_DEFAULT);
			$sqlInsertUser = "INSERT INTO usuario (id_usuario, nombre_usuario, password, estado, id_rol) VALUES (NULL, '{$nombreUser}', '{$contraseniaUser}', '1', '3')";
			if(!$con->query($sqlInsertUser)){
				echo ("<h3>ERROR AL INSERTAR EL USUARIO Else".$nombreUser."</h3>");
			}else{
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
		}
	}
	
	$con->close();
?>