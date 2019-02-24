<?php 
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_curso'];

    // $sql="call listadelCurso({$id})";
    $sql="SELECT CONCAT(e.nombre, ' ', e.paterno, ' ', e.materno ) AS nombre_completo,
                    e.sexo,
                    e.fecha_nac,
                    e.id_rude
            FROM
                estudiante e,
                curso c,
                kardex k
            WHERE c.id_curso = k.id_curso
                AND e.id_rude = k.id_rude
                AND c.id_curso = {$id}
                AND e.estado=1 ;";

    $estudiantes = $con->query($sql);
    $con->close();
?>
<div class="adv-table" >
    <table  class="display table table-bordered table-striped" id="tbEstudiante">
        <thead>
            <tr>
                <th class="col-md-6">NOMBRE COMPLETO </th>
                <th>SEXO</th>
                <th>FEC. NACIMIENTO</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr class="gradeX">
                    <td><?php echo $estudiante['nombre_completo']; ?></td>
                    <td class="text-center"><?php echo $estudiante['sexo']; ?></td>
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