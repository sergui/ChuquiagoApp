<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="<?php echo ROOT; ?>"><img src="<?php echo ROOT; ?>resources/assets/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="<?php echo ROOT; ?>"><img src="<?php echo ROOT; ?>resources/assets/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">
        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="<?php echo ROOT; ?>resources/assets/images/photos/user-avatar.png" class="media-object">
                <div class="media-body">
                    <h4><a href="#"> <?php echo $_SESSION['nombre']; ?></a></h4>
                    <span>"<?php echo $_SESSION['user_name']; ?>"</span>
                </div>
            </div>
            <h5 class="left-nav-title">Información de cuenta</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
              <li><a href="<?php echo ROOT_CONTROLLER; ?>user/perfil.php"><i class="fa fa-user"></i> <span> Mi cuenta</span></a></li>
              <li><a href="<?php echo ROOT_CONTROLLER; ?>login/index.php?logout"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="<?php echo $menu_a['inicio']; ?>"><a href="<?php echo ROOT; ?>"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <li class="menu-list <?php echo $menu_a['usuario']; ?>"><a href=""><i class="fa fa-users"></i> <span>Usuarios</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['lista_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>user/"> Lista de usuarios</a></li>
                    <li class="<?php echo $menu_a['registro_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>user/registro.php"> Registro de usuarios</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li class="<?php echo $menu_a['ventas']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>ventas/"><i class="fa fa-shopping-cart"></i> <span>Ventas</span></a>
            </li>
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <li class="menu-list <?php echo $menu_a['producto']; ?>"><a href="#"><i class="fa fa-book"></i> <span>Producto o PLU</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['lista_p']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>producto/"> Listado</a></li>
                    <li class="<?php echo $menu_a['registro_p']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>producto/registro.php"> Registro de producto</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <li class="menu-list <?php echo $menu_a['reportes']; ?>"><a href=""><i class="fa fa-copy"></i> <span>Reportes</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['reportes_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>reporte/"> Reporte de entregas</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li class="<?php echo $menu_a['cliente']; ?>">
                <a href="<?php echo ROOT_CONTROLLER; ?>cliente/"><i class="fa fa-tags"></i> <span>Clientes</span></a>
            </li>
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <li class="menu-list <?php echo $menu_a['configuracion']; ?>"><a href=""><i class="fa fa-cog"></i> <span>Configuraciónes</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['configuracion_s']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>seccion/"> Seccion</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li><a href="<?php echo ROOT_CONTROLLER; ?>login/index.php?logout"><i class="fa fa-sign-in"></i> <span>Salir</span></a></li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>