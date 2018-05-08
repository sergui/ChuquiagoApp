<?php 
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_falta'];
    $sql="SELECT *
            FROM faltas
            WHERE tipoFalta='{$id}'";
    $faltas = $con->query($sql);
?>
<?php foreach ($faltas as $falta): ?>
    <div class="form-group">
        <label for="newsletter" class="control-label col-md-10"><?php echo $falta['descripcion']; ?></label>
        <div class="col-md-2">
            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="<?php echo $falta['id_falta']; ?>" name="id_falta[]" value="<?php echo $falta['id_falta']; ?>" required minlength='1'/>
        </div>
    </div>    
<?php endforeach ?>