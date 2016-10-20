<div class="navbar navbar-inverse" style="height: 45px">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="#" class="brand">
                <small>
                    <i class="icon-medkit"></i>
                    Panel del Paciente
                </small>
            </a><!--/.brand-->
            <script>
                base_url = '<?= base_url() ?>';
            </script>
            <ul class="nav ace-nav pull-right">
                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="notificaciones">
                        <i class="icon-bell-alt icon-only icon-animated-bell"></i>
                        <span class="badge badge-important"><?= sizeof($notificaciones) ?></span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
                        <li class="nav-header">
                            <i class="icon-warning-sign"></i>
                            <?= sizeof($notificaciones) ?> <?= sizeof($notificaciones) == 1 ? "Notificacion" : "Notificaciones" ?>
                        </li>

                        <?php foreach ($notificaciones as $n) { ?>
                            <li class="notificacion" data-id="<?= $n->id ?>" >
                                <a href="<?= base_url() . $n->url ?>">
                                    <div class="clearfix">
                                        <span class="pull-left">
                                            <i class="btn btn-mini no-hover btn-pink <?= $n->icon ?>"></i>
                                            <?= $n->descripcion ?>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="<?= base_url() ?>index.php/notificacionesPaciente">
                                Todas las Notificaciones
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <img class="nav-user-photo" src="<?= base_url() . "profilepicture/" . $data['imagen_perfil'] ?>" alt="Jason's Photo">
                        <span id="user_info">
                            <small>Bienvenido,</small>
                            <?= $data['nombreUsuario'] ?>
                        </span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
                        <li class="divider"></li>

                        <li>
                            <a href="<?= base_url() ?>index.php/sesion/cerrarSesion">
                                <i class="icon-off"></i>
                                Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!--/.ace-nav-->
        </div><!--/.container-fluid-->
    </div><!--/.navbar-inner-->
</div>