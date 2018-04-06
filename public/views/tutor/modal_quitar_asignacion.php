<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalQuitarAsignacion" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">ELIMINAR ASIGNACION DE ESTUDIANTE</h4>
            </div>
            <div class="modal-body">
                    <form class="cmxform form-horizontal adminex-form" id="frmTutor" name="frmTutor" method="post">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nombres</label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="nombres" name="nombres" minlength="3 " type="text" required autofocus="true" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit" id="btnRegistrar" >Registrar</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

