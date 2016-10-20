	<html>
    <style>
        h2{
            font-size: 18px;
        }
        li {
            line-height: 25px;
        }
        .videoResponsive{
            margin:0 auto;
            height:0px;
            width:100%; /*tomará el tamaño al 100% del #contenedor*/
            padding-top:56.25%; /*nos ayudara a la proporción del video*/
            position:relative;
        }

        .videoResponsive iframe{
            position:absolute;
            height:100%;
            width:100%;
            top:0px;
            left:0px;
        }
        .videoResponsive video{
            position:absolute;
            height:100%;
            width:100%;
            top:0px;
            left:0px;
        }
        th {
            text-align: left
        }

        i {
            text-align: center
        }

        tr {
            height: 35px;
            background-color: rgb(238, 238, 238)
        }



        .item_div:hover:not(.low):not(.medium):not(.high) {
            background-color: #438eb9!important;
            cursor: pointer;
            color:white!important;
            border-top: 2px solid #438eb9!important;
            border-bottom: 2px solid #438eb9!important;
        }

        .item_div:hover:not(.low):not(.medium):not(.high) .actions {
            border: 2px solid #438eb9!important;
            cursor: pointer;
        }

        .item_div:hover:not(.low):not(.medium):not(.high) .actions_checkbox div {
            background-color: white
        }

        .low:hover , .medium:hover , .high:hover  {
            border: 2px solid #438eb9!important;
            cursor: pointer;
        }

        .selected_item {

        }

        h5, h4, h3, h2, h1 {
            margin:0!important;
            -webkit-margin-before: 0px;
            -webkit-margin-after: 0px;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
        }
        .noselect {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        #show_disabled:hover{
            color: #555;
        }
		
		#chartContainera div canvas {
			position: relative!important;	
		}
		
    </style>
    <?php $this->load->view("superusuario/commons/header"); ?>    
    <body>
        <img src="<?=base_url()?>assets/img/logo_siat.png" id="logo-siat" style="display:none; position: absolute; z-index: 1; top: 5px; left: 10%;" width="100px;">
        <?php $this->load->view("superusuario/commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("superusuario/commons/lateral"); ?>
            <div  id='main-content' class='clearfix '>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid" style="display:none" >
                        <h2>Filtro de Busqueda</h2>
                        <div class="page-header" ></div>
                        <button class="btn btn-success ">Buscar</button>
                        <button class="btn "><a role="button" href="#filterselector" data-toggle="modal" style="color:white; text-decoration:none"> Agregar Filtro </a></button>
                    </div>
                    <div class="row-fluid">
                        <h2 id="tit-pac" class="span12" >Pacientes</h2> 
                    </div>
                    <div id="debug_hiden" style="display:none" >
                    	<?php echo json_encode( $metricas ); ?>
                    </div>
                    <div id="cuadrilla" class="row-fluid" style="background: #f4f4f4; border-radius: 10px; text-align: center;
                     -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.44);
					 -moz-box-shadow:    0px 0px 30px 0px rgba(50, 50, 50, 0.44);
					 box-shadow:         0px 0px 30px 0px rgba(50, 50, 50, 0.44); margin-top:20px" >
                    	<div class="span4">
                        	<div class="row-fluid" >
                            	<div class="span6" style="border-bottom: 2px solid #e4e4e4; border-right: 2px solid #e4e4e4;" >
                                	<h1 style="font-size: 60px; padding-top: 60px;" ><?=$metricas['total']?></h1>
                                    <h4 style="padding-top: 35px; padding-bottom: 27px" >DOSIS TOTALES</h1>
                                </div>
                                <div  class="span6" style="border-bottom: 2px solid #e4e4e4; border-right: 2px solid #e4e4e4; margin-left: 0px;" >
                                	<h1 style="font-size: 60px; padding-top: 60px;" ><?php echo $metricas['uiaplicados'] ? $metricas['uiaplicados'] : "0"?></h1>
                                    <h4 style="padding-top: 35px; padding-bottom: 27px;">UI TOTALES</h1>
                                </div>
                            </div>
                            <div class="row-fluid">
                            	<div class="span6" style="border-right: 2px solid #e4e4e4;" >
                                	<h1 style="font-size: 60px; padding-top: 50px;" ><?=$metricas['profilaxis']?></h1>
                                    <h4 style="padding-top: 35px;  padding-bottom:15px" >TOTAL A PROFILAXIS</h1>
                                </div>
                                <div  class="span6" style="border-right: 2px solid #e4e4e4; margin-left: 0px;" >
                                	<h1 style="font-size: 60px; padding-top: 50px;" ><?=$metricas['demanda']?></h1>
                                    <h4 style="padding-top: 35px; padding-bottom: 40px;" >TOTAL A DEMANDA</h1>
                                </div>
                            </div>
                        </div>
                        <div class="span4"  style="margin-left:0">
                        	<div id="chartContainer" style="width:100%; height:368px;" >
                            
                            </div>
                        </div>
                        <div class="span4" id="ultima-c" style="margin-left:0">
                            <div style="height:184px; border-left: 2px solid #e4e4e4; margin-left: 0px; border-bottom: 2px solid #e4e4e4; "  >
                                <h4 style="padding-top: 25px; padding-bottom: 40px;">RETRASOS DE LA OS</h4>     
                                <?php foreach ($metricas['retrasos'] as $ret) { ?>
                                
                                    <h4 style="text-align: left; margin-left: 20px!important;" ><?=$ret->nombreObraSocial." ".$ret->dif." DIA/S (".$ret->nombre." ".$ret->apellido.")"?> </h4>
                                
                                <?php } ?>                           
                            </div>
                            <div style="height:184px; border-left: 2px solid #e4e4e4; margin-left: 0px;" >
                                <h4 style="padding-top:25px; padding-bottom:40px" >RETRASOS EN EL TRATAMIENTO</h4>
                                
                                <?php foreach ($metricas['pacientesmorosos'] as $pac) { ?>
                                
                                    <h4 style="text-align: left; margin-left: 30px!important;"  ><?=$pac->nombre." ".$pac->apellido." ".$pac->dif." Hs"?> </h4>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="page-header" ></div>
                    <div class="alert alert-success" style="display:<?=$state == 1 ? "block" : "none" ?>" role="alert">Exito al completar la operacion!</div>
                    <div class="alert alert-danger" style="display:<?=$state == 2 ? "block" : "none" ?>" role="alert">Hubo un error al procesar su peticion!</div>
                    <div class="row-fluid text-center" style="position: absolute;top: -44px;left: 0;">
                        <button id="patHemo" onclick="window.location='<?= base_url(); ?>index.php/principalSuperAdmin/listarPacientes/1'" class="btn btn-success span3 offset3">Hemofilia</button>
                        <button id="patOtras" onclick="window.location='<?= base_url(); ?>index.php/principalSuperAdmin/listarPacientes/0'" class="btn btn-success span3">Uso Compasivo</button>
                    </div>
                    
                    <?php if($patologia <> 1){ ?> 
                       <div class="row-fluid text-center">
                        <button id="patHemo" onclick="window.location='<?= base_url(); ?>index.php/principalSuperAdmin/listarPacientes/4'" class="btn btn-success span2">SOLIRIS</button>
                        <button id="patOtras" onclick="window.location='<?= base_url(); ?>index.php/principalSuperAdmin/listarPacientes/3'" class="btn btn-success span2">NAGLAZYME</button>
                        <button id="patOtras" onclick="window.location='<?= base_url(); ?>index.php/principalSuperAdmin/listarPacientes/2'" class="btn btn-success span2">VIMIZIM</button>
                    </div>
                    <?php } ?>
                    
                    <div class='row-fluid noselect' >
                        <div class='pull-right span5' >
                            <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                                <a title="Desvio" class="btn btn-success span2" href="#calculardesvio" data-toggle="modal" style="text-decoration:none; color: orange" >
                                   <i class="icon-book"></i>
                                </a>
                            <?php } ?>
                            <div class="input-append span9">
                              <input placeholder="Ej: santiago%ospil%15.08.2014" id="search_box" class="span12" id="appendedPrependedInput" type="text">
                              <span class="add-on"><i class="icon-search icon-white"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="page-header" ></div>
                    <style>
                        .thead {
                            background : #438eb9!important;
                            color: white!important;
                        }
                        th, td {
                        
                        }
                        input[type=checkbox] {
                            display:none;
                        }
                        #eye_label {
                            background-image: url('<?=base_url()?>assets/img/closed_eye_24.png');
                            background-repeat: no-repeat;
                            background-position: center; 
                            height: 24px;
                            width: 24px;
                            display:inline-block;
                            padding: 0 0 0 0px;
                        }
                        input[type=checkbox]:checked + label {
                            background-image: url('<?=base_url()?>assets/img/open_eye_24.png');
                            height: 24px;
                            background-repeat: no-repeat;
                            background-position: center; 
                            width: 24px;
                            display:inline-block;
                            padding: 0 0 0 0px;
                        }
                    </style>
                    <div class="row-fluid">
                            <div class="row-fluid span12 thead" >
                                <div class="span2">
                                    
                                </div>
                                <div class="span3">
									<h3>Informacion Personal</h3>
                                </div>
                                <div class="span5">
                                   <h3>Metricas</h3>
                                </div>
                                <div class="span2" >
                                    <h3>Acciones</h3>
                                </div>
                            </div>
                            <style>
                                
                                .unseen {
                                    display:none;
                                }
                                .inactive {
                                    color: #878484;
                                }
                                .low  {
                                    background-color: #FFFFBB !important
                                }
                                .medium {
                                    background-color: #FFDEBB !important     
                                }
                                .high {
                                    background-color: #FFBBBB !important
                                }
                                td a {
                                    font-size: 20px;
                                }
                                ._checkbox {
                                    height:15px; 
                                    width:15px; 
                                    border: 1px solid #438eb9!important;
                                    margin:0 auto;
                                }
                                ._checkbox:hover {
                                    background: #e4e4e4!important;
                                }
                                ._checkbox_checked {
                                    background: #438eb9!important;
                                }
								.wrapper .item_div:nth-of-type(even)
								{
									background:rgb(238, 238, 238)
								}
								.wrapper .item_div:nth-of-type(even)
								{
									background:#f9f9f9
								}
                            </style>
                            <section class="wrapper" style="margin-bottom: 30px;" >
                                <?php foreach ($pacientes as $k => $p) { 
									?>
                                    <div class="row-fluid item_div
                                    <?php if($p->isActive == 1){ ?>
                                        <?=$p->desvio_last_dosis < 168 && $p->desvio_last_dosis > 84 ? 'low ' : '' ?>
                                        <?=$p->desvio_last_dosis > 167 && $p->desvio_last_dosis < 336 ? 'medium ' : '' ?>
                                        <?=$p->desvio_last_dosis > 336 ? 'high ' : '' ?>
                                    <?php } ?>
                                        <?=$p->active == 0 ? 'inactive unseen' : '' ?> on_click_details 
                                        "
                                        data-href="<?=base_url()?>index.php/principalSuperAdmin/pacienteProfile/<?=$p->idPaciente?>"
                                        >
                                        <div class="actions_checkbox span2" style="width:100px" >
                                            <img style="width: 100%; padding: 4px" src="<?=base_url()?>profilepicture/<?=$p->imagen_perfil?>" class="" />
                                        </div>
                                        <div class="span4">
                                            <div class='pattern' data-id="<?=$k?>" id="last_name_<?=$k?>" style="margin-top:10px" >
                                                <h1 style="font-size: 29px;"><?=$p->nombre //." (".$p->message.")"?>&nbsp;<?=$p->apellido?></h1>
                                            </div>
                                            <div id="obra_social_<?=$k?>" >
                                                <h5><?=$p->descripcion?></h5>
                                            </div>
                                            <div id="especialista_<?=$k?>"  >
                                                <h5><?=$p->nombreEspecialista." ".$p->apellidoEspecialista?></h5>
                                            </div>
                                        </div>
                                        <div class="span5" >
                                            <div class="span3" style="height:120px; text-align:center">
                                            	<h5 style="margin-top: 10px!important;" >Aplicadas Profilaxis</h5>
                                                <h1 style="font-size: 35px; text-align: center; margin-top: 10px!important;" ><?=$p->totalprofilaxis?></h1>
                                            </div>
                                            <div class="span3" style="height:120px; text-align:center">
                                            	<h5 style="margin-top: 10px!important;"  >Aplicadas Demanda</h5>
                                                <h1 style="font-size: 35px; text-align: center; margin-top: 10px!important;" ><?=$p->totaldemanda?></h1>
                                            </div>
                                            <div class="span3" style="height:120px; text-align:center">
                                            	<h5 style="margin-top: 10px!important;height: 40px;"  >Retrasadas</h5>
                                                <h1 class="retrasadas" style="font-size: 35px; text-align: center; margin-top: 10px!important; " ><?=$p->retrasada?></h1>
                                            </div>
                                            <div class="span3" style="height:120px; text-align:center">
                                            	<h5 style="margin-top: 10px!important;height: 40px;"  >Maximo Desvio</h5>
                                                <h1 style="font-size: 35px; text-align: center; margin-top: 10px!important;" >
													<?=$p->maxDesvio ? $p->maxDesvio : "0" ?>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="actions span1" style="padding:10px" >
                                            <?php if($permiso->perm == 2 || $permiso->perm == 4 ){ ?>
                                                <?php if($p->active == 1 ){ ?>
                                                    <a class="" title="Desactivar Paciente" style="text-decoration:none; color: #55B235; font-size: 20px;" href="<?=base_url()?>index.php/principalSuperAdmin/desactivar/<?=$p->idUsuario?>">
                                                        <i class="icon-user"></i>
                                                    </a>
                                                <?php }else{ ?>
                                                    <a class="" title="Activar Paciente" style="text-decoration:none; color: #878484; font-size: 20px;" href="<?=base_url()?>index.php/principalSuperAdmin/activar/<?=$p->idUsuario?>">
                                                        <i class="icon-user"></i>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if($p->isActive == 1){ ?>
                                                <a class="noimp" title="Ver Perfil Medico" href="<?=base_url()?>index.php/principalSuperAdmin/pacienteProfile/<?=$p->idPaciente?>" style="text-decoration:none; color: orange; font-size: 20px;" >
                                                    <i class="icon-book"></i>
                                                </a>
                                                <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                                                    <a title="Cambiar Especialista Asociado" class="especialista" style="text-decoration:none; color: blue; font-size: 20px;" href="#changeprofesional" 
                                                        data-toggle="modal" role="button" 
                                                        data-idEspecialista="<?=$p->idEspecialista?>" 
                                                        data-id="<?=$p->idUsuario?>"
                                                        >
                                                        <i class="icon-briefcase"></i>
                                                    </a>
                                                    <a title="Cambiar Contraseña" href="#reiniciarmodal" style="text-decoration:none; color: #B64444; font-size: 20px;" class="restore"
                                                        data-toggle="modal"
                                                        data-href="<?=base_url()?>index.php/principalSuperAdmin/defaultPassP/<?=$p->idUsuario?>"
                                                        >
                                                        <i class="icon-key"></i>
                                                    </a>
                                                    <a title="Cambiar Obra Social" href="#cambiarobrasocial" style="text-decoration:none; color: #438eb9!important; font-size: 20px;" class="oschange"
                                                        data-toggle="modal"
                                                        data-href="<?=base_url()?>index.php/principalSuperAdmin/cambioObraSocial/<?=$p->idPaciente?>"
                                                        >
                                                        <i class="icon-plus-sign"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php if($permiso->perm == 4 || $permiso->perm == 3){ ?>
                                                    <a title="Limpiar Dosis sin aplicar/uso" href="#limpiarmodal" style="text-decoration:none; color: #55B235; font-size: 20px;" class="clean"
                                                        data-toggle="modal"
                                                        data-href="<?=base_url()?>index.php/principalSuperAdmin/eliminarDosis/<?=$p->idPaciente?>"
                                                        >
                                                        <i class="icon-leaf"></i>
                                                    </a>
                                                    <a title="Eliminar Usuario" href="#deletemodal" style="text-decoration:none; color: #B64444; font-size: 20px;" class="delete"
                                                        data-toggle="modal"
                                                        data-href="<?=base_url()?>index.php/principalSuperAdmin/eliminar/<?=$p->idUsuario?>"
                                                        >
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                <?php } ?>    
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                        </section>
                    </div>   
                </div>
            </div>
        </div>
        
        <div id="oc" style="bottom:0px; height:50px;
        	 -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.85);
			 -moz-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.85);
			 box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.85); width:100%; background:white; position: fixed">
            <div style="width: 90%; margin-left: 3%;">
                <div style="float:left; height: 10px; padding: 5px; text-align: center; margin-top: 10px; width: 30px; border: 1px solid #e4e4e4; color: white;" >
                </div>
                <h5 style="float:left; padding-top: 10px; color: #878484; padding-left: 10px;" >Inactivo</h5>
                <div style="float:left; height: 10px; padding: 5px; margin-left:30px; text-align: center; margin-top: 10px; background: #FFFFBB; width: 30px; border: 1px solid #e4e4e4; color: white;" >
                </div>
                <h5 style="float:left; padding-top: 10px; color: #878484; padding-left: 10px;" >Desvío Bajo (Entre 3 y 7 dias)</h5>
                <div style="float:left; height: 10px; padding: 5px; margin-left:30px; text-align: center; margin-top: 10px; background: #FFDEBB;  width: 30px; border: 1px solid #e4e4e4; color: white;" >
                </div>
                <h5 style="float:left; padding-top: 10px; color: #878484; padding-left: 10px;" >Desvío Medio (Entre 7 y 14 dias)</h5>
                <div style="float:left; height: 10px; padding: 5px; margin-left:30px; text-align: center; margin-top: 10px;  background: #FFBBBB; width: 30px; border: 1px solid #e4e4e4; color: white;" >
                </div>
                <h5 style="float:left; padding-top: 10px; color: #878484; margin-left: 10px!important;" >Desvío Alto (Mas de 14 dias)</h5>
                <h4 id="show_disabled" style="float:left; cursor:pointer; margin-top: 14px; margin-left: 30px!important;" >
                    <div style="float:left; margin-left: 25px; margin-top: 9px;">
                        <label id="eye_label" ></label> 
                    </div>
                    <p id="mostar_text" style="float:left; margin-left: 10px!important; margin-top:10px" >Mostrar inactivos</p>
                    <div style="clear:both">
                    </div>
                </h4>
                <div style="float:left; height: 30px; width:1px; padding: 5px; margin-left:30px; text-align: center; margin-top: 3px; color: white;" >
                	<select onChange="javascript:filter_data()" id="dates_data" >
                    	<option value="NULL" >Todos</option>
                    	<option value="2014-01" >Enero 2014</option>
                        <option value="2014-02" >Febrero 2014</option>
                        <option value="2014-03" >Marzo 2014</option>
                        <option value="2014-04" >Abril 2014</option>
                        <option value="2014-05" >Mayo 2014</option>
                        <option value="2014-06" >Junio 2014</option>
                        <option value="2014-07" >Julio 2014</option>
                        <option value="2014-08" >Agosto 2014</option>
                        <option value="2014-09" >Setiembre 2014</option>
                        <option value="2014-10" >Octubre 2014</option>
                        <option value="2014-11" >Noviembre 2014</option>
                        <option value="2014-12" >Diciembre 2014</option>
                        <option value="2015-01" >Enero 2015</option>
                        <option value="2015-02" >Febrero 2015</option>
                        <option value="2015-03" >Marzo 2015</option>
                        <option value="2015-04" >Mayo 2015</option>
                        <option value="2015-05" >Junio 2015</option>
                    </select>
                </div> 
            </div>
            <a style="float:left; padding-top: 10px; padding-left: 10px; margin-left: 215px; font-size: 23px;" onClick="window.print();"><i class="icon-print"></i></a>
           
        </div>
        
    </body> 


    <div id="filterselector" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Borrar archivo de Historial</h3>
        </div>
        <div class="modal-body">
            <div>
                <h4>Filtro</h4>
                <select id="selectfilter" >
                    <option data-table="usuario" value="active" >Estado</option>
                    <option data-table="usuario" value="nombre" >
                </select>
                <div class="page-header" style="margin: 1px" ></div>
                <h4>Opciones de filtro</h4>
                <div id="filter-options">
                    <div>
                        <input checked="" type="radio" class="estado" name="active" value="0" /> &nbsp; Inactivo 
                    </div>
                    <div>
                        <input type="radio" class="estado" name="active" value="1" />  &nbsp;  Activo
                    </div>
                </div>
            </div>               
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button id="addfilter" class="btn btn-success" onClick="return false;" >Agregar</button>
        </div>
    </div>
    
    <form id="change-especialista-form" method="POST" action="#">
        <div id="changeprofesional" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Cambiar Especialista</h3>
            </div>
            <div class="modal-body">
                <div>
                    <select name="especialista" id="especialista" class="input-xxlarge" >
                        <?php foreach($especialista as $e){ 
                            if($e->nombre != ""){ ?>
                                <option value="<?=$e->idEspecialista?>" ><?=$e->nombre." ".$e->apellido?></option>
                        <?php }
                            } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button id="addfilter" class="btn btn-success" >Cambiar</button>
            </div>
        </div>
    </form>
    
    <form id="delete-paciente-form" action="#">
        <div id="deletemodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Eliminar Paciente</h3>
            </div>
            <div class="modal-body">
                <p>Si borra este paciente todos su datos se perderan definitivamente.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button id="addfilter" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </form>

    <form id="reiniciar-paciente-form" method="POST" action="#">
        <div id="reiniciarmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Cambio de contraseña</h3>
            </div>
            <div class="modal-body">
                <input class="input-xxlarge form-control" type="text" name="newpassw" required placeholder="Escriba nueva contraseña" />
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button id="restartbutton" class="btn btn-success" >Cambiar</button>
            </div>
        </div>
    </form>

   <form id="cambiarobrasocial-paciente-form" method="POST" action="#">
        <div id="cambiarobrasocial" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Cambio de Obra Social</h3>
            </div>
            <div class="modal-body">
                <select name="obrasocial" class="input-xxlarge form-control">
                <?php foreach ($obrasocial as $key => $value) { ?>
                    <option value="<?=$value->idObraSocial?>"> <?=$value->descripcion?></option>
                <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button id="restartbutton" class="btn btn-success" >Cambiar</button>
            </div>
        </div>
    </form>

    <form id="limpiarmodal-paciente-form" method="POST" action="#">
        <div id="limpiarmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Eliminar Dosis</h3>
            </div>
            <div class="modal-body">
                <h5>Esta a punto de eliminar todas las dosis del paciente que han sido desactivadas o que aun no se han aplicado. Desea continuar?</h5>
                <p>Esta accion NO tendra efecto sobre dosis que ya han sido aplicadas/omitidas o dosis a demanda.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button id="restartbutton" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </form>


    <div id="calculardesvio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Calcular desvío por período</h3>
        </div>
        <div class="modal-body">
            <div>
                <div>
                    <h4 id="desvio_label" >Desvio</h4>
                </div>
                <div>
                    <input type="date" id="from" /> 
                </div>
                <div>
                    <input type="date" id="to" />       
                </div>
                <div>
                    <select id="id_paciente">
                        <?php foreach ($pacientes as $p) { ?>
                            <option value="<?=$p->idPaciente?>"> <?=$p->nombre." ".$p->apellido?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <button id="calcularbutton" class="btn btn-success" >Calcular</button>
        </div>
    </div>

    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

    <script>
        $(document).ready(function(){

            String.prototype.trim = function(){
                return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
            };

            $("#search_box").keyup(function(){
                var sBox = $(this);
                var sSearch = $(this).val().split("%");
                console.log(sSearch);
                if( sBox.val().length > 0 )
                    $(".pattern").each(function(){
                        dExists = true;
                        for (var i = 0; i < sSearch.length; i++){
                            if(sSearch[i].length > 0)
                                if( $(this).text().toLowerCase().indexOf(sSearch[i].toLowerCase()) != -1 || 
                                    $( "#last_name_" + $(this).data("id") ).text().toLowerCase().indexOf(sSearch[i].toLowerCase().trim()) != -1 ||
                                    $( "#obra_social_" + $(this).data("id") ).text().toLowerCase().indexOf(sSearch[i].toLowerCase().trim()) != -1 ||
                                    $( "#especialista_" + $(this).data("id") ).text().toLowerCase().indexOf(sSearch[i].toLowerCase().trim()) != -1 ||
                                    $( "#alta_" + $(this).data("id") ).text().toLowerCase().indexOf(sSearch[i].toLowerCase().trim()) != -1 ){
                                    dExists = true;
                                }else {
                                    dExists = false;   
                                    break;
                                }
                        }
                        if (dExists)
                            $(this).parent().parent().removeClass("unseen");
                        else
                            $(this).parent().parent().addClass("unseen");
                    });
                else 
                    $(".pattern").parent().parent().removeClass("unseen");
            });

            var BASE_URL = "<?=base_url()?>";

            $("#calcularbutton").click(function(){
                console.log("idPaciente: " + $("#id_paciente").val());
                $.ajax({
                    url : BASE_URL + "index.php/principalSuperAdmin/calcularDesvio",
                    type : "POST",
                    data : {
                        from : $("#from").val(),
                        to : $("#to").val(),
                        id_paciente : $("#id_paciente").val()
                    },
                    success : function(data){
                        $("#desvio_label").text("Desvio: " + data);
                    }
                });
            });

            var filters = {
                "active" : {
                    getValue : function(){
                        return $(".estado:checked").val();
                    }
                }
            };

            var SELECT_FILTER = $("#selectfilter");

            var LOCATION = BASE_URL + "index.php/principalSuperAdmin/getPacientesJson";
            var SHEET = $("#tableitem").html();
            var TABLE_BODY = $("#tablebody");

            String.prototype.replaceSheet = function(data){
                var keys = Object.keys(data);
                var sheet = this;
                for(i = 0; i < keys.length; i++){
                    var re = new RegExp("{"+keys[i]+"}", 'g');
                    sheet = sheet.replace( re , function(match, number){
                         return data[keys[i]];
                    });
                }
                return sheet;
            }

            var filterdata = {
                filter : [],
                addfilter : function (n, v, t){
                    this.filter.push({ 
                        name : n+"."+t,
                        value : v
                    });
                }
            };

            $("#addfilter").click(function(){
                
                $("#filtros").append("<div>"+ SELECT_FILTER.val() +"&nbsp;"+ filters[SELECT_FILTER.val()].getValue() +"</div>");
                
                filterdata.addfilter( 
                    SELECT_FILTER.val(), 
                    filters[SELECT_FILTER.val()].getValue(),
                    SELECT_FILTER.find('option:selected').data("table")
                );

                $.ajax({
                    url : LOCATION,
                    data : filterdata.filter,
                    type : "GET",
                    success : function(response){
                        TABLE_BODY.html("");
                        $.each($.parseJSON(response), function(index, value){
                            var temp = SHEET.replaceSheet(value);
                            console.log(value);
                            TABLE_BODY.append(temp);
                        });
                    },
                    error : function(response){
                        console.log(response);
                    }
                });
            });
        });
    </script>
    
    <script>
		
		function filter_data(){
			location.href = "<?=base_url()?>index.php/principalSuperAdmin/listarPacientes/0/" + $("#dates_data").val();	
		}
	
        $(document).ready(function(){

			<?php if ($iDate != NULL) { ?>
				$("#dates_data").val("<?= $iDate ?>");
			<?php } ?>

			document.onkeydown = function ( e ){
				var evt = window.event ? event : e;
				if ( evt.keyCode = 90 && evt.ctrlKeyt) 
					document.getElementById("debug_hidden").style.display = "block";				
			}

            var isSelected = false;

            $("#toggle_all").click(function(){
                if(!isSelected)
                    $("._checkbox").addClass("_checkbox_checked");
                else
                    $("._checkbox").removeClass("_checkbox_checked");
                isSelected = !isSelected;
            });

            $(".on_click_details div:not(.actions):not(.actions_checkbox)").click(function(){

                location.href = $(this).parent().data("href");

            });

            $("._checkbox").click(function(){
                if($(this).hasClass("_checkbox_checked"))
                    $(this).removeClass("_checkbox_checked");
                else
                    $(this).addClass("_checkbox_checked");
            });

            var isShowing = true;

            $(".delete").click(function(){
                $("#delete-paciente-form").attr("action", $(this).data("href"));
            });
            $(".restore").click(function(){
                $("#reiniciar-paciente-form").attr("action", $(this).data("href"));
            });
            $(".clean").click(function(){
                $("#limpiarmodal-paciente-form").attr("action", $(this).data("href"));
            });
            $(".oschange").click(function(){
                $("#cambiarobrasocial-paciente-form").attr("action", $(this).data("href"));
            });
            $(".especialista").click(function(){
                $("#especialista").val($(this).data("idespecialista"));
                $("#change-especialista-form").attr("action", "<?=base_url()?>index.php/principalSuperAdmin/changeEspecialista/"+$(this).data("id"));
            });
            $("#show_disabled").click(function(){

                if(isShowing){
                    $("#eye_label").css( "background-image" , "url('<?=base_url()?>assets/img/open_eye_24.png')" );
                    $("#mostar_text").text("Esconder inactivos");
                    $(".unseen").removeClass("unseen");
                }else{
                    $("#mostar_text").text("Mostrar inactivos");
                    $(".inactive").addClass("unseen");
                    $("#eye_label").css( "background-image" , "url('<?=base_url()?>assets/img/closed_eye_24.png')" );
                }

                isShowing = !isShowing;

            });
			
				window.onload = function () {
				var chart = new CanvasJS.Chart("chartContainer",
				{
					backgroundColor: "transparent",
					exportFileName: "Pie Chart",
					legend:{
						verticalAlign: "bottom",
						horizontalAlign: "center"
					},
					data: [
					{       
						indexLabelFontSize: 10,
						type: "pie",
						toolTipContent: "<strong>#percent%</strong>",
						dataPoints: <?=json_encode($metricas['proveedor'])?> 
				}
				]
				});
				chart.render();
			}
			
        });     
    </script>

    <script type="text/sheet" id="tableitem" >
        <tr >
            <td style="margin-left: 5px">
                <input data-id="{idUsuario}" class="action-all" type="checkbox" value="">{nombre}
            </td>
            <td>
                {apellido}
            </td>
            <td>
                {nombreEspecialista} &nbsp; {apellidoEspecialista}
            </td>
            <td>
                20.11.2013
            </td>
            <td>
                <a style="text-decoration:none; color: #55B235" href="<?=base_url()?>index.php/principalSuperAdmin/desactivar/{idUsuario}">
                    <i class="icon-user"></i>
                </a>
                <a style="text-decoration:none; color: red" href="<?=base_url()?>index.php/principalSuperAdmin/eliminar/{idUsuario}">
                    <i class="icon-trash"></i>
                </a>
            </td>
        </tr>
    </script>
<style type="text/css">
       .retrasadas{ margin-top: 61px!important; }
    @media print {
        .container-fluid{
            width: 100%;
        }
        .actions_checkbox>img{
            width: 100px!important;
        }
        h1{
            font-size: 20px!important;
        }
        h2, h4{
            font-size: 12px!important;
        }
        .item_div{
            border-bottom: 1px solid #000;
        }
        #sidebar, #oc, .thead, .noimp, .noselect, .navbar-inverse, #tit-pac{
            display: none!important;
        }
        #main-content{
            margin-left: 0;
        }
        #logo-siat{
            display: inline-block!important;
        }
        #cuadrilla{
            margin-top: 40px!important;
        }
        #ultima-c{
            margin-left: 40px!important;
        }
    }
</style>
</html>

    
     
    
    
