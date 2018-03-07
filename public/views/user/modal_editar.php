<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <div class="form-group">
                        <label for="Nombre">Nombre completo</label>
                        <input class=" form-control" id="name" name="name" minlength="7 " type="text" required autofocus="true" />
                    </div><br>
                    <div class="form-group">
                        <label for="user" class="control-label">nombre de usuario (Obligatorio)</label>
                        <input class="form-control" id="user" type="text" name="user" required  minlength="3" />
                        <input type="hidden" name="id" id="inputId" class="form-control" value="">
                    </div><br>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnReset">Resetear password</button>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditar" id="btnEditar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>