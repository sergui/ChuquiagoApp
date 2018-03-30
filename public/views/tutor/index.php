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
                                <th>Celular</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tutores as $tutor): ?>
                            <tr class="gradeX">
                                <td><?php echo $tutor['nombres']; ?></td>
                                <td><?php echo $tutor['paterno']; ?></td>
                                <td><?php echo $tutor['materno']; ?></td>
                                <td><?php echo $tutor['celular']; ?></td>
                                <td >
                                    <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $tutor['id_tutor'] ?>)">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                    <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $tutor['id_tutor'] ?>)">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
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
            url: '../../models/tutor/datos_tutor.php',
            type: 'POST',
            dataType: "json",
            data: {id_tutor: id},
            success: function(datos){
                $("#frmEditar [id=grado]").val(datos['curso']['grado']);
                $("#frmEditar [id=paralelo]").val(datos['curso']['paralelo']);
                $("#id_curso").val(datos['curso']['id_curso']);
            }
        });
    }
    function eliminar_datos(id){
        $("#id_eliminar").val(id);
    }
    $(document).ready(function(){
        $("#tbtutor").dataTable();
        $("#frmTutor").validate({
            debug:true,
            rules:{
                nombres:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
                paterno:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
                materno:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
                celular:{
                    required:true,
                    minlength: 8,
                    maxlength:8,
                },
                telefono:{
                    required:false,
                    minlength: 5,
                    maxlength:15,
                },
                domicilio:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                }
            },
            messages:{
                nombres:{
                    required:"Este es Campo es obligatorio escriba su nombre.",
                },
                paterno:{
                    required:"Este es Campo Obligatorio escriba su apellido paterno.",
                },
                materno:{
                    required:"Este es Campo Obligatorio escriba su apellido materno.",
                },
                celular:{
                    required:"Este es Campo Obligatorio escriba su nro. de celular",
                },
                domicilio:{
                    required:"Este es Campo Obligatorio escriba su direccion de domicilio.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/tutor/registro_model.php',
                    type: 'post',
                    data: $("#frmTutor").serialize(),
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>tutor/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR EL TUTOR  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        $('#frmTutor').validate({
            debug:true,
        	rules:{
                nombres:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
                paterno:{
                    required:true,
                    minlength: 5,
                    maxlength:2,
                }
                materno:{
                    required:true,
                    minlength: 5,
                    maxlength:2,
                }
                celular:{
                    required:true,
                    minlength: 5,
                    maxlength:2,
                }
                domicilio:{
                    required:true,
                    minlength: 5,
                    maxlength:20,
                }
            },
            messages:{
                nombres:{
                  required:"Este es Campo Obligatorio escriba su nombre.",
                },
                paterno:{
                   required:"Este es Campo Obligatorio escriba su apellido paterno.",
                },

            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/curso/editar_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>curso/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                        }
                    }
                });
            }
        });
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/curso/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>curso/index.php';
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