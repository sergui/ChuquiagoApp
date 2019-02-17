<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">EDITAR DATOS DEL ESTUDIANTE</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmEditar" name="frmEditar">
                    <input type="hidden" name="id_rude" id="id_rude" class="form-control" value="">
                    
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input class=" form-control" id="nombre" name="nombre" minlength="7 " type="text" required autofocus="true" />
                    </div>
                    
                    <div class="form-group">
                        <label for="Nombre">Apellido paterno</label>
                        <input class=" form-control" id="paterno" name="paterno" minlength="7 " type="text" required autofocus="true" />
                    </div>
                    
                    <div class="form-group">
                        <label for="Nombre">Apellido materno</label>
                        <input class=" form-control" id="materno" name="materno" minlength="7 " type="text" required autofocus="true" />
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label">editar Fecha  de nacimiento:</label>
                        <div data-date-viewmode="date" data-date="<?php echo date('d/m/Y'); ?>"  class="input-append date cFecha">
                            <input type="text" readonly="" value="" size="16" class="form-control" name="fecha_nac" id="fecha_nac">
                            <span class="input-group-lg add-on">
                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </div> -->

                     <div class="form-group">
                        <label for="Nombre">editar sexo</label>
                        <input class=" form-control" id="sexo" name="sexo" minlength="7 " type="text" required autofocus="true" />
                    </div>

                       <div class="form-group">
                        <label for="Nombre">editar domicilio</label>
                        <input class=" form-control" id="domicilio" name="domicilio" type="text" />
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