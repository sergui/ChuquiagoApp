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
	$contenido="reporte/faltas.php";
	$subTitulo="Reporte de faltas";
	$menu_a= $menus['R_FALTA'];
	//$pie_class="si";
	$sql="SELECT f.`descripcion`,
			COUNT(fc.`id_falta`)AS cantidad
			FROM faltas f LEFT JOIN faltas_cometidas fc
			ON f.`id_falta` = fc.`id_falta`
			GROUP BY f.`id_falta`
			ORDER BY COUNT(fc.`id_falta`) DESC
			LIMIT 5";
	if (!($max_faltas = $con->query($sql))) {
    	echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
	}
	$datos=array();
	$labels=array();
	$ndatos=array();
    foreach ($max_faltas as $mreporte) {
    	$aux=array('y' => $mreporte['cantidad'], 'label'=>$mreporte['descripcion']);
    	array_push($ndatos,$aux);
    	array_push($labels,$mreporte['descripcion']);
    	array_push($datos,$mreporte['cantidad']);
    }
    //echo "<pre>";  print_r (json_encode($ndatos));   echo "</pre>";
	require_once ('../../../public/views/plantilla.php');
?>