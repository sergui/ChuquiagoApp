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
	function obtener_datos(id)
         {
            
            $.ajax({
            url: '../../models/falta/datos_falta.php',
            type: 'POST',
            dataType: "json",
            data: {id_falta: id},
            success: function(datos){ 
				
				if(datos['falta']['tipoFalta']==1){
                    $("#tipo_falta").html('<option value=1 selected>leve</option><option value=2>Peso</option>');
                }else{
                    $("#tipo_falta").html('<option value=1>grabe</option><option value=2 selected>Grabe</option>');
                }
                
                $("#frmEditar [id=descripcion]").val(datos['falta']['descripcion']);

                $("#id_falta").val(datos['falta']['id_falta']);//enviando id para el modelo

                
                
                
            }
            });
        }
	function eliminar_datos(id)
    {
        $("#id_eliminar").val(id);
    } 
	 $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/falta/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>falta/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });
    $(document).ready(function() {
        $("#frmRegistrar").validate({
            debug:true,
            rules:
            {
              	tipoFalta:{
                    required:true,                    
                },
              
				descripcion:{
                    required:true,
                    minlength: 1,
                    maxlength:25,
                },
            },
            messages:{
                tipoFalta:{
                    required:' <div class="alert alert-danger" role="alert">campo obligatorio</div>',
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