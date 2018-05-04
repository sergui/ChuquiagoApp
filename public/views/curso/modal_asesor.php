<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_asesor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">Lista de Docentes</h4>
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
									<a href="#" class="btn btn-success" id="btnAsignar">
        								<span class="fa fa-pencil"></span>Asignar
									</a>
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