<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO DE NUEVO DOCENTE</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmRegistrar" name="frmRegistrar">
                    <div class="form-group">
                        <label for="Nombre">C.I.:</label>
                        <input class="form-control" id="ci" name="ci" type="text" required="true" />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">NOMBRES:</label>
                        <input class="form-control" id="nombre" name="nombre" type="text" required="true" />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">APELLIDO PATERNO:</label>
                        <input class=" form-control" id="paterno" name="paterno" type="text" required="true" />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">APELLIDO MATERNO:</label>
                        <input class="form-control" id="materno" name="materno" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">NRO. CELULAR:</label>
                        <input type="tel" name="celular" id="celular" value="" placeholder="" maxlength="8" minlength="7" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">NOMBRE USUARIO:</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" value="" placeholder="" maxlength="15" minlength="3" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">ROL:</label>
                        <select name="id_rol" class="form-control" id="id_rol">
                            <option value="">Seleccione un rol</option>
                            <?php foreach ($roles as $rol): ?>
                            <option value="<?php echo $rol['id_rol']?>"><?php echo $rol['nombre']?></option>
                            <?php endforeach ?>
                        </select>
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