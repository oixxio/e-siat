

<div id="sidebar" >
    <ul class="nav nav-list">
                
                <?php if(isset($all_permiso['listarPacientes']) && $all_permiso['listarPacientes'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "listarPacientes" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/listarPacientes">
                                    <i class="icon-user"></i>
                                    <span>Pacientes</span>
                            </a>
                    </li>
				<?php } ?>

                <?php if(isset($all_permiso['listarEspecialistas']) && $all_permiso['listarEspecialistas'] != 0){ ?>
    				<li <?php echo ($this->uri->segment(2) == "listarEspecialistas" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/listarEspecialistas">
                                    <i class="icon-medkit"></i>
                                    <span>Especialistas</span>
                            </a>
                    </li>
                <?php } ?>

                <?php if(isset($all_permiso['obraSocial']) && $all_permiso['obraSocial'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "obraSocial" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/obraSocial">
                                    <i class="icon-text-width"></i>
                                    <span>Obra Social</span>
                            </a>
                    </li>
                <?php } ?>

                <?php if(isset($all_permiso['perfil']) && $all_permiso['perfil'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "perfil" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/perfil">
                                    <i class="icon-key"></i>
                                    <span>Perfil</span>
                            </a>
                    </li>
                <?php } ?>

                <?php if(isset($all_permiso['index']) && $all_permiso['index'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "index" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/index">
                                    <i class="icon-play"></i>
                                    <span>Videos</span>
                            </a>
                    </li>
                <?php } ?>

                <?php if(isset($all_permiso['pdf']) && $all_permiso['pdf'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "pdf" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/pdf">
                                    <i class="icon-folder-open"></i>
                                    <span>PDF</span>
                            </a>
                    </li>
                <?php } ?>              

                <?php if(isset($all_permiso['logs']) && $all_permiso['logs'] != 0){ ?>
                    <li <?php echo ($this->uri->segment(2) == "logs" ) ? "class='active'" : ""; ?>>
                            <a href="<?=base_url()?>index.php/principalSuperAdmin/logs">
                                    <i class="icon-list-alt"></i>
                                    <span>Application logs</span>
                            </a>
                    </li>
                <?php } ?>

                <?php if(isset($all_permiso['cerrarSesion']) && $all_permiso['cerrarSesion'] != 0){ ?>
                    <li>
                            <a href="<?=base_url()?>index.php/sesion/cerrarSesion">
                                    <i class="icon-remove"></i>
                                    <span>Cerrar Sesion</span>
                            </a>
                    </li>
                <?php } ?>

                
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