

<div id="sidebar" >
    <ul class="nav nav-list">
                
                <!--<li <?php echo ($this->uri->segment(1) == "principalObrasocial") ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/principalObrasocial/index">
                                <i class="icon-dashboard"></i>
                                <span>Inicio</span>
                        </a>
                </li>-->
                
                <li <?php echo ($this->uri->segment(1) == "pacientesObrasocial") ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/pacientesObrasocial/index">
                                <i class="icon-user"></i>
                                <span>Pacientes</span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "multimediaObrasocial") ? "class='active open'" : ""; ?> >
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span>Multimedia</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu"  >
                        <li <?php echo ($this->uri->segment(2) == "videos") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimediaObrasocial/videos">
                                <i class="icon-double-angle-right"></i>
                                Videos
                            </a>
                        </li>

                        <li <?php echo ($this->uri->segment(2) == "pdf") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimediaObrasocial/pdf">
                                <i class="icon-double-angle-right"></i>
                                PDF
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "prescripcionesObrasocial") ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/prescripcionesObrasocial/index">
                                <i class="icon-list"></i>
                                <span>Prescripciones</span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "notificacionesObrasocial" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/notificacionesObrasocial/index">
                                <i class="icon-warning-sign"></i>
                                <span>Notificaciones</span>
                                <span class="badge badge-success"><?=sizeof($notificaciones)?></span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "perfilObrasocial" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/perfilObrasocial/index">
                                <i class="icon-wrench"></i>
                                <span>Perfil</span>
                        </a>
                </li>
                
                <li>
                        <a href="<?=base_url()?>index.php/sesion/cerrarSesion">
                                <i class="icon-remove"></i>
                                <span>Cerrar Sesion</span>
                        </a>
                </li>
                
            <!--
                <li>
                        <a href="<?=base_url()?>index.php/dosis/index">
                                <i class="icon-list-alt"></i>
                                <span>Tratamiento</span>
                        </a>
                </li>
                <li>
                        <a href="<?=base_url()?>index.php/agenda/index">
                                <i class="icon-calendar"></i>
                                <span>Agenda</span>
                        </a>
                </li>
-->                
               
        </ul>
</div>