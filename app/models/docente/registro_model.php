<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$ci   = trim($_POST["ci"]);
	$nombre   = trim($_POST["nombre"]);
    $paterno  = trim($_POST["paterno"]);
    $materno  = trim($_POST["materno"]);
    $celular  = trim($_POST["celular"]);
    $nom_user = trim($_POST["nombre_usuario"]);
    $contrasenia= password_hash($ci, PASSWORD_DEFAULT);
    $rol= trim($_POST["id_rol"]);
    //$id_user  = trim($_POST["id_user"]);
	$sqluser="INSERT INTO usuario(nombre_usuario, password,id_rol) VALUES('{$nom_user}', '{$contrasenia}', '{$rol}')";
	if (!$con->query($sql)) {
		echo "Falló la insercion:  usuario(" . $con->errno . ") " . $con->error;
		exit;
	}
	$con->close();
	$con=conectar();
	$sqlunuser="SELECT id_usuario FROM usuario where nombre_usuario='{$nom_user}'"
	if (!($usuariox = $con->query($sqlunuser))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
    	exit;
	}
	$idusu="";
	foreach ($usuariox as $usu) {
		$idusu=$usu['id_usuario'];
	}
	$sql = "INSERT INTO docente(nombre, paterno, materno, celular) VALUES('{$nombre}', '{$paterno}', '{$materno}', '{$celular}')";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
	$con->close();
?>