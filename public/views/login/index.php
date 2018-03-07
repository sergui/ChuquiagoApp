<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="Sistema de ventas">
	<meta name="Haki-Ari" content="Desarrollo de software">
	<link rel="shortcut icon" href="<?php echo ROOT; ?>resources/assets/images/logo_icon.png" type="image/png">

    <title><?php echo $titulo; ?></title>

    <link href="<?php echo ROOT; ?>resources/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo ROOT; ?>resources/assets/css/style-responsive.css" rel="stylesheet">
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="" name="frmlogin" id="frmlogin" method="post">
        <div class="form-signin-heading text-center">
            <img src="<?php echo ROOT; ?>resources/assets/images/logopas.png" alt=""/>
        </div>
        <div class="login-wrap">
            <div class="form-group ">
                <input type="text" class="form-control" placeholder="Usuario" autofocus required="" minlength="3" name="usuario" id="usuario">
            </div>
            <div class="form-group ">
                <input type="password" class="form-control" placeholder="Contraseña" required="" name="password" id="password">
            </div>
            <?php
                if (isset($mlogin)) {
                    if ($mlogin->errors):?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Error!</strong>
                        <?php
                          foreach ($mlogin->errors as $error) {
                            echo $error;
                          }
                        ?>
                      </div>
                    <?php endif; ?>
                    <?php
                    if ($mlogin->messages):?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Aviso!</strong>
                            <?php
                                foreach ($mlogin->messages as $message) {
                                    echo $message;
                                }?>
                      </div>
                    <?php endif;?>
            <?php } ?>
            <button class="btn btn-lg btn-login btn-block" type="submit" id="btnlogin" name="btnlogin">
                <i class="fa fa-check"></i> Ingresar
            </button>
        </div>
    </form>
</div>
<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo ROOT; ?>resources/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo ROOT; ?>resources/assets/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT; ?>resources/assets/js/modernizr.min.js"></script>

<script src="<?php echo ROOT; ?>resources/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo ROOT; ?>resources/assets/js/languajes/messages_es.js"></script>
<script>
    $(document).ready(function() {
        $('#frmlogin').validate({
            //debug:true
        });
    });
</script>
</body>
</html>
