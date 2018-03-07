<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Editar mi nombre de usuario</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditarUser" name="frmEditarUser" class="form-horizontal">
                    <div class="form-group">
                        <label for="user" class="control-label col-md-4">nombre de usuario *(Obligatorio)</label>
                        <div class="col-md-8">
                            <input class="form-control" id="user" type="text" name="user" required  minlength="3" value="<?php echo $_SESSION['user_name']; ?>" />
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditarUser" id="btnEditarUser">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>