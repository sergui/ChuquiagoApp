<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    LISTA DE DOCENTES
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> Nuevo Docente
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbDocente">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th>Celular</th>
                                <th>Nombre de usuario</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($docentes as $docente): ?>
                                <tr class="gradeX">
                                    <td><?php echo $docente['nombre']; ?></td>
                                    <td><?php echo $docente['paterno']; ?></td>
                                    <td><?php echo $docente['materno']; ?></td>
                                    <td><?php echo $docente['celular']; ?></td>
                                    <td >
                                        <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $docente['id_docente'] ?>)">
                                            <span class="fa fa-edit" ></span>
                                        </a>
                                        <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $docente['id_docente'] ?>)">
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
            url: '../../models/curso/datos_curso.php',
            type: 'POST',
            dataType: "json",
            data: {id_curso: id},
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
        $("#tbDocente").dataTable();
        $("#frmRegistrar").validate({
            debug:true,
            rules:{
                nombre_usuario:{
                    required:true,
                    minlength: 3,
                    remote: {
                        url: "../../models/usuario/verifica.php",
                        type: 'post',
                        data: {
                            nombre_usuario: function() {
                                return $("#nombre_usuario").val();
                            }
                        }
                    }
                },
                ci:{
                	required:true,
                	minlength:5,
                	remote:{
                		url: "../../models/usuario/verifica.php",
                        type: 'post',
                        data: {
                            ci: function() {
                                return $("#ci").val();
                            }
                        }
                	}
                }
            },
            messages:{
                nombre_usuario:{
                    remote:"Debe elegir otro nombre de usuario.",
                },
                ci:{
                    remote:"El numero de C.I. ya esta registrado verifique",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/docente/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>curso/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        $('#frmEditar').validate({
            debug:true,
        	rules:{
                grado:{
                    required:true,
                    minlength: 3,
                    maxlength:15,
                },
                paralelo:{
                    required:true,
                    minlength: 1,
                    maxlength:2,
                }
            },
            messages:{
                grado:{
                    required:"Este es Campo Obligatorioooo.",
                },
                paralelo:{
                    required:"Este es Campo Obligatorioooo.",
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