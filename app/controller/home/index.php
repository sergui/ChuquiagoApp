<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	//Variables para enviar a la plantilla son necesarias
	$titulo="Bienvenido";
	$contenido="inicio.php";
	$sub_directory="";
	$menu_a = $menus['INICIO'];
	$subTitulo="Inicio";
	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>