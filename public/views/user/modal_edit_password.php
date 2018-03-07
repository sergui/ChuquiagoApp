<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditarPassword" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Editar mi contraseñ</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditarPassword" name="frmEditarPassword" class="form-horizontal">
                    <div class="form-group">
                        <label for="contraseña" class="control-label col-md-4">Contraseña *(Obligatorio)</label>
                        <div class="col-md-8">
                            <input class="form-control" id="password" type="password" name="password" required  minlength="6" autofocus="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contraseña" class="control-label col-md-4">Repita contraseña</label>
                        <div class="col-md-8">
                            <input class="form-control" id="repeatPaswword" type="password" name="repeatPaswword" required  minlength="6"/>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditarPass" id="btnEditarPass">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>