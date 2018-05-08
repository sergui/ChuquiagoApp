<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO DE FALTA</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmRegistrar" name="frmRegistrar">
                    <input type="hidden" name="id_curso" id="id_curso" class="form-control" value="">
                    <div class="form-group">
                        <label for="Nombre">Nombre(s)</label>
                        <input class=" form-control" id="nombre" name="nombre" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Apellido Paterno</label>
                        <input class=" form-control" id="paterno" name="paterno" type="text" />
                    </div>

                    <div class="form-group">
                        <label for="Nombre">Apellido Materno</label>
                        <input class=" form-control" id="materno" name="materno" type="text" />
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnRegistrar" >Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>