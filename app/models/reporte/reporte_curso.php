 <?php
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_curso'];
    $sql="SELECT tk.nombre_completo, COUNT(f.`id_kardex`)AS cantidad_faltas
			FROM
			(SELECT k.`id_kardex`,
			CONCAT (e.`nombre`,' ',e.`paterno`,' ',e.`materno`) nombre_completo
			FROM kardex k , estudiante e
			WHERE k.`id_rude`=e.`id_rude`
			AND k.`id_curso`= {$id}
			AND k.`gestion`=2018
			AND e.`estado`=1)tk
			LEFT JOIN faltas_cometidas f ON tk.`id_kardex`=f.`id_kardex`
			GROUP BY tk.id_kardex";
    $reporte = $con->query($sql);
    $con->close();
    session_start();
	$labels=array();
	$barra=array();
    foreach ($reporte as $mreporte) {
    	array_push($labels,$mreporte['nombre_completo']);
    	array_push($barra,$mreporte['cantidad_faltas']);
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
          			label: "Population (millions)",
          			
          			data: <?php echo json_encode($barra, JSON_NUMERIC_CHECK); ?>
        		}
      		]
    	},
    	options: {
      		legend: { display: false },
      		title: {
        		display: true,
        		text: 'Cantidad de faltas poralumno gestion 2018'
      		}
    	}
	});
</script>