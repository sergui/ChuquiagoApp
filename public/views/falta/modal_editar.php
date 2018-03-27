<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">EDITAR FLATAS</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <input type="hidden" name="id_seccion_modificar" id="id_seccion_modificar" class="form-control" value="">
                    <div class="form-group">
                        <label for="Nombre">NUEVO TIPO DE FALTA</label>
                        <input class=" form-control" id="tipoFalta" name="tipoFalta" minlength="7 " type="text" required autofocus="true" />
                    </div><br>

                     <div class="form-group">
                        <label for="Nombre">CAMBIAR FECHA</label>
                        <input class=" form-control" id="fecha" name="fecha" minlength="7 " type="text" required autofocus="true" />
                    </div><br>
					<div class="form-group">
                        <label for="Nombre">CAMBIAR LA OBSERVACION</label>
                        <input class=" form-control" id="observaciones" name="observaciones" minlength="7 " type="text" required autofocus="true" />
                    </div><br>
                 
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditar" id="btnEditar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>observaciones