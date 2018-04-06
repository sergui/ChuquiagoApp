<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    LISTA DE TUTORES
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> Nuevo Tutor
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbtutor">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tutores as $tutor): ?>
                            <tr class="gradeX">
                                <td><?php echo $tutor['nombres']; ?></td>
                                <td><?php echo $tutor['paterno']; ?></td>
                                <td><?php echo $tutor['materno']; ?></td>
                                <td >
                                    <a class="btn btn-success" href="#modalAsignar" role="button" data-placement="top" title="asignar" data-toggle="modal" onclick="">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                    <a class="btn btn-danger" href="#modalQuitarAsignacion" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once 'modal_asignar.php'; ?>
        <?php require_once 'modal_quitar_asignacion.php'; ?>

    </section>
</div>
</div>
<script>
function obtener_datos(idt,ide){
        $.ajax({
            url: '../../models/tutor/asignar_estudiante_model.php',
            type: 'POST',
            dataType: "json",
            data: {id_rude: ide, id_tutor:idt},
            success: function(datos){
                console.log(datos);
                alert("asignacion exitosa");

            }
        });
    }

        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/tutor/eliminar_model.php',
                type: 'POST',
                data: $("#frmEliminar").serialize(),
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(response){
                    if(response==1){
                        $('#modalEliminar').modal('hide');
                        $('#btnEliminar').attr({disabled: 'true'});
                        transicionSalir();
                        mensajes_alerta('DATOS ELIMINADOS ELIMINADOS EXITOSAMENTE !! ','success','EDITAR DATOS');
                        setTimeout(function(){
                            window.location.href='<?php echo ROOT_CONTROLLER ?>tutor/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR AL TUTOR verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });

</script>