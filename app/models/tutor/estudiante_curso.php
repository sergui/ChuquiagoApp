<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	$id=$_REQUEST["id_curso"];
	//echo "<pre>";		echo "</pre>";
	$sql="call listadelCurso({$id})";
	$lista = $con->query($sql)

?>
<table class="display table table-bordered table-striped" id="tbtutor">
	<thead>
		<tr>
			<th>Nombre</th>

			<th class="text-center col-md-4">Seleccione</th>
			
		</tr>
	</thead>
	<tbody>

		
			 <?php foreach ($lista as $estudiante): ?>
                                <tr class="gradeX">
                                    <td><?php echo $estudiante['nombre']; ?></td>
                                    <td>    
     
        									<input type="checkbox" id="hijo" value="option1"> 
  </td>
                                    
                                    
                            </tr>
               <?php endforeach;?>
		

	</tbody>
</table>