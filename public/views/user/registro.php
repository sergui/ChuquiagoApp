<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Registro de usuario
            </header>
            <div class="panel-body">
                <div class=" form">
                    <form class="cmxform form-horizontal adminex-form" id="frmUsuario" name="frmUsuario" method="post">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nombre completo (obligatorio)</label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="name" name="name" minlength="7 " type="text" required autofocus="true" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="user" class="control-label col-lg-2">nombre de usuario (Obligatorio)</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="user" type="text" name="user" required  minlength="3" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="Rol" class="control-label col-lg-2">Rol (Obligatorio)</label>
                            <div class="col-lg-8">
                                <select name="rol" name='rol' class="form-control" required="true">
                                    <option value="">SELECCIONE UN ROL</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cajero</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Contraseña (obligatorio)</label>
                            <div class="col-lg-8">
                                <input class="form-control " id="password" type="password" name="password" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password_repeat" class="control-label col-lg-2">Repita contraseña</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" id="password_repeat" name="password_repeat" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit" id="btnRegistrar" >Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#frmUsuario").validate({
            debug:true,
            rules:{
                name:{
                    required:true,
                    minlength: 7,
                },
                user:{
                    required:true,
                    minlength: 3,
                    remote: {
                        url: "../../models/user/verifica.php",
                        type: 'post',
                        data: {
                            user: function() {
                                return $("#user").val();
                            }
                        }
                    }
                },
                password:{
                    required:true,
                    minlength:6,
                },
                password_repeat:{
                    required:true,
                    minlength: 6,
                    equalTo: "#password",
                },
            },
            messages:{
                user:{
                    remote:"el nombre de usuario ya existe, seleccione otro."
                },
                password_repeat:{
                    equalTo :"Las contraseñas no coinciden."
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/user/registro_model.php',
                    type: 'post',
                    data: $("#frmUsuario").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if(response==1){
                            $('#btnRegistrar').attr({
                                disabled: 'true'
                            });
                            transicionSalir();
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ','success','GUARDAR DATOS');
                            setTimeout(function(){
                                window.location.href='<?php echo ROOT_CONTROLLER ?>user/index.php';
                            }, 3000);
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR AL USUARIO verifique los datos!! '+response,'error','GUARDAR DATOS');
                        }
                    }
                });
            }
        });
    });
</script>