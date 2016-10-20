

<div id="sidebar" >
    <ul class="nav nav-list">
                <li <?php echo ($this->uri->segment(1) == "principalPaciente") ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/principalPaciente/index">
                                <i class="icon-dashboard"></i>
                                <span>Inicio</span>
                        </a>
                </li>

                <li <?php echo ($this->uri->segment(1) == "multimedia") ? "class='active open'" : ""; ?> >
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span>Multimedia</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu"  >
                        <li <?php echo ($this->uri->segment(2) == "videos") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimedia/videos">
                                <i class="icon-double-angle-right"></i>
                                Videos
                            </a>
                        </li>

                        <li <?php echo ($this->uri->segment(2) == "pdf") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimedia/pdf">
                                <i class="icon-double-angle-right"></i>
                                PDF
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "turnosPaciente" ) ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/turnosPaciente/index">
                                <i class="icon-text-width"></i>
                                <span>Turnos</span>
                        </a>
                </li>

                <li <?php echo ($this->uri->segment(1) == "tratamientoPaciente" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/tratamientoPaciente/index">
                                <i class="icon-list"></i>
                                <span>Tratamiento</span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "alertasPaciente" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/prescripcionesPaciente/index">
                                <i class="icon-wrench"></i>
                                <span>Prescripciones</span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "alertasPaciente" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/perfilMedico/index">
                                <i class="icon-medkit"></i>
                                <span>Mi perfil Medico</span>
                        </a>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "notificacionesPaciente" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/notificacionesPaciente/index">
                                <i class="icon-warning-sign"></i>
                                <span>Notificaciones</span>
                                <span class="badge badge-success"><?=sizeof($notificaciones)?></span>
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