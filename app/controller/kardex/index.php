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
    $id_doc  = $_SESSION['id_docente'];
    $rol  = $_SESSION['id_rol'];
	$menu_a= $menus['C_KARDEX'];
	if($rol==1 || $rol==5 || $rol==6){
		$sql="";
	}else if($rol==2){
		$sql="SELECT c.id_curso
				, CONCAT(c.grado,' ',c.paralelo) AS curso
				, t.id_asignatura
			FROM curso c
			, tiene t
			WHERE c.id_curso=t.id_curso AND t.id_docente={$id_doc}";
	}

	if (!($cursos = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	require_once ('../../../public/views/plantilla.php');
?>