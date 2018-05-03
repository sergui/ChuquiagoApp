<?php
require_once( "../../config/db.php" );
require_once( "../../config/conexion.php" );
require_once( "../../config/route.php" );

$idc = $_REQUEST[ "id_curso" ];
$idt = $_REQUEST[ "id_tutor" ];
//echo "<pre>";		echo "</pre>";
//$sql = "call listadelCurso({$id})";
$sql = "SELECT tmpcurso.*,tmpestudiante.*
		FROM
			(SELECT 
			    CONCAT(
			      e.nombre,
			      ' ',
			      e.paterno,
			      ' ',
			      e.materno
			    ) AS nombre_completo,
			    e.sexo,
			    e.fecha_nac,
			    e.id_rude 
			  FROM
			    estudiante e,
			    curso c,
			    kardex k 
			  WHERE c.id_curso = k.id_curso 
			    AND e.id_rude = k.id_rude 
			    AND c.id_curso = {$idc} )tmpcurso
			LEFT JOIN (SELECT * FROM encargado WHERE id_tutor={$idt})tmpestudiante
		ON tmpcurso.id_rude = tmpestudiante.id_rude";
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
			<tr class="gradeX">
				<td>
					<?php echo $estudiante['nombre_completo']; ?>
				</td>
				<td><?php if (isset($estudiante['id_rude'])): ?>
					<button class="btn btn-info" onclick="registro(<?php echo $estudiante['id_rude']; ?>)" disabled="true">
       					<span class="fa fa-user"></span> Adicionar
    				</button>
				<?php endif; ?>
					<button class="btn btn-info" onclick="registro(<?php echo $estudiante['id_rude']; ?>)">
       					<span class="fa fa-user"></span> Adicionar
    				</button>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<span class="pull-right">
    <a href="#" class="btn btn-success" id="variable">
        <span class="fa fa-times"></span>Terminar
	</a>
</span>
<script>
	$( document ).ready( function () {
		$( "#tbtutormodal" ).dataTable( {
			"sScrollY": "220px",
			"bPaginate": false
		} );
	} );

	function registro( id ) {
		var idt=$("#id_tutorV").val();
		$.ajax( {
			url: '../../models/tutor/registro_encargado.php',
			type: 'POST',
			dataType: "json",
			data: {
				id_tutor: idt,
				id_rude: id
			},
			success: function ( datos ) {
				var idt=$("#id_tutorV").val();
	            var miid=$("#id_curso").val();
	            $("#tabla_estudiante").load("../../models/tutor/estudiante_curso.php?id_curso="+miid+"&id_tutor="+idt);
				if ( datos == 1 ) {
					$(this).attr( 'disabled', 'true' );
					mensajes_alerta_pequeño( 'Se adiciono correctamente !! ', 'success', 'Adición' );
				} else {
					transicionSalir();
					mensajes_alerta_pequeño( 'Error al adicionar verifique los datos!! ' + response, 'error', 'Adición' );
				}

			}
		} );
	}
</script>