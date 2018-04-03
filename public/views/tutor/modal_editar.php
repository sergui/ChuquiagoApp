<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Editar Datos Tutor</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input class=" form-control" id="nombres" name="nombres" minlength="3" type="text" required autofocus="true" />
                        <input type="hidden" name="id_tutor" id="id_tutor" class="form-control" value="">
                    </div><br>
                    <div class="form-group">
                        <label for="paterno" class="control-label">Ap. Paterno</label>
                        <input class="form-control" id="paterno" type="text" name="paterno" required  minlength="3" />
                    </div><br>
                    <div class="form-group">
                        <label for="materno" class="control-label">Ap. Materno</label>
                        <input class="form-control" id="materno" type="text" name="materno" required  minlength="3" />
                    </div><br>
                    <div class="form-group">
                        <label for="celular" class="control-label">Celular</label>
                        <input class="form-control" id="celular" type="number" name="celular" required  minlength="8" />
                    </div><br>
                    <div class="form-group">
                        <label for="telefono" class="control-label">Telefono</label>
                        <input class="form-control" id="telefono" type="number" name="telefono" required  minlength="7" />
                    </div><br>
                    <div class="form-group">
                        <label for="domicilio" class="control-label">Domicilio</label>
                        <input class="form-control" id="domicilio" type="text" name="domicilio" required  minlength="5" />
                    </div><br>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditar" id="btnEditar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>