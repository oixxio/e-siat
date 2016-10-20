

<div id="sidebar" >
    <ul class="nav nav-list">
                <li style="display:none" <?php echo ($this->uri->segment(1) == "principal" ||
                        $this->uri->segment(1) == "principalTest" ||
                        $this->uri->segment(1) == "principalPdf") ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/principal/index">
                                <i class="icon-dashboard"></i>
                                <span>Inicio</span>
                        </a>
                </li>
                
                

                <li <?php echo ($this->uri->segment(1) == "pacientes" ) ? "class='active'" : ""; ?>>
                        <a href="<?=base_url()?>index.php/pacientes/index">
                                <i class="icon-text-width"></i>
                                <span>Pacientes</span>
                        </a>
                </li>

                <li <?php echo ($this->uri->segment(1) == "turnos" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/turnos/index">
                                <i class="icon-list"></i>
                                <span>Turnos</span>
                        </a>
                </li>

                <li <?php echo ($this->uri->segment(1) == "multimediaMedico") ? "class='active open'" : ""; ?> >
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span>Multimedia</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu"  >
                        <li <?php echo ($this->uri->segment(2) == "videos") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimediaMedico/videos">
                                <i class="icon-double-angle-right"></i>
                                Videos
                            </a>
                        </li>

                        <li <?php echo ($this->uri->segment(2) == "pdf") ? "class='active'" : ""; ?> >
                            <a href="<?=base_url()?>index.php/multimediaMedico/pdf">
                                <i class="icon-double-angle-right"></i>
                                PDF
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li <?php echo ($this->uri->segment(1) == "perfil" ) ? "class='active'" : ""; ?> >
                        <a href="<?=base_url()?>index.php/perfil/index">
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