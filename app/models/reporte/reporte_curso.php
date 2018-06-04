 <?php
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_curso'];
    $sql="SELECT tk.nombre_completo, COUNT(f.`id_kardex`)AS cantidad_faltas,
			COUNT(c.`id_kardex`) AS nro_citacion
			FROM
			(SELECT k.`id_kardex`,
			CONCAT (e.`nombre`,' ',e.`paterno`,' ',e.`materno`) nombre_completo
			FROM kardex k , estudiante e
			WHERE k.`id_rude`=e.`id_rude`
			AND k.`id_curso`= {$id}
			AND k.`gestion`=2018
			AND e.`estado`=1)tk
			LEFT JOIN faltas_cometidas f ON tk.`id_kardex`=f.`id_kardex`
			LEFT JOIN citacion c ON c.`id_kardex`=tk.id_kardex
			GROUP BY tk.id_kardex";
    $reporte = $con->query($sql);
    $con->close();
    session_start();
	$labels=array();
	$nrofaltas=array();
	$nrocitacion=array();
    foreach ($reporte as $mreporte) {
    	array_push($labels,$mreporte['nombre_completo']);
    	array_push($nrofaltas,$mreporte['cantidad_faltas']);
    	array_push($nrocitacion,$mreporte['nro_citacion']);
    	//echo "<pre>"; print_r ($mreporte);	echo "</pre>";
    }
    //echo "<pre>"; print_r ($labels);	echo "</pre>";

?>

<canvas id="bar-chart-horizontal" width="800" height="750"></canvas>
<script>
	var barrasVerticales =$("#bar-chart-horizontal");
	var grBarras = new Chart(barrasVerticales, {
    	type: 'horizontalBar',
    	data: {
      		labels: <?php echo json_encode($labels, JSON_NUMERIC_CHECK); ?>,
      		datasets: [
        		{
          			label: "Faltas",
          			backgroundColor:"#3e95cd",
          			data: <?php echo json_encode($nrofaltas, JSON_NUMERIC_CHECK); ?>
        		},
        		{
          			label: "Citaciones",
          			backgroundColor:"#c45850",
          			data: <?php echo json_encode($nrocitacion, JSON_NUMERIC_CHECK); ?>
        		}
      		],
    	},
    	options: {
      		legend: {
      			display: true ,
      			position: 'right'
      		},
      		responsive: true,
      		title: {
        		display: true,
        		text: 'CANTIDAD DE FALTAS POR CURSO GESTION 2018'
      		},
    	}
	});
</script>