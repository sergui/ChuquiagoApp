<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$id=$_REQUEST["id_curso"];
	//echo "<pre>";	print_r ($variable);	echo "</pre>";
	//$sql=
?>
<table class="display table table-bordered table-striped" id="tbtutor">
	<thead>
		<tr>
			<th>Nombre</th>

			<th class="text-center col-md-4">ACCIONES</th>
		</tr>
	</thead>
	<tbody>

		<tr class="gradeX">
			<td><?php echo $id; ?></td>


			<td>
				<a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="">
                 <span class="fa fa-edit" ></span>
                 </a>
			</td>
		</tr>

	</tbody>
</table>