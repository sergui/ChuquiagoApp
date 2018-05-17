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
            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="<?php echo $falta['id_falta']; ?>" name="id_falta[]" value="<?php echo $falta['id_falta']; ?>" required minlength='1'/>
        </div>
    </div>
<?php endforeach ?>
<div class="form-group">
    <label class="col-sm-3 control-label">OBSERVACION</label>
    <div class="col-sm-9">
        <textarea rows="5" class="form-control" id="observacion" name="observacion"></textarea>
    </div>
</div>