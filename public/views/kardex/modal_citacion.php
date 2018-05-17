<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_citacion" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Enviar citacion</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form  class="cmxform form-horizontal adminex-form" role="form" id="frmCitacion" name="frmCitacion">
                        <input type="hidden" name="id_kardex_c" id="id_kardex_c" class="form-control" value="">
                        <p id="ncitacion" name="ncitacion">Señor padre de familia. el/la maestro/a <strong><?php echo $_SESSION['nombre'].' '.$_SESSION['ap_paterno']; ?></strong> de aula <e name="aula" id="aula" value=""></e> le cita a Ud.(s) el dia <input type="date" name="fecha_reunion" id="fecha_reunion" value="" placeholder="" required=""> a horas <input type="time" name="hora" id="hora" value="" placeholder="" required=""> para conversar sobre su hijo(a) <strong><e name="hijo_nom" id="hijo_nom" value=""></e></strong></p>
                        
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnEnviar" >Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>