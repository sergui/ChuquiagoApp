<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Lista de estudiantes
                </div>
            </header>
            <div class="panel-body">
                <!-- <form class="form-horizontal adminex-form"> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess"><strong>Seleccione curso</strong></label>
                        <div class="col-lg-7">
                            <select class="chosen-select" id="curso" name="curso" data-placeholder="Seleccione un curso"  required="">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['grado'].' '.$curso['paralelo']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <span class="pull-right hidden" id="btnr">
                            <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                                <span class="fa fa-pencil"></span> REGISTRAR ESTUDIANTE
                            </a>
                        </span>
                    </div>
                <!-- </form> -->
                <div id="listado">
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
                console.log(datos);
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
    function eliminar_datos(id){
        $("#id_eliminar").val(id);
    }
    $(document).ready(function(){
    	$('.cFecha').datepicker({
			format: 'dd/mm/yyyy'
		})
		.on('changeDate', function(ev){
			$('.cFecha').datepicker('hide');
		});
        
        $("#curso").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });
        $('#curso').change(function(){
            $('#btnr').removeClass('hidden');
            var id=$(this).val();
            $('#id_curso').val(id);            
            $.ajax({
                url: '../../models/estudiante/listado.php',
                type: 'post',                
                data: {id_curso: id},
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(response) {
                    transicionSalir();
                    $('#listado').html(response);
                }
            });
        });
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