<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    LISTA DE ROLES
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> NUEVO ROL
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbRoles">
                        <thead>
                            <tr>
                                <th>ID ROL</th>
                                <th>NOMBRE</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $rol): ?>
                            <tr class="gradeX">
                                <td><?php echo $rol['id_rol']; ?></td>
                               
								<td><?php echo $rol['nombre']; ?></td>
                                <td >
                                    <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $rol['id_rol'] ?>)">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                    <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $rol['id_rol'] ?>)">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once 'modal_registrar_rol.php'; ?>
        <?php require_once 'modal_eliminar_rol.php'; ?>
        <?php require_once 'modal_editar_rol.php'; ?>
    </section>
</div>
</div>
<script>
    
     function obtener_datos(id)
         {
            
            $.ajax({
                url: '../../models/roles/datos_roles.php',
                type: 'POST',
                dataType: "json",
                data: {id_rol: id},
                success: function(datos){ 
                   
                    $("#frmEditar [id=nombre]").val(datos['roles']['nombre']);
                    
                    $("#id_rol").val(datos['roles']['id_rol']);//enviando id para el modelo
                }
            });
        }

    ///////////////////ELIMINAR DATOS////////
    function eliminar_datos(id)
    {
        $("#id_eliminar").val(id);
    }    
    ////////////////////JQUERY/////////////////////
    $(document).ready(function() 
    {
        $("#tbRoles").dataTable();
        /////////////REGISTRAR DATOS////////////////
        $("#frmRegistrar").validate({
            debug:true,
            rules:
            {
                nombre:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
            },
            messages:{
               nombre:{
                    required:"Este es Campo Obligatorioooo.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/roles/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>user/roles_usuario.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR EL ROL  verifique los datos!! '+response,'error','GUARDAR DATOS');
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
                nombre:{
                    required:true,
                    minlength: 5,
                    maxlength:15,
                },
            },
            messages:{
               nombre:{
                    required:"Este es Campo Obligatorioooo.",
                },
                sigla:{
                    required:"Este es Campo Obligatorioooo.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/roles/editar_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>user/roles_usuario.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL ROL verifique los datos!! '+response,'error','EDITAR DATOS');
                        }
                    }
                });
            }
        });
        /////////////ELIMINAR DATOS////////////////
         $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/roles/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>user/roles_usuario.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR EL ROL verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });
     
    });
</script>