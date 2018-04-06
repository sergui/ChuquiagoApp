<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalAsignar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">ASIGNAR ESTUDIANTE A TUTOR</h4>
            </div>
            <div class="modal-body">
                    <form class="cmxform form-horizontal adminex-form" id="frmTutor" name="frmTutor" method="post">
                    <!-- inicio lista de estudiantes-->
                    <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbEstudiante"">
                        <thead>
                            <tr>
                                <th>NOMBRES </th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>FEC. NACIMIENTO</th>

                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($estudiantes as $estudiante): ?>
                                <tr class="gradeX">
                                    <td><?php echo $estudiante['nombre']; ?></td>
                                    <td><?php echo $estudiante['paterno']; ?></td>
                                    <td><?php echo $estudiante['materno']; ?></td>
                                    <td><?php echo $estudiante['fecha_nac']; ?></td>
                                    <td >
                                       <a class="btn btn-success" href="#" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="asignar_estudiante(<?php echo $tutor["id_tutor"]?>,<?php echo $estudiante['id_rude'] ?>)">
                                        <span class="fa fa-edit" ></span>asignar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    </div>
                    <!-- fin lista de estudiantes -->
                    </form>
            </div>
        </div>
    </div>
</div>

