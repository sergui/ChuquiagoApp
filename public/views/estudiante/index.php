<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Lista de estudiantes
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> REGISTRAR ESTUDIANTE
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbEstudiante"">
                        <thead>
                            <tr>
                                <th>NOMBRES </th>
                                <th>APELLIDO PATERNO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>SEXO</th>
                                <th>FEC. NACIMIENTO</th>
                                <th>DOMICILIO</th>

                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($estudiantes as $estudiante): ?>
                                <tr class="gradeX">
                                    <td><?php echo $estudiante['nombre']; ?></td>
                                    <td><?php echo $estudiante['paterno']; ?></td>
                                    <td><?php echo $estudiante['materno']; ?></td>
                                    <td><?php echo $estudiante['sexo']; ?></td>
                                    <td><?php echo $estudiante['fecha_nac']; ?></td>
                                    <td><?php echo $estudiante['domicilio']; ?></td>
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
            url: '../../models/estudiante/datos_estudiante.php',
            type: 'POST',
            dataType: "json",
            data: {id_rude: id},
            success: function(datos){
                //console.log(datos);
                $("#frmEditar [id=nombre]").val(datos['estudiante']['nombre']);
                $("#frmEditar [id=paterno]").val(datos['estudiante']['paterno']);
                $("#frmEditar [id=materno]").val(datos['estudiante']['materno']);
                $("#frmEditar [id=fecha_nac]").val(datos['estudiante']['fecha_nac']);
                $("#frmEditar [id=sexo]").val(datos['estudiante']['sexo']);
                $("#frmEditar [id=domicilio]").val(datos['estudiante']['domicilio']);
                $("#id_rude").val(datos['estudiante']['id_rude']);//enviando id para el modelo
            }
        });
    }

    ///////////////////ELIMINAR DATOS////////
    function eliminar_datos(id){
        $("#id_eliminar").val(id);
    }
    ////////////////////JQUERY/////////////////////
    $(document).ready(function(){
    	/////////////////PLUGINS FECHA///////////////
    	$('.cFecha').datepicker({
			format: 'dd/mm/yyyy'
		})
		.on('changeDate', function(ev){
			$('.cFecha').datepicker('hide');
		});

		////////////////busquea de datos/////////////////
        $("#tbEstudiante").dataTable();
        /////////////REGISTRAR DATOS////////////////
        $("#frmRegistrar").validate({
            debug:true,
            rules:{
                nombre:{
                    required:true,
                    minlength: 3,
                    maxlength:15,
                },
                paterno:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                materno:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                domicilio:{
                    required:true,
                    minlength: 1,
                    maxlength:200,
                },
                sexo:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                fecha_nac:{
                    required:true,
                }
            },
            messages:{
                nombre:{
                    required:"Este es Campo Obligatorio.",
                },
                paterno:{
                    required:"Este es Campo Obligatorio.",
                },
                 materno:{
                    required:"Este es Campo Obligatorio.",
                },
                domicilio:{
                    required:"Este es Campo Obligatorio.",
                },
                 sexo:{
                    required:"Este es Campo Obligatorio.",
                },
                fecha_nac:{
                    required:"Este es Campo Obligatorio.",
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/estudiante/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>estudiante/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR AL ESTUDIANTE  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        /////////////editar DATOS////////////////
        $('#frmEditar').validate({
           debug:true,
            rules:{
                nombre:{
                    required:true,
                    minlength: 3,
                    maxlength:15,
                },
                paterno:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                materno:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                domicilio:{
                    required:true,
                    minlength: 1,
                    maxlength:200,
                },
                sexo:{
                    required:true,
                    minlength: 1,
                    maxlength:15,
                },
                fecha_nac:{
                    required:true,
                }
            },
            messages:{
                nombre:{
                    required:"Este es Campo Obligatorio.",
                },
                paterno:{
                    required:"Este es Campo Obligatorio.",
                },
                 materno:{
                    required:"Este es Campo Obligatorio.",
                },
                domicilio:{
                    required:"Este es Campo Obligatorio.",
                },
                 sexo:{
                    required:"Este es Campo Obligatorio.",
                },
                fecha_nac:{
                    required:"Este es Campo Obligatorio.",
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/estudiante/editar_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>estudiante/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL ESTUDIANTE verifique los datos!! '+response,'error','EDITAR DATOS');
                        }
                    }
                });
            }
        });
        /////////////ELIMINAR DATOS////////////////
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/estudiante/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>estudiante/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR AL ESTUDIANTE verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });
    });
</script>