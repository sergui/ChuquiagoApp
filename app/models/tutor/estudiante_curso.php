<?php
require_once( "../../config/db.php" );
require_once( "../../config/conexion.php" );
require_once( "../../config/route.php" );

$id = $_REQUEST[ "id_curso" ];
//echo "<pre>";		echo "</pre>";
$sql = "call listadelCurso({$id})";
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
				<td><button class="btn btn-info" onclick="registro(<?php echo $estudiante['id_rude']; ?>)">
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
        <span class="fa fa-times"></span>
					Terminar
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
		$.ajax( {
			url: '../../models/tutor/registroencargado.php',
			type: 'POST',
			dataType: "json",
			data: {
				id_tutor: idt,
				id_rude: id
			},
			success: function ( datos ) {
				if ( response == 1 ) {
					$( '#btnHijo' ).attr( {
						disabled: 'true'
					} );

					$( '#btlis' ).removeClass( 'hidden' );

					mensajes_alerta( 'DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS' );

				} else {
					transicionSalir();
					mensajes_alerta( 'ERROR AL REGISTRAR EL TUTOR  verifique los datos!! ' + response, 'error', 'GUARDAR DATOS' );
				}

			}
		} );
	}
	//registroencargado
</script>