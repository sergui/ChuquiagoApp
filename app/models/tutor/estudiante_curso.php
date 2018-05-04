<?php
require_once( "../../config/db.php" );
require_once( "../../config/conexion.php" );
require_once( "../../config/route.php" );

$idc = $_REQUEST[ "id_curso" ];
$idt = $_REQUEST[ "id_tutor" ];
//echo "<pre>";		echo "</pre>";
$sql = "call listadelCurso({$idc},{$idt})";

$lista = $con->query( $sql );

?>
<div class="adv-table">
	<table class="display table table-bordered table-striped" id="tbtutormodal">
		<thead>
			<tr>
				<th class="col-md-7">Nombre</th>
				<th class="text-center col-md-4">Seleccione</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista as $estudiante): ?>
				<?php //echo "<pre>";	print_r ($estudiante);	echo "</pre>"; ?>
			<tr class="gradeX">
				<td>
					<?php echo $estudiante['nombre_completo']; ?>
				</td>
				<td><?php if ($estudiante['id_tutor']==-1): ?>
					<button class="btn btn-info" onclick="registro(<?php echo $estudiante['id_rude']; ?>)" >
       					<span class="fa fa-user"></span> Adicionar
    				</button>
				<?php else: ?>
					Asignado
				<?php endif; ?>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div><br>
<span class="pull-right">
    <a href="#" class="btn btn-success" id="btnTerminar">
        <span class="fa fa-times"></span>Terminar
	</a>
</span>
<script>
	$( document ).ready( function () {
		$( "#tbtutormodal" ).dataTable( {
			"sScrollY": "220px",
			"bPaginate": false
		} );
		$("#btnTerminar").click(function(event) {
			$('#modal_Registrar').modal('hide');
			setTimeout(function(){
                window.location.href='<?php echo ROOT_CONTROLLER ?>tutor/index.php';
            }, 1000);
		});
	} );
</script>