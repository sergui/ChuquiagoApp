<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Lista de CURSOS
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> Nuevo Modelo de citacion
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbCitacion">
                        <thead>
                            <tr>
                                <th>FORMATO</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modelo_citaciones as $modelo_citacion): ?>
                            <tr class="gradeX">
                                <td><?php echo $modelo_citacion['formato']; ?></td>
                                
                                <td >
                                    <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $modelo_citacion['id_citacion'] ?>)">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                    <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $modelo_citacion['id_citacion'] ?>)">
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
    ///////////////////OBTENER DATOS////////
    function obtener_datos(id)
         {
            
            $.ajax({
            url: '../../models/modelo_citacion/datos_roles.php',
            type: 'POST',
            dataType: "json",
            data: {id_citacion: id},
            success: function(datos){ 
               
                $("#frmEditar [id=formato]").val(datos['modelo_citacion']['formato']);
                
                $("#id_citacion").val(datos['modelo_citacion']['id_citacion']);//enviando id para el modelo

                
                
                
            }
            });
        }
    ///////////////////ELIMINAR DATOS////////
    function eliminar_datos(id)
    {
        $("#id_eliminar").val(id);
    }    
     ////////////////////////JQUERYYYYYYYYY//////////////////////////////////////
    $(document).ready(function() 
    {
        $('#tbCitacion').dataTable(); 
        /////////////REGISTRAR DATOS////////////////
        $("#frmRegistrar").validate({
            debug:true,
            rules:
            {
                formato:{
                    required:true,
                    minlength: 3,
                    maxlength:400,
                },
                
            },
            messages:{
                formato:{
                    required:"Este es Campo Obligatorioooo.",
                },
                
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/modelo_citacion/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>citacion/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR A LOS  MODELOS DE CITACION  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });

        
       
       //////////////EDITARDATOS//////////////////////////////////////////////////////////
        $('#frmEditar').validate({
            debug:true,
            rules:
            {
                formato:{
                    required:true,
                    minlength: 3,
                    maxlength:400,
                },
                
            },
            messages:{
                formato:{
                    required:"Este es Campo Obligatorioooo.",
                },
                
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/modelo_citacion/editar_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>citacion/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                        }
                    }
                });
            }
        });

        ////////////ELIMINAR DATOS////////////////////////////////////////////////////////////
         $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/modelo_citacion/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>citacion/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR EL MODELO verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });



    });
        
    
</script>