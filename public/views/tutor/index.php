<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="row panel-heading">
                    LISTA DE TUTORES
                    <span class="pull-right">
                        <a href="#modal_Registrar" class="btn btn-xs btn-success" data-toggle="modal">
                            <span class="fa fa-pencil"></span> Nuevo Tutor
                        </a>
                    </span>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table" >
                    <table  class="display table table-bordered table-striped" id="tbtutor">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th>Celular</th>
                                <th class="text-center col-md-4">Hijos</th>
                                <th class="center"> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tutores as $tutor): ?>
                            <tr class="gradeX">
                                <td><?php echo $tutor['nombres']; ?></td>
                                <td><?php echo $tutor['paterno']; ?></td>
                                <td><?php echo $tutor['materno']; ?></td>
                                <td><?php echo $tutor['celular']; ?></td>
                                <td>
                                <?php 
                                    $con=conectar();
                                    $sql="SELECT es.*, e.*
                                            FROM estudiante es
                                            , encargado e
                                            WHERE es.`id_rude` = e.`id_rude`
                                            AND e.`id_tutor`=".$tutor['id_tutor'];
                                    if (!($hijos = $con->query($sql))) {
                                        echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
                                    }
                                    $con->close();
                                    echo "<ol>";
                                    foreach ($hijos as $hijo) {
                                        echo '<li>'.$hijo['nombre'].' '.$hijo['paterno'].' '.$hijo['materno'].'</li>';
                                    }
                                    echo "</ol>";
                                ?>
                                </td>
                                <td></td>
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
    function registro( id ) {
        var idt=$("#id_tutorV").val();
        $.ajax( {
            url: '../../models/tutor/registro_encargado.php',
            type: 'POST',
            dataType: "json",
            data: {
                id_tutor: idt,
                id_rude: id
            },
            success: function ( datos ) {
                var idt=$("#id_tutorV").val();
                var miid=$("#id_curso").val();
                $("#tabla_estudiante").load("../../models/tutor/estudiante_curso.php?id_curso="+miid+"&id_tutor="+idt);
                if ( datos == 1 ) {
                    mensajes_alerta_pequeño( 'Se adiciono correctamente !! ', 'success', 'Adición' );
                } else {
                    mensajes_alerta_pequeño( 'Error al adicionar verifique los datos!! ' + response, 'error', 'Adición' );
                }

            }
        } );
    }
    function obtener_datos(id){
        $.ajax({
            url: '../../models/tutor/datos_tutor.php',
            type: 'POST',
            dataType: "json",
            data: {id_tutor: id},
            success: function(datos){
                //console.log(datos);
                $("#frmEditar [id=id_tutor]").val(datos['tutor']['id_tutor']);
                $("#frmEditar [id=nombres]").val(datos['tutor']['nombres']);
                $("#frmEditar [id=paterno]").val(datos['tutor']['paterno']);
                $("#frmEditar [id=materno]").val(datos['tutor']['materno']);
                $("#frmEditar [id=celular]").val(datos['tutor']['celular']);
                $("#frmEditar [id=telefono]").val(datos['tutor']['telefono']);
                $("#frmEditar [id=domicilio]").val(datos['tutor']['domicilio']);

            }
        });
    }
    function eliminar_datos(id){
        $("#id_eliminar").val(id);
    }
    
    $(document).ready(function(){
         $("#id_curso").chosen({
            disable_search_threshold: 10,
            no_results_text: "No se encontro resultados!",
            width: "95%"
        });

        $("#id_curso").change(function() {
            var idt=$("#id_tutorV").val();
            var miid=$("#id_curso").val();
            $("#tabla_estudiante").load("../../models/tutor/estudiante_curso.php?id_curso="+miid+"&id_tutor="+idt);
        });
        $("#tbtutor").dataTable();
        $("#frmTutor").validate({
            debug:true,
            rules:{
                nombres:{
                    required:true,
                    minlength: 3,
                    maxlength:15,
                },
                paterno:{
                    minlength: 3,
                    maxlength:15,
                },
                materno:{
                    minlength: 3,
                    maxlength:15,
                },
                celular:{
                    required:true,
                    minlength: 8,
                    maxlength:8,
                },
                domicilio:{
                    required:true,
                    minlength: 5,
                    maxlength:200,
                }
            },
            messages:{
                nombres:{
                    required:"Este es Campo es obligatorio escriba su nombre.",
                },
                paterno:{
                    required:"Este es Campo Obligatorio escriba su apellido paterno.",
                },
                materno:{
                    required:"Este es Campo Obligatorio escriba su apellido materno.",
                },
                celular:{
                    required:"Este es Campo Obligatorio escriba su nro. de celular",
                },
                domicilio:{
                    required:"Este es Campo Obligatorio escriba su direccion de domicilio.",
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/tutor/registro_model.php',
                    type: 'post',
                    dataType:"json",
                    data: $("#frmTutor").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        transicionSalir();
                        if(response['estado']=='1' ){
                            $("#nombres").attr('disabled', 'true');
                            $("#paterno").attr('disabled', 'true');
                            $("#materno").attr('disabled', 'true');
                            $("#celular").attr('disabled', 'true');
                            $("#telefono").attr('disabled', 'true');
                            $("#domicilio").attr('disabled', 'true');
                            $('#btnRegistrar').attr( 'disabled', 'true');
                            $('#btlis').removeClass('hidden');
                            var id_tu=response['tutor']['id_tutor'];
                            $("#id_tutorV").val(id_tu);
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ' ,'success','GUARDAR DATOS');
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR EL TUTOR  verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/tutor/eliminar_model.php',
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
                            window.location.href='<?php echo ROOT_CONTROLLER ?>tutor/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR AL TUTOR verifique los datos!! '+response,'error','EDITAR DATOS');
                    }
                }
            });
        });
    });
</script>