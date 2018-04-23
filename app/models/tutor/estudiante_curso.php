<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$id=$_REQUEST["id_curso"];
	//echo "<pre>";		echo "</pre>";
	$sql="call listadelCurso({$id})";
	$lista = $con->query($sql)

?>
<div class="adv-table" >
<table class="display table table-bordered table-striped" id="tbtutormodal">
	<thead>
		<tr>
			<th class="col-md-7" >Nombre</th>
			<th class="text-center col-md-4">Seleccione</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $estudiante): ?>
            <tr class="gradeX">
                <td><?php echo $estudiante['nombre_completo']; ?></td>
                <td><a href="#" class="btn btn-info" >
       				 <span class="fa fa-user"></span> Adicionar
    				</a>
    			</td>
        	</tr>
        <?php endforeach;?>
	</tbody>
</table>

</div>
<span class="pull-right">
    <a href="#" class="btn btn-success" >
        <span class="fa fa-times"></span> Terminar
    </a>
</span>
<script>
	$(document).ready(function() {
		$("#tbtutormodal").dataTable({
			"sScrollY":"220px",
			"bPaginate":false
		});
	});

</script>