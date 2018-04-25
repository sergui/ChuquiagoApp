<?php 
    require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    $id=$_REQUEST['id_curso'];
    $sql="call listadelCurso({$id})";
    $estudiantes = $con->query($sql);
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
                        <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $estudiante['id_rude'] ?>)">
                            <span class="fa fa-trash-o"></span>
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