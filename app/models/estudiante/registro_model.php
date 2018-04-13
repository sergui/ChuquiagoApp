<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

    $nombre    = trim($_POST["nombre"]);
    $paterno   = trim($_POST["paterno"]);
    $materno   = trim($_POST["materno"]);
    $sexo      = trim($_POST["sexo"]);
    $fn        = trim($_POST["fecha_nac"]);
    $domicilio = trim($_POST["domicilio"]);
    $fecha_nac_aux = explode("/", $fn);
	$fecha_nac = $fecha_nac_aux[2].'-'.$fecha_nac_aux[1].'-'.$fecha_nac_aux[0];
	$id_curso  = trim($_POST["id_curso"]);

	
	//Creamos y Buscamos el nombre de usuario si existe
	$nombreUser       = substr($nombre,0,1)."".substr($paterno,0,1)."".substr($materno,0,1)."".substr($fecha_nac_aux[2],2,3)."".$fecha_nac_aux[1]."".$fecha_nac_aux[0];
	$contraseniaUser  = password_hash($nombreUser, PASSWORD_DEFAULT);
	$sqlSearchNomUser = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '".$nombreUser."'";
	$resSearchNomUser = $con->query($sqlSearchNomUser);

	if($resSearchNomUser->num_rows == 0){		
		    $sqlInsertUser = "INSERT INTO usuario (nombre_usuario, password, estado, id_rol) VALUES ('{$nombreUser}', '{$contraseniaUser}', 1, 2)";
			if(!$con->query($sqlInsertUser)){
				echo ("<h3>ERROR AL INSERTAR EL USUARIO : ".$sqlInsertUser."</h3>");
			}else{
				$sqlIdUser = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
				$resIdUser = $con->query($sqlIdUser);
				if($resIdUser->num_rows == 1){
					$fila = $resIdUser->fetch_array();
					$sql = "INSERT INTO estudiante(nombre, paterno, materno, sexo, fecha_nac, domicilio, estado, id_user) VALUES('{$nombre}', '{$paterno}', '{$materno}', '{$sexo}', '{$fecha_nac}', '{$domicilio}', 1,'{$fila[0]}')";
					
						if (!$con->query($sql)) {
							echo "Falló la insercion estudiante: (" . $con->errno . ") " . $con->error;
						}
						else{

							$sqlIdEstudiante = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
							$resIdEstudiante = $con->query($sqlIdUser);
							$filaEst = $resIdEstudiante->fetch_array();

							$sqlKardex = "INSERT INTO kardex(reset, gestion, id_rude, id_curso, id_asesor, estado) VALUES(0, ".date('Y').",'{$filaEst[0]}','{$id_curso}',0,1)";
							
								if (!$con->query($sqlKardex)) {
									echo "Falló la insercion a kardex: (" . $con->errno . ") " . $con->error;
								}
								else{
									echo 1;		
								}
					}							
				}
			}			
	}else{
		//echo ("<h3>YA EXISTE USUARIO</h3>");
		$sqlIdUserLast = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
		$resIdUserLast = $con->query($sqlIdUserLast);

		if($resIdUserLast->num_rows == 1){
			$fila = $resIdUserLast->fetch_array();
			$nombreUser = $nombreUser."".($fila[0]+1);
			$contraseniaUser = password_hash($nombreUser, PASSWORD_DEFAULT);
			$sqlInsertUser = "INSERT INTO usuario (nombre_usuario, password, estado, id_rol) VALUES ('{$nombreUser}', '{$contraseniaUser}', '1', '3')";
			if(!$con->query($sqlInsertUser)){
				echo ("<h3>ERROR AL INSERTAR EL USUARIO Else".$sqlInsertUser."</h3>");
			}else{
				$sqlIdUser = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
				$resIdUser = $con->query($sqlIdUser);
				if($resIdUser->num_rows == 1){
					$fila = $resIdUser->fetch_array();
					$sql = "INSERT INTO estudiante(nombre, paterno, materno, sexo, fecha_nac, domicilio, estado, id_user) VALUES('{$nombre}', '{$paterno}', '{$materno}', '{$sexo}', '{$fecha_nac}', '{$domicilio}', 1,'{$fila[0]}')";
					
						if (!$con->query($sql)) {
							echo "Falló la insercion estudiante: (" . $con->errno . ") " . $con->error;
						}
						else{

							$sqlIdEstudiante = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
							$resIdEstudiante = $con->query($sqlIdUser);
							$filaEst = $resIdEstudiante->fetch_array();
							$sqlKardex = "INSERT INTO kardex(reset, gestion, id_rude, id_curso, id_asesor, estado) VALUES(0, ".date('Y').",'{$filaEst[0]}','{$id_curso}',0,1)";
														
								if (!$con->query($sqlKardex)) {
									echo "Falló la insercion a kardex ELSE: (" . $con->errno . ") " . $con->error;
									echo "SQL :".$sqlKardex;
								}
								else{
									echo 1;		
								}
						}	
				}			
			}
		}
	}
	
	$con->close();	
?>