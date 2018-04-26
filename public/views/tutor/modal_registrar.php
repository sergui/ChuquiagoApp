
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">REGISTRO DE NUEVO TUTOR</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<form class="cmxform form-horizontal adminex-form" id="frmTutor" name="frmTutor" method="post">
							<div class="form-group ">
								<label for="cname" class="control-label col-lg-4">Nombres</label>
								<div class="col-lg-8">
									<input class=" form-control" id="nombres" name="nombres" minlength="3 " type="text" required autofocus="true"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="paterno" class="control-label col-lg-4">Ap. Paterno</label>
								<div class="col-lg-8">
									<input class="form-control " id="paterno" type="text" name="paterno" minlength="3"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="materno" class="control-label col-lg-4">Ap. Materno</label>
								<div class="col-lg-8">
									<input class="form-control " id="materno" type="text" name="materno" minlength="3"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="celular" class="control-label col-lg-4">Celular</label>
								<div class="col-lg-8">
									<input class="form-control " id="celular" type="number" name="celular" required minlength="8"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="telefono" class="control-label col-lg-4">Telefono</label>
								<div class="col-lg-8">
									<input class="form-control " id="telefono" type="number" name="telefono"  minlength="8"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="domicilio" class="control-label col-lg-4">Domicilio</label>
								<div class="col-lg-8">
									<input class="form-control " id="domicilio" type="text" name="domicilio" required minlength="5"/>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-primary" type="submit" id="btnRegistrar">Registrar</button>
								</div>
							</div>
							<input type="hidden" name="id_tutorV"  id="id_tutorV" value="">
						</form>
					</div>
					<div class="col-md-6">
						<span class="pull-right hide" id="btlis">
							<label class="control-label col-lg-6" for="inputSuccess">Seleccione curso</label>
		                    <div class="col-lg-6">
		                        <select class="chosen-select" id="id_curso" name="id_curso" data-placeholder="Seleccione un curso"  required="">
		                            <option value=""></option>
		                            <?php foreach ($cursos as $curso): ?>
		                                <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['grado'].' '.$curso['paralelo']; ?></option>
		                            <?php endforeach ?>
		                        </select>
		                    </div>
							<div id="tabla_estudiante"> </div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>