<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$titulo="Mi cuenta";
	$contenido="user/perfil.php";
	$subTitulo="Cuenta";
	$sub_directory="";
	$menu_a= array();
	$menu_a= $menus['PERFIL'];
	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>