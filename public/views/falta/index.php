<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    LISTA DE FALTAS
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> NUEVA FALTA
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbFalta">
                        <thead>
                            <tr>
                                <th>Tipo FALTA</th>
                                <th>DESCRIPCION</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($faltas as $falta): ?>
                            <tr class="gradeX">
                                <td><?php echo $falta['tipoFalta']; ?></td>
                               
								<td><?php echo $falta['descripcion']; ?></td>
                                <td >
                                    <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $falta['id_falta'] ?>)">
                                        <span class="fa fa-edit" ></span>
                                    </a>
                                    <a class="btn btn-danger" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $falta['id_falta'] ?>)">
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
    $(document).ready(function() {
        $("#frmRegistrar").validate({
            debug:true,
            rules:
            {
              /*  tipoFalta:{
                    required:true,
                    
                },*/
              
				descripcion:{
                    required:true,
                    minlength: 1,
                    maxlength:25,
                },
            },
            messages:{
                tipoFalta:{
                    required:"Este es Campo Obligatorioooo.",
                },
               
				descripcion:{
                    maxlength:"debe tener un maximo de 25 caracteres.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/falta/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistrar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {alert("ok");
                        if(response==1){
                            $('#btnRegistrar').attr({
                                disabled: 'true'
                            });
                            $('#modal_Registrar').modal('hide');
                            transicionSalir();
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ','success','GUARDAR DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>falta/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR LA FALTA  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
    });
        
    
</script>