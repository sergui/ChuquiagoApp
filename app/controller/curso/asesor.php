<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	//Variables para enviar a la plantilla
	$titulo="Lista de cursos y asesores";
	$contenido="curso/asesor.php";
    $subTitulo="Asignar Asesor";
    $id_user  = $_SESSION['id_user'];
	$menu_a= $menus['UE_CURSO_ASESOR'];

	if (!($lista = $con->query("call asignar_asesor(); "))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}

	$con->close();
	$con=conectar();
	$sql="SELECT d.id_docente,d.ci
			,d.nombre
			,d.paterno
			,d.materno
			,d.materno
			,d.celular
			,u.nombre_usuario,u.id_usuario
			,r.nombre AS nombre_rol, r.id_rol
			FROM docente d, usuario u, roles r
			WHERE d.id_user=u.id_usuario AND u.id_rol=r.id_rol
			AND d.estado=1 AND d.id_user != {$_SESSION['id_user']};";
			//echo $sql;
	if (!($docentes = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	require_once ('../../../public/views/plantilla.php');
?>