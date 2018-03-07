<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	$titulo="Reportes";
	$contenido="reportes/index.php";
	$subTitulo="Reportes de ventas por fecha";
	$menu_a= $menus['REPORTE_U'];
	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>