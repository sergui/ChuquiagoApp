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
		</section>
	</div>
</div>
<script>
	function curso(idcurso){
		$('#cursoid').val(idcurso);
	}
	
	$( document ).ready( function () {
		$( "#tbDocente" ).dataTable();
	} );
</script>