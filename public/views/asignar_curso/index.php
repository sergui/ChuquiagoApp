<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    asignar curso docente asignatura
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> ASIGNAR
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbAsignados">
                        <thead>
                            <tr>
                                <th>DOCENTE</th>
                                <th>ASIGNATURA</th>
                                <th>CURSO</th>
                                <th>USUARIO</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tienes as $tiene): ?>
                                <tr class="gradeX">
                                    <td><?php echo $tiene['nombre'].' '.$tiene['paterno'].' '.$tiene['materno']; ?></td>
                                    <td><?php echo $tiene['nombre_asignatura']; ?></td>
                                    <td><?php echo $tiene['grado'].' '.$tiene['paralelo']; ?></td>
                                    <td><?php echo $tiene['nombre_usuario']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $tiene['id_docente'] ?>,<?php echo $tiene['id_curso'] ?>,<?php echo $tiene['id_asignatura'] ?>)">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php require_once 'modal_registrar.php'; ?>
            <?php require_once 'modal_eliminar.php'; ?>
        </section>
    </div>
</div>
<script>
    function eliminar_datos(id_doc,id_cur,id_asig){
        $("#id_docente").val(id_doc);
        $("#id_curso").val(id_cur);
        $("#id_asignatura").val(id_asig);
    }
    $(document).ready(function(){
        $("#tbAsignados").dataTable();
        $("#asignatura").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });
        $("#docente").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });
        $("#curso").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });
        var validado;
        $(".chosen-select").on("change",function(){
            if(validado){
              validado.element($(this));
            }
        });
        validado=$("#frmRegistrar").validate({
            debug:true,
            rules:{
                curso:{
                    required:true
                },
                asignatura:{
                    required:true
                },
                docente:{
                    required:true
                }
            },
            errorPlacement:function(error, element){
                element.parents('.form-group').append(error);
            },
            ignore: ":hidden:not(.chosen-select)",
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/asignar_curso/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistrar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if(response==1){
                            $('#btnRegistrar').attr({
                                disabled: 'true'
                            });
                            $('#modal_Registrar').modal('hide');
                            transicionSalir();
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ','success','GUARDAR DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>asignar_curso/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR ALA SECCION  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/asignar_curso/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>asignar_curso/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });
    });
</script>