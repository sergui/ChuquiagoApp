<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Cursos asignados a docente <?php echo $id_user; ?>
                </div>
            </header>
            <div class="panel-body">
                <!-- <form class="form-horizontal adminex-form"> -->
                    <div class="form-group col-md-6">
                        <label class="col-md-5 control-label" for="inputSuccess"><strong>Seleccione curso</strong></label>
                        <div class="col-lg-7">
                            <select class="chosen-select" id="curso" name="curso" data-placeholder="Seleccione un curso"  required="">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['curso']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($asesora->num_rows>0): ?>
                        <?php
                            foreach ($asesora as $cursoasesor) {
                                $cursoA=$cursoasesor;
                            }
                        ?>
                        <div class="form-group col-md-6">
                            <label class="col-md-5 control-label" for="inputSuccess"><strong>Curso Asesorado</strong></label>
                            <button type="button" class="btn btn-primary" onclick="verCurso(<?php echo $cursoA['id_curso']; ?>)"><?php echo $cursoA['curso']; ?></button>
                        </div>
                    <?php endif ?>
                <!-- </form> -->
                <div id="listado">
                </div>
            </div>
            <?php require_once 'modal_registrar.php'; ?>
            <?php //require_once 'modal_eliminar.php'; ?>
            <?php //require_once 'modal_editar.php'; ?>
        </section>
    </div>
</div>
<script>
    function verCurso(id){
        $('#id_curso').val(id);
        $.ajax({
            url: '../../models/kardex/listado.php',
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
    }
    function verFalta(id_rude,id_kardex){
        $.ajax({
            url: '../../models/estudiante/datos_estudiante.php',
            type: 'POST',
            dataType: "json",
            data: {id_rude: id_rude},
            success: function(datos){
                console.log(datos);
                $('#titulo_modal').html(datos['estudiante']['nombre']+' '+datos['estudiante']['paterno']+' '+datos['estudiante']['materno']);
                $('#id_kardex').val(id_kardex);
            }
        });
    }
    $(document).ready(function(){
        $("#curso").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });
        $("#tfalta").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });

        $('#curso').change(function(){
            var id=$(this).val();
            verCurso(id);
        });
        $("#frmRegistrar").validate({
            debug:true,
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
                    url: '../../models/kardex/registro_model.php',
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
                            mensajes_alerta('DATOS REGISTRADOS EXITOSAMENTE !! ','success','REGISTRO DE DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>kardex/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR LAS FALTAS  verifique los datos!! '+response,'error','REGISTRO DE DATOS');
                        }
                    }
                });
            }
        });
    });
</script>