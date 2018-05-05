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
	$titulo="Registro de Faltas Cometidas";
	$contenido="kardex/index.php";
    $subTitulo="Registro de faltas cometidas";
    $id_user  = $_SESSION['id_user'];
	$menu_a= $menus['C_KARDEX'];

	if (!($cursos = $con->query("SELECT * FROM  docente as d LEFT JOIN tiene as t on d.id_docente = t.id_docente LEFT JOIN curso as c on c.id_curso = t.id_curso WHERE d.id_user = {$id_user} "))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	require_once ('../../../public/views/plantilla.php');
?>