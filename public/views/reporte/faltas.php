<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Reporte 5 faltas mas cometidas
                </div>
            </header>
            <div class="panel-body">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
        </section>
    </div>
</div>
<script>
window.onload = function() {

	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		title: {
			text: "5 Faltas mas cometidas"
		},
		data: [{
			type: "pie",
			startAngle: 240,
			yValueFormatString: "##0\"\"",
			indexLabel: "{label} {y}",
			dataPoints: <?php echo json_encode($ndatos); ?>
		}]
	});
	chart.render();

	}
</script>
