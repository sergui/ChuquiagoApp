<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_asesor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">Lista de Docentes </h4>
			</div>
			<div class="panel-body">
				<div class="modal-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tb-Docente">
							<thead>
								<tr>
									<th class="col-md-7">Nombre completo</th>
									<th class="col-md-5">ACCIONES</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($docentes as $docente): ?>
								<tr class="gradeX">
									<td>
										<?php echo $docente['nombre'].' '.$docente['paterno'].' '.$docente['materno']; ?>
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
					<input type="hidden" name="cursoid"  id="cursoid" value="">
				</div>
			</div>
		</div>
	</div>
</div>