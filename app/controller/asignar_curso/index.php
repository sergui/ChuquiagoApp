<?php
	require_once '../../config/route.php';
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	//Variables para enviar a la plantilla
	$titulo="Asignar un Curso";
	$contenido="asignar_curso/index.php";
	$menu_a= $menus['C_SECCION'];
	$subTitulo="ASIGNAR CURSO";
	$sql="SELECT * from docente where estado=1 and id_user<>1";
	if (!($docentes = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	$con=conectar();
	$sql="SELECT * from asignatura where estado=1 ";
	if (!($asignaturas = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	$con=conectar();
	$sql="SELECT * from curso where estado=1 ";
	if (!($cursos = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	$con=conectar();
	if (!($tienes = $con->query("SELECT d.nombre
						, d.paterno
						, d.materno
						, a.nombre_asignatura
						, c.grado
						, c.paralelo
						, t.id_curso
						, t.id_asignatura
						, t.id_docente
						FROM
						 docente d,
						 asignatura a,
						 curso c,
						 tiene t
						WHERE t.id_curso=c.id_curso 
							AND t.id_asignatura = a.id_asignatura
							AND t.id_docente = d.id_docente"))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>