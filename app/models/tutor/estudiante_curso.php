<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$id=$_REQUEST["id_curso"];
	//echo "<pre>";		echo "</pre>";
	$sql="call listadelCurso({$id})";
	$lista = $con->query($sql)

?>
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
                <td><input type="checkbox" id="" name="ids[]" value="<?php echo $estudiante['id_rude']; ?>"></td>
        	</tr>
        <?php endforeach;?>
	</tbody>
</table>
<script>
	$(document).ready(function() {
		$("#tbtutormodal").dataTable();
	});

</script>