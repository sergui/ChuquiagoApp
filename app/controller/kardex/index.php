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
    $rol  = $_SESSION['id_rol'];
	$menu_a= $menus['C_KARDEX'];
	if($rol==1 || $rol==5 || $rol==6){
		$sql="SELECT * FROM  docente as d LEFT JOIN tiene as t on d.id_docente = t.id_docente LEFT JOIN curso as c on c.id_curso = t.id_curso WHERE d.id_user = {$id_user}";
	}else if($rol==2){
		$sql="SELECT * FROM  docente as d LEFT JOIN tiene as t on d.id_docente = t.id_docente LEFT JOIN curso as c on c.id_curso = t.id_curso WHERE d.id_user = {$id_user}";
	}

	if (!($cursos = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	require_once ('../../../public/views/plantilla.php');
?>