<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO DE NUEVO TUTOR</h4>
            </div>
            <div class="modal-body">
                    <form class="cmxform form-horizontal adminex-form" id="frmTutor" name="frmTutor" method="post">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nombres</label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="nombres" name="nombres" minlength="3 " type="text" required autofocus="true" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="paterno" class="control-label col-lg-2">Ap. Paterno</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="paterno" type="text" name="paterno" required  minlength="3" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="materno" class="control-label col-lg-2">Ap. Materno</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="materno" type="text" name="materno" required  minlength="3" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="celular" class="control-label col-lg-2">Celular</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="celular" type="number" name="celular" required  minlength="8" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="telefono" class="control-label col-lg-2">Telefono</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="telefono" type="number" name="telefono" required  minlength="8" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="domicilio" class="control-label col-lg-2">Domicilio</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="domicilio" type="text" name="domicilio" required  minlength="5" />
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