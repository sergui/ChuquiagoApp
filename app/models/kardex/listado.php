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
    $con->close();
    session_start();
?>
<div class="adv-table" >
    <table  class="display table table-bordered table-striped" id="tbEstudiante">
        <thead>
            <tr>
                <th class="col-md-3">NOMBRE COMPLETO </th>
                <th class="text-center col-md-7">historial de Faltas</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr class="gradeX">
                    <td><?php echo $estudiante['nombre'].' '.$estudiante['paterno'].' '.$estudiante['materno']; ?></td>
                    <td>
                        <table class="table table-striped">
                            <tbody>
                            <?php
                                $con=conectar();
                                if($_SESSION['id_rol']==1 || $_SESSION['id_rol']==5 || $_SESSION['id_rol']==6){
                                    $sql="SELECT f.`descripcion`,f.`tipoFalta`,DATE_FORMAT(fc.fecha, '%d/%m/%y') AS fecha, FC.`obseracion`
                                        FROM faltas_cometidas fc
                                      , faltas f
                                        WHERE fc.`id_falta`=f.`id_falta`
                                        AND fc.id_kardex={$estudiante['id_kardex']}";
                                }else{
                                    $sql="SELECT f.`descripcion`,f.`tipoFalta`,DATE_FORMAT(fc.fecha, '%d/%m/%y') AS fecha, FC.`obseracion`
                                        FROM faltas_cometidas fc
                                      , faltas f
                                        WHERE fc.`id_falta`=f.`id_falta`
                                        AND fc.id_kardex={$estudiante['id_kardex']} and id_user={$_SESSION['id_user']}";
                                }
                                if (!($faltas_estudiante=$con->query($sql))) {
                                    echo "Falló obtencion de datos: (" . $con->errno . ") " . $con->error;
                                }
                                foreach ($faltas_estudiante as $nfalta ):
                            ?>
                                <tr>
                                    <td class="col-md-1 text-center"><?php echo $nfalta['tipoFalta'] ; ?></td>
                                    <td class="col-md-5 "><?php echo $nfalta['descripcion'] ; ?></td>
                                    <td class="col-md-4 "><?php echo $nfalta['obseracion'] ; ?></td>
                                    <td class="col-md-2 text-center"><?php echo $nfalta['fecha'] ; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td class="text-center">
                       <a class="btn btn-success btn-block" href="#modal_Registrar" role="button" data-placement="top" title="Faltas" data-toggle="modal" onclick="verFalta(<?php echo $estudiante['id_rude'] ?>,<?php echo $estudiante['id_kardex'] ?>);">
                            <span class="fa fa-edit" > Registrar falta</span>
                        </a>
                        <a class="btn btn-warning btn-block" href="#modal_citacion" role="button" data-placement="top" title="Faltas" data-toggle="modal" onclick="citacion(<?php echo $estudiante['id_rude'] ?>,<?php echo $estudiante['id_kardex'] ?>)">
                            <span class="fa fa-envelope" > enviar citacion</span>
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