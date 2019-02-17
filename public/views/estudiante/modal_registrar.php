<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO DE NUEVO ESTUDIANTE</h4>
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

                     <!-- <div class="form-group">
                        <label class="control-label">Fecha  de nacimiento:</label>
                        <div data-date-viewmode="date" data-date="<?php echo date('d/m/Y'); ?>"  class="input-append date cFecha">
                            <input type="text" readonly="" value="" size="16" class="form-control" name="fecha_nac" id="fecha_nac">
                            <span class="input-group-lg add-on">
                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="Nombre">Sexo</label>
                        <div class="radio">
                        <label><input type="radio" name="sexo" id="sexom" value="masculino">Masculino</label><br>
                        <label><input type="radio" name="sexo" id="sexof" value="femenino">Femenino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Nombre">Domicilio</label>
                        <input class=" form-control" id="domicilio" name="domicilio" type="text" />
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

