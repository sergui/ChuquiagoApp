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
	$titulo="Usuarios";
	$contenido="user/index.php";
	$subTitulo="Usuario";
	$menu_a= $menus['U_LISTA'];
	
	if (!($usuarios = $con->query("SELECT * FROM usuario_login where estado = 1 and id_usuario<>{$_SESSION['id_user']} and tipo<>0"))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	//var_dump($usuarios->fetch_assoc());
	$pie_class="si";//Variable donde se poneun pie de pagina estatico	
	require_once ('../../../public/views/plantilla.php');
?>