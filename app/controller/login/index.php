<?php
	require_once '../../config/db.php';
	require_once '../../config/route.php';
	require_once '../../models/login/Login.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}

	$mlogin = new Login();
	//Variables para enviar a la plantilla
	$titulo="Identificate";
	if ($mlogin->estaConectado() == true)
		header("location: ".ROOT);
	else{
		require_once ('../../../public/views/login/index.php');
	}
?>