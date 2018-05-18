<?php 
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_falta'];
    $sql="SELECT *
            FROM faltas
            WHERE tipoFalta='{$id}'";
    $faltas = $con->query($sql);
    $con->close();
?>
<?php foreach ($faltas as $falta): ?>
    <div class="form-group">
        <label for="newsletter" class="control-label col-md-10"><?php echo $falta['descripcion']; ?></label>
        <div class="col-md-2">
            <input type="checkbox" style="width: 20px" class="checkbox form-control micheckbox" id="<?php echo $falta['id_falta']; ?>" name="id_falta[]" value="<?php echo $falta['id_falta']; ?>" required minlength='1'/>
        </div>
    </div>
    <div class="form-group hide" id="o_<?php echo $falta['id_falta']; ?>">
        <label class="col-sm-3 control-label">OBSERVACION</label>
        <div class="col-sm-9">
            <textarea rows="5" disabled="true" class="form-control" id="observacion_<?php echo $falta['id_falta']; ?>" name="observacion[]"></textarea>
        </div>
    </div>
<?php endforeach ?>
<!-- <div class="form-group">
    <label class="col-sm-3 control-label">OBSERVACION</label>
    <div class="col-sm-9">
        <textarea rows="5" class="form-control" id="observacion[]" name="observacion[]"></textarea>
    </div>
</div> -->
<script>
    $( '.micheckbox' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        $('#observacion_'+$(this).val()).val('');
        $('#o_'+$(this).val()).removeClass('hide');
        $('#observacion_'+$(this).val()).removeAttr('disabled');
        $('#observacion_'+$(this).val()).focus();
        // Hacer algo si el checkbox ha sido seleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        $('#o_'+$(this).val()).addClass('hide');
        $('#observacion_'+$(this).val()).attr('disabled', 'true');
        // Hacer algo si el checkbox ha sido deseleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});

</script>