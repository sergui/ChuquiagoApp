<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	$titulo="Reportes";
	$contenido="reporte/index.php";
	$subTitulo="Reporte por curso";
	$menu_a= $menus['R_CURSO'];
	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>