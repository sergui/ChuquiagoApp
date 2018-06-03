<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    Reporte por curso
                </div>
            </header>
            <div class="panel-body">
                <!-- <form class="form-horizontal adminex-form"> -->
                    <div class="form-group col-md-6">
                        <label class="col-md-5 control-label" for="inputSuccess"><strong>Seleccione curso</strong></label>
                        <div class="col-lg-7">
                            <?php if ($rol==2): ?>
                            <select class="chosen-select" id="curso" name="curso" data-placeholder="Seleccione un curso"  required="">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo $curso['id_curso']; ?>" atr_asignatura="<?php echo $curso['id_asignatura']; ?>"><?php echo $curso['curso'].' '.$curso['nombre_asignatura']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php else: ?>
                            <select class="chosen-select" id="curso" name="curso" data-placeholder="Seleccione un curso"  required="">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo $curso['id_curso']; ?>" atr_asignatura="0"><?php echo $curso['curso']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php endif ?>
                        </div>
                    </div>
                <div id="listado">
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function verCurso(id){
        $('#id_curso').val(id);
        var ida=$('#curso option:selected').attr('atr_asignatura');
        $.ajax({
            url: '../../models/reporte/reporte_curso.php',
            type: 'post',
            data: {id_curso: id, id_asig: ida},
            beforeSend: function() {
                transicion("Procesando Espere....");
            },
            success: function(response) {
                transicionSalir();
                $('#listado').html(response);
                $('#id_asignatura').val(ida);
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
    });
</script>