<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="row panel-heading">
					LISTA ASESORES
				</div>
			</header>
			<div class="panel-body">
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="tbAsesores">
						<thead>
							<tr>
								<th>Cursos</th>
								<th>ACCION</th>
								<th class="text-center">ASESOR</th>
								<th>GESTION</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($lista as $lista_asesor): ?>
							<tr class="gradeX">
								<td>
									<?php echo $lista_asesor['Cursos']; ?>
								</td>

								<td>
									<?php if ($lista_asesor['id_asesor']==-1): ?>
									
								
       					<a href="#modal_asesor" class="btn btn-xs btn-success" onClick="curso(<?php echo $lista_asesor['id_curso']; ?>)" data-toggle="modal">
                            <span class="fa fa-user"></span> Adicionar
                        </a>
    										

									<?php else: ?> Asignado
									<?php endif; ?>
								</td>

								<td>
									<?php echo $lista_asesor['nombre_completo']; ?>
								</td>

								<td>

									<?php echo $lista_asesor['gestion']; ?>
								</td>
							</tr>
							<?php endforeach ?>

						</tbody>
					</table>
				</div>
			</div>
			<?php require_once 'modal_asesor.php'; ?>
			<?php require_once 'modal_registrar.php'; ?>
			<?php require_once 'modal_eliminar.php'; ?>
			<?php require_once 'modal_editar.php'; ?>
		</section>
	</div>
</div>
<script>
	function curso(idcurso){
		$('#cursoid').val(idcurso);
	}
	
	$( document ).ready( function () {
		$( "#tbDocente" ).dataTable();
		/*$( "#frmRegistrar" ).validate( {
			debug: true,
			rules: {
				nombre_usuario: {
					required: true,
					minlength: 3,
					remote: {
						url: "../../models/usuario/verifica.php",
						type: 'post',
						data: {
							nombre_usuario: function () {
								return $( "#nombre_usuario" ).val();
							}
						}
					}
				},
				ci: {
					required: true,
					minlength: 5,
					remote: {
						url: "../../models/usuario/verifica.php",
						type: 'post',
						data: {
							ci: function () {
								return $( "#ci" ).val();
							}
						}
					}
				}
			},
			messages: {
				nombre_usuario: {
					remote: "Debe elegir otro nombre de usuario.",
				},
				ci: {
					remote: "El numero de C.I. ya esta registrado verifique",
				},
			},
			submitHandler: function ( form ) {
				$.ajax( {
					url: '../../models/docente/registro_model.php',
					type: 'post',
					data: $( "#frmRegistrar" ).serialize(),
					beforeSend: function () {
						transicion( "Procesando Espere...." );
					},
					success: function ( response ) {
						if ( response == 1 ) {
							$( '#btnRegistrar' ).attr( {
								disabled: 'true'
							} );
							$( '#modal_Registrar' ).modal( 'hide' );
							transicionSalir();
							mensajes_alerta( 'DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS' );
							setTimeout( function () {
								window.location.href = '<?php echo ROOT_CONTROLLER ?>docente/index.php';
							}, 3000 );
						} else {
							transicionSalir();
							mensajes_alerta( 'ERROR AL REGISTRAR verifique los datos!! ' + response, 'error', 'GUARDAR DATOS' );
						}
					}
				} );
			}
		} );*/
	
		
	} );
</script>