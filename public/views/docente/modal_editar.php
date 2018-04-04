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
                    <input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="">
                    <div class="form-group">
                        <label for="Nombre">NOMBRE</label>
                        <input class=" form-control" id="nombre" name="nombre" minlength="3" type="text" required autofocus="true" />
                    </div>
                      <div class="form-group">
                        <label for="Nombre">APELLIDO PATERNO</label>
                        <input class=" form-control" id="paterno" name="paterno" minlength="3" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">APELLIDO MATERNO</label>
                        <input class=" form-control" id="materno" name="materno" minlength="3" type="text"/>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">NRO. CELULAR</label>
                        <input class="form-control" id="celular" name="celular" minlength="7" type="tel" required />
                    </div>
                    <div class="form-group">
                        <label for="Nombre">NOMBRE USUARIO:</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" value="" placeholder="" maxlength="15" minlength="3" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">ROL:</label>
                        <select name="id_rol" class="form-control" id="id_role">
                            <option value="">SELECCIONE UN ROL</option>
                            <?php foreach ($roles as $rol): ?>
                                <option value="<?php echo $rol['id_rol']?>"><?php echo $rol['nombre']?></option>
                            <?php endforeach ?>
                        </select>
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