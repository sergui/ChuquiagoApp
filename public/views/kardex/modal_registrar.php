<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title" id="titulo_modal"></h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form  class="cmxform form-horizontal adminex-form" role="form" id="frmRegistrar" name="frmRegistrar">
                        <input type="hidden" name="id_kardex" id="id_kardex" class="form-control" value="">
                        <input type="hidden" name="id_asignatura" id="id_asignatura" class="form-control" value="">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="inputSuccess"><strong>Seleccione tipo falta</strong></label>
                            <div class="col-lg-7">
                                <select class="chosen-select" id="tfalta" name="tfalta" data-placeholder="Seleccione un tipo de falta"  required="">
                                    <option value=""></option>
                                    <option value="leves">Leves</option>
                                    <option value="graves">Graves</option>
                                    <option value="muy graves">Muy graves</option>
                                </select>
                            </div>
                        </div>
                        <div id="lista_faltas">
                        </div><br>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnRegistrar" >Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tfalta').change(function(){
            var id=$(this).val();
            $.ajax({
                url: '../../models/kardex/listado_falta.php',
                type: 'post',
                data: {id_falta: id},
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(response) {
                    transicionSalir();
                    $('#lista_faltas').html(response);
                }
            });
        });
    });
</script>