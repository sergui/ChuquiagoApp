<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'template/head.php'; ?>
</head>
<body class="sticky-header">
    <section>
        <!-- left side start-->
        <?php require_once 'template/left_menu.php'; ?>
        <!-- left side end-->
        
        <!-- main content start-->
        <div class="main-content" >
            <!-- header section start-->
            <div class="header-section">
                <!--toggle button start-->
                <a class="toggle-btn"><i class="fa fa-bars"></i></a>
                <!--toggle button end-->

                <!--notification menu start -->
                <?php require_once 'template/menu_right.php'; ?>
                <!--notification menu end -->

            </div>
            <!-- header section end-->

            <!-- page heading start-->
            <?php require_once 'template/breadcumb.php'; ?>
            <!-- page heading end-->

            <!--body wrapper start-->
            <div class="wrapper">
                <?php 
                    if(isset($contenido))
                        require_once ($contenido);
                ?>
            </div>
            <!--body wrapper end-->
            <!--footer section start-->
            <?php require_once 'template/footer.php'; ?>
            <!--footer section end-->
        </div>
        <!-- main content end-->
    </section>
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php require_once 'template/scripts.php'; ?>
</body>
</html>
