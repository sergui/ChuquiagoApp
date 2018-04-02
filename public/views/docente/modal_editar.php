<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">EDITAR DATOS DEL DOCENTE</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <input type="hidden" name="id_docente" id="id_docente" class="form-control" value="">
                    <div class="form-group">
                        <label for="Nombre">Editar nombre</label>
                        <input class=" form-control" id="nombre" name="nombre" minlength="7 " type="text" required autofocus="true" />
                    </div>
                      <div class="form-group">
                        <label for="Nombre">Editar apellido paterno</label>
                        <input class=" form-control" id="paterno" name="paterno" minlength="7 " type="text" required autofocus="true" />
                    </div>
                      <div class="form-group">
                        <label for="Nombre">Editar apellido materno</label>
                        <input class=" form-control" id="materno" name="materno" minlength="7 " type="text" required autofocus="true" />
                    </div>
                      <div class="form-group">
                        <label for="Nombre">Editar celular</label>
                        <input class=" form-control" id="celular" name="celular" minlength="7 " type="text" required autofocus="true" />
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