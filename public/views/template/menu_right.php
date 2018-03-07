<div class="menu-right">
    <ul class="notification-menu">
        <li>
            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo ROOT; ?>resources/assets/images/photos/user-avatar.png" alt="" />
                <?php echo $_SESSION['nombre']; ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="<?php echo ROOT_CONTROLLER; ?>user/perfil.php"><i class="fa fa-user"></i>  Mi cuenta</a></li>
                <li><a href="<?php echo ROOT_CONTROLLER; ?>login/index.php?logout"><i class="fa fa-sign-out"></i> Salir</a></li>
            </ul>
        </li>
    </ul>
</div>