<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_asesor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">Lista de Docentes </h4>
			</div>
			<div class="modal-body">
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="tbDocente">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Ap. Paterno</th>
								<th>Ap. Materno</th>

								<th class="text-center">ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($docentes as $docente): ?>
							<tr class="gradeX">
								<td>
									<?php echo $docente['nombre']; ?>
								</td>
								<td>
									<?php echo $docente['paterno']; ?>
								</td>
								<td>
									<?php echo $docente['materno']; ?>
								</td>

								<td>
									<button class="btn btn-info" onclick="registro(<?php echo $docente['id_docente']; ?>)" >
       					<span class="fa fa-user"></span> Asignar
    				</button>
									</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$( document ).ready( function () {
		$( "#tbDocente" ).dataTable( {
			"sScrollY": "620px",
			"bPaginate": false
		} );
		
		
		function registro( id ) {
		var idc=2;
        $.ajax( {
            url: '../../models/curso/asignar_asesor_model.php',
            type: 'POST',
            dataType: "json",
            data: {
                id_curso: idc,
                id_asesor: id
            },
            beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if(response==1){
                            
                            $('#modal_asesor').modal('hide');
                            transicionSalir();
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ','success','GUARDAR DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>curso/asesores.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
        } );
    }
	} );
</script>