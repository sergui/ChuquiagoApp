<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$titulo="Reportes";
	$contenido="reporte/index.php";
	$subTitulo="Reporte por curso";
	$menu_a= $menus['R_CURSO'];
	//$pie_class="si";
	$rol  = $_SESSION['id_rol'];
	$id_user  = $_SESSION['id_user'];
    $id_doc  = $_SESSION['id_docente'];
	if($rol==1 || $rol==5 || $rol==6){
		$sql="SELECT c.id_curso
				, CONCAT(c.grado,' ',c.paralelo) AS curso
				from curso c 
				WHERE c.estado=1 ";
	}else if($rol==2){
		$sql="SELECT c.id_curso
			, CONCAT(c.grado,' ',c.paralelo) AS curso
			, t.id_asignatura
			, a.`nombre_asignatura`
			, a.`sigla`
			FROM curso c
			, asignatura a
			, tiene t
			WHERE c.id_curso=t.id_curso AND t.id_docente={$id_doc} AND c.estado=1
				AND a.`id_asignatura`=t.`id_asignatura`";
	}

	if (!($cursos = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	require_once ('../../../public/views/plantilla.php');
?>