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
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tienes as $tiene): ?>
                                <tr class="gradeX">
                                    <td><?php echo $tiene['nombre'].' '.$tiene['paterno'].' '.$tiene['materno']; ?></td>
                                    <td><?php echo $tiene['nombre_asignatura']; ?></td>
                                    <td><?php echo $tiene['grado'].' '.$tiene['paralelo']; ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php require_once 'modal_registrar.php'; ?>
            <?php require_once 'modal_eliminar.php'; ?>
            <?php require_once 'modal_editar.php'; ?>
        </section>
    </div>
</div>
<script>
    function obtener_datos(id){
        $.ajax({
            url: '../../models/asignatura/datos_asignatura.php',
            type: 'POST',
            dataType: "json",
            data: {id_asignatura: id},
            success: function(datos){
                $("#frmEditar [id=nombre_asignatura]").val(datos['asignatura']['nombre_asignatura']);
                $("#frmEditar [id=sigla]").val(datos['asignatura']['sigla']);
                $("#id_asignatura").val(datos['asignatura']['id_asignatura']);//enviando id para el modelo
            }
        });
    }

    ///////////////////ELIMINAR DATOS////////
    function eliminar_datos(id){
        $("#id_eliminar").val(id);
    }
    ////////////////////JQUERY/////////////////////
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
        /////////////REGISTRAR DATOS////////////////
        $("#frmRegistrar").validate({
            debug:true,
            rules:{
                nombre_asignatura:{
                    required:true,
                    minlength: 3,
                    maxlength:20
                },
                sigla:{
                    required:true,
                    minlength: 1,
                    maxlength:5
                }
            },
            messages:{
               nombre_asignatura:{
                    required:"Este es Campo Obligatorioooo.",
                },
                sigla:{
                    required:"Este es Campo Obligatorioooo.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/asignatura/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>asignatura/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR ALA SECCION  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        /////////////editar DATOS////////////////
        $('#frmEditar').validate({
            debug:true,
            rules:
            {
                nombre_asignatura:{
                    required:true,
                    minlength: 3,
                    maxlength:20,
                },
                sigla:{
                    required:true,
                    minlength: 1,
                    maxlength:5,
                }
            },
            messages:{
               nombre_asignatura:{
                    required:"Este es Campo Obligatorioooo.",
                },
                sigla:{
                    required:"Este es Campo Obligatorioooo.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/asignatura/editar_model.php',
                    type: 'post',
                    data: $("#frmEditar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if(response==1){
                            $('#modalEditar').modal('hide');
                            $('#btnEditar').attr({
                                disabled: 'true'
                            });
                            transicionSalir();
                            mensajes_alerta('DATOS EDITADOS EXITOSAMENTE !! ','success','EDITAR DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>asignatura/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                        }
                    }
                });
            }
        });
        /////////////ELIMINAR DATOS////////////////
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/asignatura/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>asignatura/index.php';
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