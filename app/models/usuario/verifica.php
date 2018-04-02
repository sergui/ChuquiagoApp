<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");

	//verificando que se debe comparar
	if(isset($_REQUEST['ci'])){
		$tabla="docente";
		$columna="ci";
		$comparar=$_REQUEST['ci'];
	}else{
		$tabla="usuario";
		$columna="nombre_usuario";
		$comparar=$_REQUEST['nombre_usuario'];
	}
	if(isset($_REQUEST['tipo'])){

		$sql="SELECT * FROM {$tabla} WHERE {$columna} = '{$comparar}' and id_usuario != {$_REQUEST['id_usuario']}";
		if($resultado=$con->query($sql)){
			$nrodefilas=$resultado->num_rows;
			if($nrodefilas == 0)
				echo "true";
			else
				echo "false";
		}
	}else{
		$sql="SELECT * FROM {$tabla} WHERE {$columna} = '{$comparar}'";
		if ($resultado=$con->query($sql)) {
			$nrodefilas=$resultado->num_rows;
			if($nrodefilas == 0)
				echo "true";
			else
				echo "false";
		}
	}
?>