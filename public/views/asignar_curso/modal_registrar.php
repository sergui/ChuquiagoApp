<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO CURSO DOCENTE ASIGNATURA</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmRegistrar" name="frmRegistrar">
                    <label class="col-md-4 control-label" for="inputSuccess"><strong>Seleccione curso</strong></label>
                    <div class="form-group col-md-8">
                        <select class="chosen-select" id="curso" name="curso" data-placeholder="Seleccione un curso"  required="true">
                            <option value=""></option>
                            <?php foreach ($cursos as $curso): ?>
                                <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['grado'].' '.$curso['paralelo']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br> <br> <br>
                    <label class="col-md-4 control-label" for="inputSuccess"><strong>Seleccione asignatura</strong></label>
                    <div class="form-group col-md-8">
                        <select class="chosen-select" id="asignatura" name="asignatura" data-placeholder="Seleccione una asignatura"  required="true">
                            <option value=""></option>
                            <?php foreach ($asignaturas as $asignatura): ?>
                                <option value="<?php echo $asignatura['id_asignatura']; ?>"><?php echo $asignatura['nombre_asignatura'].' '.$asignatura['sigla']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br> <br> <br>
                    <label class="col-md-4 control-label" for="inputSuccess"><strong>Seleccione docente</strong></label>
                    <div class="form-group col-md-8">
                        <select class="chosen-select" id="docente" name="docente" data-placeholder="Seleccione un  docente"  required="">
                            <option value=""></option>
                            <?php foreach ($docentes as $docente): ?>
                                <option value="<?php echo $docente['id_docente']; ?>"><?php echo $docente['nombre'].' '.$docente['paterno']; ?></option>
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