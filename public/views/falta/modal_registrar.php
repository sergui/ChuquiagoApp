<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Registrar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">REGISTRO DE NUEVA FALTA</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmRegistrar" name="frmRegistrar">
                    <div class="form-group">
                        <label for="Nombre">TIPO FALTA:</label>
						<select class="form-control" id="tipoFalta" name="tipoFalta" required="required">
  							<option value="">--Seleccione uno--</option>
							<option value="leves">Leves</option>
  							<option value="graves">Graves</option>
                            <option value="muy graves">Muy Graves</option>
  							
						</select>
                    </div>
                     
					<div class="form-group">
                        <label for="Nombre">Descripcion:</label>
                        <input class=" form-control" id="descripcion" name="descripcion" type="text" />
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

