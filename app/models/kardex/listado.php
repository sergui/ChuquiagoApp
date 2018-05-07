<?php 
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_curso'];
    $sql="SELECT e.*,k.`id_kardex`
            FROM estudiante e
            , kardex k
            WHERE k.`id_rude`=e.`id_rude`
            AND k.`id_curso`={$id} AND k.`gestion`=YEAR(NOW())
            AND e.`estado`=1";
    $estudiantes = $con->query($sql);
?>
<div class="adv-table" >
    <table  class="display table table-bordered table-striped" id="tbEstudiante">
        <thead>
            <tr>
                <th class="col-md-4">NOMBRE COMPLETO </th>
                <th>historial de Faltas</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr class="gradeX">
                    <td><?php echo $estudiante['nombre'].' '.$estudiante['paterno'].' '.$estudiante['materno']; ?></td>
                    <td><?php echo $estudiante['fecha_nac']; ?></td>
                    <td >
                       <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $estudiante['id_rude'] ?>)">
                            <span class="fa fa-edit" ></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $("#tbEstudiante").dataTable();
    });
</script>