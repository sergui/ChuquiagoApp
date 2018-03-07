<?php 
  require_once '../../../app/config/route.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="<?php echo ROOT; ?>resources/assets/images/logo_icon.png" type="image/png">

  <title>500 Page</title>

  <link href="<?php echo ROOT;?>resources/assets/css/style.css" rel="stylesheet">
  <link href="<?php echo ROOT;?>resources/assets/css/style-responsive.css" rel="stylesheet">
</head>

<body class="error-page">

<section>
    <div class="container ">
        <section class="error-wrapper text-center">
            <h1><img alt="" src="<?php echo ROOT;?>resources/assets/images/500-error.png"></h1>
            <h2>OOOPS!!!</h2>
            <h3>Algo salió mal.</h3>
            <p class="nrml-txt">¿Por qué no intentar refrescar tu página? O tu puedes <a href="#">contacta con nuestro soporte</a> si el problema persiste.</p>
            <a class="back-btn" href="<?php echo ROOT_CONTROLLER ?>home"> Volver a Inicio</a>
        </section>
    </div>
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo ROOT;?>resources/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo ROOT;?>resources/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo ROOT;?>resources/assets/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT;?>resources/assets/js/modernizr.min.js"></script>
</body>
</html>