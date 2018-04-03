<?php
	require_once '../../config/db.php';
	require_once '../../config/route.php';
	require_once '../../models/login/Login.php';

	$mlogin = new Login();
	//Variables para enviar a la plantilla
	$titulo="Identificate";
	if ($mlogin->estaConectado() == true)
		header("location: ".ROOT);
	else{
		require_once ('../../../public/views/login/index.php');
	}
?>