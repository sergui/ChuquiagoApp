<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'template/head.php'; ?>
</head>
<body class="sticky-header">
    <section>
        <?php require_once 'template/left_menu.php'; ?>
        <div class="main-content" >
            <div class="header-section">
                <a class="toggle-btn"><i class="fa fa-bars"></i></a>
                <?php require_once 'template/menu_right.php'; ?>
            </div>
            <?php require_once 'template/breadcumb.php'; ?>
            <div class="wrapper">
                <?php
                    if(isset($contenido))
                        require_once ($contenido);
                ?>
            </div>
            <?php require_once 'template/footer.php'; ?>
        </div>
    </section>
    <?php require_once 'template/scripts.php'; ?>
</body>
</html>
