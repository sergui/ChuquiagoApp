
<?php
	require_once '../../config/route.php';
	/*session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ".ROOT_CONTROLLER.'login/');
		exit;
	}*/
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	//Variables para enviar a la plantilla
	$titulo="Faltas maximas";
	$contenido="pfaltas/index.php";
	$menu_a= $menus['C_SECCION'];
	$subTitulo="Configuracion de faltas maximas";
	
	if (!($asignaturas = $con->query("SELECT * FROM pfaltas"))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}

	$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>