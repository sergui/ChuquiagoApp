<?php
	require_once '../../config/route.php';
	// session_start();
	// if (!isset($_SESSION['<us></us>er_login_status']) AND $_SESSION['user_login_status'] != 1) {
 //        header("location: ".ROOT_CONTROLLER.'login/');
	// 	exit;
	// }
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	//Variables para enviar a la plantilla
	$titulo="Modelo citaciones";
	$contenido="citacion/index.php";
	$subTitulo="MODELO CITACION";
	$menu_a= $menus['U_LISTA'];

	if (!($modelo_citaciones = $con->query("SELECT * FROM modelo_citacion where estado = 1" ))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	//$pie_class="si";//Variable donde se poneun pie de pagina estatico	
	require_once ('../../../public/views/plantilla.php');
?>