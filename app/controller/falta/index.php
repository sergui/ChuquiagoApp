
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
	$titulo="Faltas";
	$contenido="falta/index.php";
	$menu_a= $menus['C_FALTA'];
	$subTitulo="FALTAS";
	
	if (!($faltas = $con->query("SELECT id_falta,
									CASE tipoFalta WHEN '1' THEN 'Leve' WHEN '2' THEN 'Grave' END AS tipoFalta
									,descripcion
									FROM faltas
									WHERE estado=1"))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$con->close();
	//$pie_class="si";
	require_once ('../../../public/views/plantilla.php');
?>