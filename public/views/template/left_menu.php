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
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="<?php echo $menu_a['inicio']; ?>"><a href="<?php echo ROOT; ?>"><i class="fa fa-home"></i> <span>
            Inicio</span></a></li>
            <?php if ($_SESSION['id_rol']==1 || $_SESSION['id_rol']== 5 || $_SESSION['id_rol']==6): ?>            
            <li class="menu-list <?php echo $menu_a['ueducativa']; ?>"><a href=""><i class="fa fa-book"></i> <span>Datos Unidad Educativa</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['asignatura_u']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>asignatura/"> Asignaturas</a>
                    </li>
                    <li class="<?php echo $menu_a['curso_u']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>curso/"> Cursos</a>
                    </li>
                    <li class="<?php echo $menu_a['curso_asesor_u']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>curso/asesor.php"> Cursos y asesores</a>
                    </li>
                    <li class="<?php echo $menu_a['pdocente_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>docente/">Plantel Docente Admininstrativo</a></li>
                    <li class="<?php echo $menu_a['asignacion_curso_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>asignar_curso/">Asignacion de curso plantel docente</a></li>
                    <li class="<?php echo $menu_a['estudiantes_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>estudiante/">Estudiantes</a></li>
                    <li class="<?php echo $menu_a['padres_u']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>tutor/">Padres de familia</a></li>
                </ul>
            </li>
            <li class="menu-list <?php echo $menu_a['configuracion']; ?>"><a href=""><i class="fa fa-cog"></i> <span>Configuraciónes</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['roles_c']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>user/roles_usuario.php">Roles usuarios</a>
                    </li>
                    <li class="<?php echo $menu_a['faltas_c']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>falta/"> Faltas</a>
                    </li>
                    <li class="<?php echo $menu_a['max_faltas_c']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>pfaltas/"> Configurar maximo de faltas</a>
                    </li>
                    <li class="<?php echo $menu_a['modelo_cit_c']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>citacion/"> Modelo Citaciones</a>
                    </li>
                </ul>
            </li>
            <li class="menu-list <?php echo $menu_a['reporte']; ?>"><a href=""><i class="fa  fa-print"></i> <span>Reportes</span></a>
                <ul class="sub-menu-list">
                    <li class="<?php echo $menu_a['curso_r']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>reporte/">Reporte por curso</a>
                    </li>
                    <li class="<?php echo $menu_a['faltas_r']; ?>">
                        <a href="<?php echo ROOT_CONTROLLER; ?>reporte/faltas.php"> Faltas mas cometidas</a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
            <?php if ($_SESSION['id_rol']==1 || $_SESSION['id_rol']== 5 || $_SESSION['id_rol']==6 || $_SESSION['id_rol']==2): ?>
            <li class="<?php echo $menu_a['kardex']; ?>"><a href="<?php echo ROOT_CONTROLLER; ?>kardex/"><i class="fa fa-bookmark"></i> <span>Kardex diciplinario</span></a>
            </li>
            <?php endif ?>
            <li><a href="<?php echo ROOT_CONTROLLER; ?>login/index.php?logout"><i class="fa fa-sign-in"></i> <span>Salir</span></a></li>
        </ul>
    </div>
</div>