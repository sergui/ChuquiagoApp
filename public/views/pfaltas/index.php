<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    MAXIMO DE FALTAS
                    <!-- <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> NUEVO DE MAXIMO DEFALTAS 
                        </a>
                    </span> -->
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbpfaltas">
                        <thead>
                            <tr>
                                <th>MAXIMO DE FALTAS</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pfaltas as $pfalta): ?>
                            <tr class="gradeX">
                                <td><?php echo $pfalta['max_faltas']; ?></td>
                                <td >
                                    <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $pfalta['id_pfalta'] ?>)">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once 'modal_registrar.php'; ?>
        
        <?php require_once 'modal_editar.php'; ?>

    </section>
</div>
</div>
<script>
    ///////////////////OBTENER DATOS////////
    function obtener_datos(id)
         {
            
            $.ajax({
                url: '../../models/pfaltas/datos_pfalta.php',
                type: 'POST',
                dataType: "json",
                data: {id_pfalta: id},
                success: function(datos){
                    console.log(datos);
                   
                    $("#frmEditar [id=max_faltas]").val(datos['pfaltas']['max_faltas']);
                    $("#id_pfalta").val(datos['pfaltas']['id_pfalta']);//enviando id para el modelo
                }
            });
        }
    ///////////////////ELIMINAR DATOS////////
     
     ////////////////////////JQUERYYYYYYYYY//////////////////////////////////////
    $(document).ready(function() 
    {
        $("#tbpfaltas").dataTable();
        /////////////REGISTRAR DATOS////////////////
        $("#frmRegistrar").validate({
            debug:true,
            rules:
            {
                max_faltas:{
                    required:true,
                    minlength: 1,
                    maxlength:3,
                },
               
            },
            messages:{
                max_faltas:{
                    required:"Este es Campo Obligatorio.",
                },
                
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/pfaltas/registro_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>pfaltas/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR ALA SECCION  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });

        
       
       //////////////EDITAR DATOS////////////////////////////////////////////
        $('#frmEditar').validate({
             debug:true,
            rules:
            {
                max_faltas:{
                    required:true,
                    minlength: 1,
                    maxlength:10,
                },
               
            },
            messages:{
                max_faltas:{
                    required:"Este es Campo Obligatorio.",
                },
                
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/pfaltas/editar_model.php',
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
                                window.location.href='<?php echo ROOT_CONTROLLER ?>pfaltas/index.php';
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
      



    });
        
    
</script>