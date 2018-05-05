<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['<us></us>er_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	//Variables para enviar a la plantilla
	$titulo="Roles de usuarios";
	$contenido="user/roles_usuario.php";
	$subTitulo="Roles de usuario";
	$menu_a= $menus['C_ROL'];

	if (!($roles = $con->query("SELECT * FROM roles where estado = 1 "))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}

	//$pie_class="si";//Variable donde se poneun pie de pagina estatico
	require_once ('../../../public/views/plantilla.php');
?>