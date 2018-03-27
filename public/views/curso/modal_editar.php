<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">EDITAR CURSO</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <input type="hidden" name="id_curso" id="id_curso" class="form-control" value="">
                    <div class="form-group">
                        <label for="Nombre">NUEVO NOMBRE DEL CURSO</label>
                        <input class=" form-control" id="grado" name="grado" minlength="7 " type="text" required autofocus="true" />
                    </div><br>

                     <div class="form-group">
                        <label for="Nombre">NUEVO NOMBRE DEL PARALELO</label>
                        <input class=" form-control" id="paralelo" name="paralelo" minlength="7 " type="text" required autofocus="true" />
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