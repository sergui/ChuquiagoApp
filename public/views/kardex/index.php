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
    $(document).ready(function(){
        $("#curso").chosen({
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
    });
</script>