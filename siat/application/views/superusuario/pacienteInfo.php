<html>

<?php $this->load->view("superusuario/commons/header"); ?>

<style type="text/css">
@font-face{
  font-family: "thinfont";
  src: url('<?=base_url()?>assets/images/myfont.ttf');
}
p{
	margin: 0;
}
header{
	width: 100%;
	height: 100px;
	margin-bottom: 10px;
}
.inline{
	display: inline-block;
}

#izquierda{
	width: 65%;
}
#derecha{
	width: 34.3%;
	height: 700px;
	background-color: #F0F0F0;
	position: absolute;
}
#arriba{
	height: 300px;
	margin-bottom: 4px;
	width: 99.4%;
}
#numero{
	width: 50%;
	height: 100%;
	background-color: #F0F0F0;
	margin-right: -1px;
}
#torta{
	width: 49%;
	height: 100%;
	background-color: #F0F0F0;
	float: right;
}
#abajo{
	width: 99.4%;
	height: 396px;
	background-color: #F0F0F0;
}
#estrellas{
	float:  right;
}
#circulito{
	position: absolute;
	margin-top: 72px;
	margin-left: 13.6%;
	background-color: #44b5df;
	padding: 15px;
	border-radius: 32px;
	font-size: 13px;
	height: 38px;
	width: 38px;
	color: white;
}
#circulo{
	background-image: url(<?= base_url() ?>assets/img/circulo.png);
	background-repeat: no-repeat;
	background-size: 100%;
	height: 100px;
	line-height: 100px;
	width: 100px;
	z-index: 1;
	text-align: center;
	color: white;
	font-size: 2.5em;
}
#nombreBarra{
	z-index: -1;
	width: 93%;
	height: 50px;
	line-height: 50px;
	position: absolute;
	margin-top: 25px;
	margin-left: -20px;
	background: #ffffff; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZmZmZmZmIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2YyZjJmMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
	background: -moz-linear-gradient(top,  #ffffff 0%, #ffffff 0%, #f2f2f2 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(0%,#ffffff), color-stop(100%,#f2f2f2)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 ); /* IE6-8 */
	-webkit-box-shadow:  0px 0px 5px -2px #767575;

	box-shadow:  0px 0px 5px -2px #767575;
}
#nombre, #estrellas{
	margin-left: 33px;
	font-size: 1.6em;
}
#footerTorta{
	background-color: #44b5df;
	background-image: url(<?= base_url() ?>assets/img/footerTorta.png);
	background-repeat: no-repeat;
	background-size: 100%;
	height: 75px;
	width: 100%;
}
#footerNumero{
	background-color: #44b5df;
	height: 75px;
	width: 100%;
}
#headNumero{
	width: 100%;
	height: 225px;
	text-align: center;
}
#cuadro1{
	width: 50%;
	height: 100%;
}
#cuadro2{
	height: 100%;
	width: 49%;
	float: right;
}
.corazonCruz{
	margin-left: 4%;
	height: 100%;
	width: 26%;
}
.profilaxisDemanda{
	height: 100%;
	width: 68%;
	float: right;
}
.numeros{
	width: 100%;
	height: 45px;
	text-align: center;
	line-height: 45px;
	font-size: 2em;
}
.letras{
	width: 100%;
	height: 30px;
	text-align: center;
	line-height: 30px;
	color: white;
	font-size: 1.5em;
}
#nroApp{
	height: 140px;
	font-size: 8em;
	padding-top: 20px;
}
#letrasApp{
	height: 40px;
	sfont-size: 2em;
}

@media screen and (max-width:1400px){
	#nombreBarra{
		width: 92%;
	}
}
@media screen and (max-width:1200px){
	#nombreBarra{
		width: 91%;
	}
}
@media screen and (max-width:1050px){
	#nombreBarra{
		width: 90%;
	}
}
@media screen and (max-width:940px){
	#nombreBarra{
		width: 88%;
	}
}
@media screen and (max-width:820px){
	#nombreBarra{
		width: 87%;
	}
}
@media screen and (max-width:720px){
	#nombreBarra{
		width: 86%;
	}
}
@media screen and (max-width:680px){
	#nombreBarra{
		width: 84%;
	}
}
@media screen and (max-width:550px){
	#nombreBarra{
		width: 82%;
	}
}
h5, h4, h3, h2, h1 {
	-webkit-margin-before: 0px;
	-webkit-margin-after: 0px;
	-webkit-margin-start: 0px;
	-webkit-margin-end: 0px;
}

.historia_clinica > div > div > input, .historia_clinica > div > div > select{
	height: 31px; margin-top: 3px;
	width: 100%;
}
.historia_clinica > div > div > textarea{
	width: 100%;
}
.radio-inline{
	display: inline-block;
}
.radio-right{
	margin-left: 50px;
}
</style>

<body>
	<?php $this->load->view("superusuario/commons/navbar"); ?>
	<div class='container-fluid' id="main-container" style='padding:0px'>
		<a id="menu-toggler" href="#">
			<span></span>
		</a>
		<?php $this->load->view("superusuario/commons/lateral"); ?>
		<div  id='main-content' class='clearfix'>
			<div id='page-content' class='clearfix'>
				<div class="row-fluid">
					<div class="span2">
						<div style="width:100%;">
						 <ul class="ace-thumbnails" style="width:100%;">
							<li style="width:100%;">
							  <div style="width:100%;">
								<img class="img-polaroid" src="<?= base_url() . "profilepicture/" . $info->imagen_perfil ?>" />
								<div class="text">
									<div class="inner">
									 <span>Cambiar imagen</span>
									 <br>
									 <a href="#cambiarImagen" data-toggle="modal">
									  <i class="icon-picture"></i>
								  </a>
							  </div>
						  </div>
					  </div> </li></ul></div></div>
					<div class="span4">
						<h1><?= $info->nombre . " " . $info->apellido ?></h1>
						<h4><?= $info->direccion . ", " . $info->ciudad . ", " . $info->estado ?></h4>
						<h4><?= $info->telefono ?></h4>
					</div>
				</div>
				<div class="page-header"> </div>
				<?php if ($state == "2") { ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Error: </strong>Ha ocurrido un error al ejecutar la consulta. Intente nuevamente.
				</div>
				<?php } else if ($state == "1") { ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Completado: </strong>Operacion completada correctamente.
				</div>
				<?php } ?>
				<div class="tabbable tabs-stacked">
					<ul class="nav nav-tabs">
						<li class=""><a href="#A" data-toggle="tab">Perfil</a></li>
						<li class=""><a href="#B" data-toggle="tab">Historia Clinica</a></li>
						<li class="active" ><a href="#C" data-toggle="tab">Tratamiento</a></li>
						<li class=""><a href="#D" data-toggle="tab">Receta</a></li>
						<li class=""><a href="#E" data-toggle="tab">Foja</a></li>
						<li class=""><a href="#F" data-toggle="tab">Test Adherencia</a></li>
						<li class=""><a href="#G" data-toggle="tab">Score Clinico</a></li>
						<li class=""><a href="#H" data-toggle="tab">Metricas</a></li>
						<li class=""><a href="#I" data-toggle="tab">Historia</a></li>
						<li class=""><a href="#J" data-toggle="tab">Carga de archivos</a></li>
						<li class=""><a href="#K" data-toggle="tab">Reintegro</a></li>
					</ul>
					<div class="tab-content" style="margin-bottom: 50px">
						<div class="tab-pane" id="A">
							<div class="row-fluid">
								<div class="span14">
									<div class="row-fluid">

										<script type="text/javascript">
											//edad
											var fecha_nacimiento = new Date("<?=$info->fecha_nacimiento?>");
											var fecha_actual = new Date();
											var edad = fecha_actual.getFullYear()-fecha_nacimiento.getFullYear();
											if ((fecha_actual.getMonth() < fecha_nacimiento.getMonth()) || (fecha_actual.getMonth() == fecha_nacimiento.getMonth() && fecha_actual.getDate() < fecha_nacimiento.getDate())) {
												edad--;
											}                                 
										</script>

										<div class="span6">
											<h4><?= "Telefono personal: " . $info->telefono_personal ?></h4>
										</div>
										<div class="span6">
											<h4><?= "Telefono hogar: " . $info->telefono_casa ?></h4>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h4><?= "Telefono oficina: " . $info->telefono_oficina ?></h4>
										</div>
										<div class="span6">
											<h4><?= "Genero: " . $info->genero ?></h4>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h4><?= "Lugar nacimiento: " . $info->lugar_nacimiento ?></h4>
										</div>
										<div class="span6">
											<h4><?= "Fecha nacimiento: " . $info->fecha_nacimiento ?></h4>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h4><?= "Titulo: " . $info->titulo ?></h4>
										</div>
										<div class="span6">
											<h4><?= "Codigo postal: " . $info->codigo_postal ?></h4>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h4><?= "Nro. seguridad social: " . $info->nro_seguridad_social ?></h4>
										</div>
										<div class="span6">
											<h4><script type="text/javascript">document.write("Edad: "+edad);</script></h4>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h4><?= "Correo electronico: " . $info->correo_electronico ?></h4>
										</div>
									</div>
									<div class="page-header"></div>
									<div class="row-fluid">
										<div class="span6">
											<a class="btn btn-success" href="#editarPacienteInfo" data-toggle="modal" >Editar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="B">
							<?php if (sizeof($files) > 0) { ?>
							<div class="row-fluid" >
								<div class="tabbable tabs-left">
									<ul class="nav nav-tabs">
										<?php for ($i = 1; $i < sizeof($files) + 1; $i++) { ?>
										<li <?= ($i == 1) ? "class='active'" : "" ?> ><a href="#A<?= $i ?>" data-toggle="tab">Archivo <?= $i ?></a></li>
										<?php } ?>
									</ul>
									<div class="tab-content">
										<?php for ($i = 1; $i < sizeof($files) + 1; $i++) { ?>
										<div  class="<?= ($i == 1) ? "active " : "" ?> tab-pane" id="A<?= $i ?>">
											<div class="row-fluid">
												<div class="span10 offset1" >
													<a href="#borrado" data-id="<?= $files[$i - 1]->id ?>" role="button" data-toggle="modal" class="borrar_button btn btn-danger pull-right">
														<i class="icon-trash  bigger-110 icon-only"></i>
													</a>
													<a class="btn btn-primary pull-right" role="button" data-toggle="modal">
														<i class="icon-arrow-down  bigger-110 icon-only"></i>
													</a>
													<a class="btn btn-warning pull-right" role="button" data-toggle="modal">
														<i class="icon-refresh  bigger-110 icon-only"></i>
													</a>
												</div>
											</div>
											<div class="page-header" ></div>
											<div class="row-fluid span10 offset1">
												<div class="span12">
													<iframe id="ifhist" src="<?= base_url() . "uploads/" . $files[$i - 1]->url ?>" style="width:100%; height: 800px" frameborder="0" ></iframe>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="page-header" ></div>
							<?php } ?>
							<div class="row-fluid">
								<form action="<?= base_url() ?>index.php/pacientes/uploadSuper/<?= $idPaciente ?>" method="POST" enctype="multipart/form-data">
									<div class="span12">
										<input type="file" name="userfile" id="id-input-file-3" />
									</div>
									<div>
										<input type="submit" value="subir" class="btn btn-primary pull-right" />
									</div>
								</form>
							</div>
							<div class="page-header"></div>
							<?php foreach ($historial as $h) { ?>
							<div class="row-fluid">
								<div class="span2">
									<h3><?= $h->fecha ?></h3>
								</div>
								<div class="span10">
									<h5><?= $h->observacion ?></h5>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="tab-pane active" id="C">
							<div class="row-fluid">
								<div class="span11">
									<h1>Detalle del Tratamiento</h1>
									<!--<?php var_dump($droga) ?>-->
								</div>
								<div>
									<a href="#reformulado" data-toggle="modal" class="btn btn-primary" >
										Reformular
									</a>
								</div>
							</div>
							<div class="page-header" >
							</div>
							<div class="row-fluid">
								<div class="offset1 span2 row-fluid" >
									<div class="span12" style="height:10px; padding:5px; text-align:center; margin-top:1px; background: rgb(106, 213, 227); color: white" >
										<h5>Profilaxis no aplicada</h5>
									</div>
								</div>
								<div class="span2 row-fluid" >
									<div class="span12" style="height:10px; padding:5px; text-align:center; margin-top:1px; background: rgb(106, 196, 96); color: white" >
										<h5>Profilaxis a tiempo</h5>
									</div>
								</div>
								<div class="span2 row-fluid" >
									<div class="span12" style="height:10px; padding:5px; text-align:center; margin-top:1px; background: #FFA420; color: white" >
										<h5>Profilaxis retrasada</h5>
									</div>
								</div>
								<div class="span2 row-fluid" >
									<div class="span12" style="height:10px; padding:5px; text-align:center; margin-top:1px; background: #EA899A; color: white" >
										<h5>Profilaxis omitida</h5>
									</div>
								</div>
								<div class="span2 row-fluid" >
									<div class="span12" style="height:10px; padding:5px; text-align:center; margin-top:1px; background: red; color: white" >
										<h5>A demanda</h5>
									</div>
								</div>
							</div>
							<div class="page-header"> </div>
							<div class="row-fluid">
								<div id="calendar" class="span8 center offset2"></div>
							</div>
					<!--<div class="row-fluid">
					<div class="span12">
					<table style="width:100%" id="table_dosis">
					<thead>
					<th>Fecha Prevista</th>
					<th>Fecha Real</th>
					<th>Cantidad</th>
					<th>Tipo</th>
					<th>Aplicada</th>
					</thead>
					<tbody>
					<?php foreach ($tratamiento['dosis'] as $dosis) { ?>
					<tr>
					<td>
					<?= $dosis->fechaHoraPrevisto ?>
					</td>
					<td>
					<?= $dosis->aplicada != 0 ? $dosis->fechaHoraReal : "" ?>
					</td>
					<td>
					<?= $dosis->cantidad ?>
					</td>
					<td>
					<?= $dosis->tipo == 1 ? "profilaxis" : "demanda" ?>
					</td>
					<td>
					<?= $dosis->aplicada != 0 ? "Aplicada" : "Sin aplicar" ?>
					</td>
					</tr>
					<?php } ?>
					</tbody>
					</table>
					</div>
				</div> -->
				<?php if($data['tipoUsuario'] == "superadmin"): ?>
				 <a href="#nuevaDemanda" data-toggle="modal" class="btn btn-primary" >
					Demanda
				</a>
			<?php endif; ?>
			</div>
			<div class="tab-pane" id="D">
				<div class="row-fluid">
					<table class="table-striped span12">
						<thead>
							<th>
								Descripcion
							</th>
							<th>
								Cantidad Solicitada
							</th>
							<th>
								Fecha Solicitud
							</th>
							<th>
								Entregada
							</th>
							<th>
								Fecha Entregada
							</th>
							<th>
								Cantidad Entregada
							</th>
							<th>
								Recibida
							</th>
							<th>
								Fecha recibida
							</th>
							<th>
								Cantidad recibida
							</th>
						</thead>
						<tbody>
							<?php foreach ($prescripciones as $p) { ?>
							<tr>
								<td>
									<?= $p->descripcion ?>
								</td>
								<td>
									<?= $p->cantidad ?>
								</td>
								<td>
									<?= $p->fechaRecetada ?>
								</td>
								<td>
									<?= $p->entregada == 1 ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>" ?>
								</td>
								<td>
									<?= $p->fechaEntregada == 0 ? "-" : $p->fechaEntregada ?>
								</td>
								<td>
									<?= $p->cantidadEntregada == 0 ? "-" : $p->cantidadEntregada ?>
								</td>
								<td>
									<?= $p->recibido == 1 ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>" ?>
								</td>
								<td>
									<?= $p->fechaRecibido == 0 ? "-" : $p->fechaRecibido ?>
								</td>
								<td>
									<?= $p->cantidadRecibida == 0 ? "-" : $p->cantidadRecibida ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="page-header"></div>
				<div class="pull-right">
					<a href="#nuevaReceta" data-toggle="modal" class="btn btn-primary" >Nueva Receta</a>
				</div>
			</div>
			<div class="tab-pane printable" id="E" style='overflow:hidden' >
				<div class="row-fluid">
					<div style='cursor:pointer; position:absolute; margin-left: 94%' id='print'>
						<i class='icon-print icon-3x'> </i>
					</div>
					<div class="span12">
						<h2 style="text-align: center">JUSTIFICACION USO FACTOR ANTIHEMOFILICO</h2>
					</div>
				</div>
				<div class="page-header"></div>
				<div class="row-fluid">
					<div class="span6">
						<h4>Paciente: <?= $info->nombre . ", " . $info->apellido ?></h4>
					</div>
					<div class="span5">
						<h4>OS: <?=$obrasocial->descripcion?></h4>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span9">
						<h4>Diagnostico: <?= $tratamiento['detalle'] ?></h4>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<h4 id="tratamiento_month_specs" >Mes tratamiento: </h4>
					</div>
					<div class="span3">
						<h4>Tipo Hemofilia: <?=$info->tipo?></h4>
					</div>
				</div>
				<div class="page-header"></div>
				<div class="row-fluid search_filter_foja" style="padding:15px">
					<div class="span6" >
						<select id="foja_select_month" class="form-control input input-xxlarge" >
							<option value="01" >Enero</option>
							<option value="02" >Febrero</option>
							<option value="03" >Marzo</option>
							<option value="04" >Abril</option>
							<option value="05" >Mayo</option>
							<option value="06" >Junio</option>
							<option value="07" >Julio</option>
							<option value="08" >Agosto</option>
							<option value="09" >Setiembre</option>
							<option value="10" >Octubre</option>
							<option value="11" >Noviembre</option>
							<option value="12" >Diciembre</option>
						</select>
					</div>
					<div class="span6" >
						<select id="foja_select_year" class="form-control input input-xxlarge" >
							<option value="2013" >2013</option>
							<option selected value="2014" >2014</option>
							<option value="2015" >2015</option>
							<option value="2016" >2016</option>
							<option value="2017" >2017</option>
							<option value="2018" >2018</option>
							<option value="2019" >2019</option>
							<option value="2020" >2020</option>
							<option value="2021" >2021</option>
							<option value="2023" >2023</option>
							<option value="2024" >2024</option>
							<option value="2025" >2025</option>
						</select>
					</div>
				</div>
				<div class="page-header search_filter_foja"></div>
				<div class="row-fluid">
					<div>
						<table class="span12 table table-striped">
							<thead >
								<th >
									Fecha
								</th>
								<th >
									Cantidad
								</th>
								<th >
									Marca
								</th>
								<th >
									Lote
								</th>
								<th >
									Motivo de Uso
								</th>
								<th >
									Firma
								</th>
							</thead>
							<tbody id="foja_table_body" >
								<?php
								foreach ($tratamiento['dosis'] as $dosis) {
									if ($dosis->aplicada == 1) {
										?>
										<tr>
											<td>
												<?= $dosis->fechaHoraReal ?>
											</td>
											<td>
												<?= $dosis->dosis ?> UI
											</td>
											<td>
												<?= $dosis->comercial." ".$dosis->proveedor ?>
											</td>
											<td>
												<?= $dosis->lote ?>
											</td>
											<td>
												<?= $dosis->tipo == 1 ? "profilaxis" : "demanda" ?>
											</td>
											<td>

											</td>
										</tr>

										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="search_filter_foja" >
						<form method="POST" action="<?=base_url()?>index.php/pacientes/setLote/<?=$idPaciente?>" >
							<div class="pull-right">
								<span>
									<input name="lote" type="text" placeholder="Lote" style="height:40px; margin:0" class="form-control input input-xxlarge" />
									<input name="month" id="month_form_field" type="text" placeholder="Lote" style="height:40px; margin:0; display:none" class="form-control input input-xxlarge" />
									<input name="year" id="year_form_field" type="text" placeholder="Lote" style="height:40px; margin:0; display:none" class="form-control input input-xxlarge" />
								</span>
								<span>
									<input type="submit" class="btn btn-success" />
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="tab-pane printable" id="F" style='overflow:hidden' >
				<form action="<?=base_url()?>index.php/pacientes/cargarAdherencia/<?= $idPaciente ?>" method="POST">
					<div>
						<div >
							<h3 id="myModalLabel">CUESTIONARIO ADHERENCIA SMAQ
								<?php if(isset($adherencia->id)){ ?>
								&nbsp;(<?=$adherencia->fecha ?>)
								<?php } ?>
							</h3>
						</div>
						<div class="page-header"></div>
						<?php if(!isset($adherencia->id)){ ?>
						<div >
							<div class="pregunta">
								<label class="control-label" for="respuesta1">Alguna vez ¿Olvida administrase la medicación?</label>
								<div class="row-fluid">
									<div class="span1">
										<input type="radio"  name="respuesta1" value="1">Si <br>
									</div>
									<div class="span1">
										<input type="radio" name="respuesta1" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta2">Se administra siempre la medicación a la hora indicada?</label>
								<div class="row-fluid">
									<div class="span1">
										<input  type="radio" name="respuesta2" value="1">Si <br>
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta2" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta3">Alguna vez ¿deja de administrase la medicación si se siente mal?</label>
								<div class="row-fluid">
									<div class="span1">
										<input  type="radio" name="respuesta3" value="1">Si <br>
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta3" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta4">En el último mes ¿cuántas veces no se administró alguna dosis?</label>
								<div class="row-fluid">
									<div class="span2">
										<input  type="radio" name="respuesta4" value="1">Ninguna
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta4" value="2">1-2
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta4" value="3">3-5
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta4" value="4">6-10
									</div>
									<div class="span2">
										<input  type="radio" name="respuesta4" value="5">más de 10
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta5">En los últimos 3 meses ¿cuántos días no se administrase la medicación?</label>
								<div class="row-fluid">
									<div class="span2">
										<input  type="radio" name="respuesta5" value="1">Ninguna
									</div>
									<div class="span1">
										<input type="radio" name="respuesta5" value="2">1-4
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta5" value="3">5-8
									</div>
									<div class="span1">
										<input  type="radio" name="respuesta5" value="4">9-15
									</div>
									<div class="span2">
										<input  type="radio" name="respuesta5" value="5">más de 15
									</div>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div >
							<div class="pregunta">
								<label class="control-label" for="respuesta1">Alguna vez ¿Olvida administrase la medicación?</label>
								<div class="row-fluid">
									<div class="span1">
										<input <?=$adherencia->pregunta_1 == 1 ? "checked" : "" ?> type="radio"  name="respuesta1" value="1">Si <br>
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_1 == 2 ? "checked" : "" ?> type="radio" name="respuesta1" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta2">Se administra siempre la medicación a la hora indicada?</label>
								<div class="row-fluid">
									<div class="span1">
										<input <?=$adherencia->pregunta_2 == 1 ? "checked" : "" ?> type="radio" name="respuesta2" value="1">Si <br>
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_2 == 2 ? "checked" : "" ?> type="radio" name="respuesta2" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta3">Alguna vez ¿deja de administrase la medicación si se siente mal?</label>
								<div class="row-fluid">
									<div class="span1">
										<input <?=$adherencia->pregunta_3 == 1 ? "checked" : "" ?> type="radio" name="respuesta3" value="1">Si <br>
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_3 == 2 ? "checked" : "" ?> type="radio" name="respuesta3" value="2">No
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta4">En el último mes ¿cuántas veces no se administró alguna dosis?</label>
								<div class="row-fluid">
									<div class="span2">
										<input <?=$adherencia->pregunta_4 == 1 ? "checked" : "" ?> type="radio" name="respuesta4" value="1">Ninguna
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_4 == 2 ? "checked" : "" ?> type="radio" name="respuesta4" value="2">1-2
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_4 == 3 ? "checked" : "" ?> type="radio" name="respuesta4" value="3">3-5
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_4 == 4 ? "checked" : "" ?> type="radio" name="respuesta4" value="4">6-10
									</div>
									<div class="span2">
										<input <?=$adherencia->pregunta_4 == 5 ? "checked" : "" ?> type="radio" name="respuesta4" value="5">más de 10
									</div>
								</div>
							</div>

							<div class="page-header"></div>

							<div class="pregunta">
								<label class="control-label" for="respuesta5">En los últimos 3 meses ¿cuántos días no se administrase la medicación?</label>
								<div class="row-fluid">
									<div class="span2">
										<input <?=$adherencia->pregunta_5 == 1 ? "checked" : "" ?> type="radio" name="respuesta5" value="1">Ninguna
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_5 == 2 ? "checked" : "" ?> type="radio" name="respuesta5" value="2">1-4
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_5 == 3 ? "checked" : "" ?> type="radio" name="respuesta5" value="3">5-8
									</div>
									<div class="span1">
										<input <?=$adherencia->pregunta_5 == 4 ? "checked" : "" ?> type="radio" name="respuesta5" value="4">9-15
									</div>
									<div class="span2">
										<input <?=$adherencia->pregunta_5 == 5 ? "checked" : "" ?> type="radio" name="respuesta5" value="5">más de 15
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="page-header"></div>

						<div >
							<button class="btn btn-primary" style="float:right">Guardar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane" id="G">
				<form action="<?=base_url()?>index.php/pacientes/cargarScoreClinico/<?=$idPaciente?>" method="POST" >
					<div >
						<div class="row-fluid">

							<h3 class="span10">Puntuacion de salud articular en hemofilia 2.0 &nbsp; <?=$scoreResult != false ? "(".$scoreResult['score']->fecha.")" : ""?> </h3>
							<h5 class="pull-right span2" id="promedio" >Puntuacion Promedio: </h5>
						</div>
						<div class="page-header" ></div>

						<table id="test1" class="table">
							<thead>
								<th>

								</th>
								<th>
									Codo Izquierdo
								</th>
								<th>
									Codo Derecho
								</th>
								<th>
									Rodilla Izquierda
								</th>
								<th>
									Rodilla Derecha
								</th>
								<th>
									Tobillo Izquierdo
								</th>
								<th>
									Tobillo Derecho
								</th>
							</thead>

							<tbody>
								<?php

								$row = Array();

								foreach($score as $s){ ?>
								<tr>
									<td>
										<?=$s['descripcion']?>
									</td>
									<?php for($i=0 ; $i < 6; $i++) {
										$ne = true;
										$options = "";
										?>
										<td>
											<div style="width:100%">
												<div style="width:50%; float:left; margin-right:5%">
													<?php   foreach($s['parametros'] as $k => $p) {
														if($scoreResult != false && $scoreResult[$i+1][$s['id']]->valor==$p->value) $ne = false;

														if($scoreResult != false && $scoreResult[$i+1][$s['id']]->valor==$p->value){
															$row[$i] = (isset($row[$i]) ? $row[$i] : 0) + $p->value;
														}
														$options .= "<option ". ($scoreResult != false ? ($scoreResult[$i+1][$s['id']]->valor==$p->value ? " selected " : '') : '')." value='".($p->value)."'>".$p->descripcion." </option>";
													}
													?>
													<select class="selectNE" <?= $scoreResult != false && $ne ? "disabled" : "" ?> name='<?=$s['id']."_".(($i)+1)?>' style="width:100%;">
														<?=$options?>
														<?=$scoreResult != false && $ne ? "<option value='NE' selected>NE</select>" : "" ?>
													</select>
												</div>
												<div style="width:45%; float: left">
													<input class="checkNE" <?= $scoreResult != false && $ne ? "checked" : "" ?> type="checkbox" style="float:left"/>
													<h5 style="float:left">NE</h5>
												</div>
												<div style="clear:both">
												</div>
											</div>
										</td>
										<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td>
											Total de articulaciones
										</td>
										<td class="total" id="row-1">
											<?= isset($row[0]) ? $row[0] : 0 ?>
										</td>
										<td class="total" id=""row-2>
											<?= isset($row[1]) ? $row[1] : 0 ?>
										</td>
										<td class="total" id="row-3">
											<?= isset($row[2]) ? $row[2] : 0 ?>
										</td>
										<td class="total" id="row-4">
											<?= isset($row[3]) ? $row[3] : 0 ?>
										</td>
										<td class="total" id="row-5">
											<?= isset($row[4]) ? $row[4] : 0 ?>
										</td>
										<td class="total" id="row-6">
											<?= isset($row[5]) ? $row[5] : 0 ?>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="page-header" ></div>
							<div class="modal-footer">
								<button id="reset" class="btn btn-danger">Reiniciar</button>
								<button class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="H" style='overflow:hidden'>
					<script>
					<?php
					echo "var datosVisit= [";
					
					$cont = 0;
					
					foreach ($metricas['dosis'] as $metrica) {
						echo (($cont != 0) ? "," : "" ) . "{ x : new Date('" . $metrica->fechaHoraReal . "') , y : " . abs($metrica->diff) . " }";
						$cont++;
					}
					
					echo "];";
					?>
					</script>
					
					<script>
					<?php
					echo "var datosVisit2= [";
					
					$cont = 0;
					
					foreach ($metricas['dosis'] as $metrica) {
						echo (($cont != 0) ? "," : "" ) . "{ x : new Date('" . $metrica->fechaHoraReal . "') , y : " . abs($metrica->diff2) . " }";
						$cont++;
					}
					
					echo "];";
					?>
					
					</script>
					<div id="loader-screen" style="width:98%; height:98%; position: absolute; background: white; z-index: 100">
						<div style="width: 200px; height: 60px; margin: 25% auto">
							<img src="<?=base_url()?>assets/images/ajax-loader.gif"  style="width:40px; height:40px; margin-left: 79px; margin-bottom: 5px" />
							<h5 style="text-align:center; font-size: 10px; color: #777" >Cargando</h5>
						</div>
					</div>
					<div class="row-fluid" style="width:98%">
						<h1 class="span5 pull-left" >Dashboard de Metricas</h1>
						<button class="span1 btn btn-default pull-right" id="printButton" ><i class="icon-print"></i></button>
					</div>
					<div class="page-header"></div>
					<div class="row-fluid" id="model-vertical-rectangle">
						<div class="span7" id="dashboard">
							<div class="row-fluid" >
								<div class="span6 square model" style="background:#e4e4e4">
									<div style="padding-top: 35%; width:100%; height:45%">
										<h1 style="text-align:center; font-size:15em" ><?=$metricas['total']?></h1>
									</div>
									<div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
										<div class="span6" style="text-align:center" >
											<h3 style="color:white" > &nbsp;&nbsp;&nbsp; Profilaxis - <?=$metricas['profilaxis']?></h3>
										</div>
										<div class="span6" >
											<h3 style="color:white" > &nbsp;&nbsp;&nbsp; Demanda - <?=$metricas['demanda']?></h3>
										</div>
									</div>
								</div>
								<div class="span6 square" style="background:#e4e4e4">
									<div style="width:100%; height:80%">
										<div id="chartContainerTorta" style='height: 100%; width:100%'>
										</div>
									</div>
									<div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
										<h1 style="text-align:center; color:white;">Metricas</h1>
									</div>
								</div>
							</div>
					<!--<div class="span4 square" style="background:#e4e4e4; display:none">
					<div style="padding-top: 35%; width:100%; height:45%">
					<h1 style="text-align:center; font-size:15em" ><?=$metricas['profilaxis']?></h1>
					</div>
					<div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
					<h1 style="text-align:center; color:white; font-size:2em">A demanda</h1>
					</div>
					</div>
					<div class="span4 square" style="background:#e4e4e4; display: none">
					<div style="padding-top: 35%; width:100%; height:45%">
					<h1 style="text-align:center; font-size:15em" ><?=$metricas['demanda']?></h1>
					</div>
					<div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
					<h1 style="text-align:center; color:white; font-size:2em">Profilaxis</h1>
					</div>
				</div>-->
				<div class="row-fluid" style="margin-top:2%">
					<div class="span6 square model" style="background:#e4e4e4">
						<div style="padding-top: 35%; width:100%; height:45%">
							<h1 style="text-align:center; font-size:15em" ><?=$metricas['omitidas']    ?> </h1>
						</div>
						<div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
							<div class="span12" style="text-align:center" >
								<h3 style="color:white" > Dosis Omitidas en Profilaxis</h3>
							</div>
						</div>
					</div>
					<div class="span6 square model" style="background:#e4e4e4">
						<div style="padding-top: 35%; width:100%; height:45%">
							<h1 style="text-align:center; font-size:15em" ><?=$metricas['maxDesvio']    ?> <small>Hs</small></h1>
						</div>
						<div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
							<div class="span12" style="text-align:center" >
								<h3 style="color:white" > Desvio Maximo Mensual</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="articulaciones" class="row-fluid span5 vertical-rectangle" style="height:100%">
				<div style="height:100%; border-radius: 10px 10px 0px 0px; background: #42a5cb" >
					<div class="row-fluid" style="height:9%">
						<div class="span6" style="border-radius: 10px 0px 0px 0px; background: #52b4d8; height:100%" ></div>
						<div class="span6" style="border-radius: 0px 10px 0px 0px; height:100%" >
							<h2 style="color:white; margin-top: 10%; text-align: center; font-family: thinfont">ARTICULACIONES</h2>
						</div>
					</div>
					<div style="height:91%" >
						<canvas width="534" height="682" id="canvas-man" style="width:100%; height:100%">
						</canvas>
					</div>
				</div>
					<!--<div style="height:35%">
				</div>-->
			</div>
		</div>
		<div class="row-fluid" style="margin-top:2%">
			<div class=" span12 rectangle" style="background:#e4e4e4" >
				<div style="width:100%; height:80%">
					<div id="chartContainerSpline" style='height: 100%; width: 100%'>
					</div>
				</div>
				<div style="width:100%; height:20%; background: #44b5df">
					<h1 style="text-align:center; color:white; font-size:2em">Metricas</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane printable" id="I">
		<?php $historia_all = Array(); array_push($historia_all, $historia_principal, $historia_observaciones, $historia_evolucion, $historia_examen); ?>
		<?php $this->load->view("superusuario/historia", $historia_all); ?>
	</div>
	<div class="tab-pane printable" id="J">
		<?php $this->load->view("superusuario/carga_archivos"); ?>
	</div>

	<div class="tab-pane printable" id="K">
		<br>
		<input type="text" id="buscadorReintegro">
		<br>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Archivo</th>               
					<th>Factura</th>               
					<th>Subir Factura</th>               
				</tr>
			</thead>
			<tbody id="bodyReintegro">
				<?php
					$band = FALSE; 
					if(isset($reintegros)){
						foreach ($reintegros as $archivo) 
						{
								
								$band = TRUE;                    
								echo "<tr>";
								echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
								if($archivo->url <> '')
									echo "<td><a target='_blank' href='".base_url()."uploads/reintegro/".$archivo->url."'>Archivo</a></td>";
								else   
									echo "<td></td>";   

								if($archivo->url_factura <> '')
									echo "<td><a target='_blank' href='".base_url()."uploads/reintegro/facturas/".$archivo->url_factura."'>".$archivo->original_name_factura."</a></td>";
								else   
									echo "<td></td>";   
								echo "<td><a class='agregarFacturaIco' data-id='".$archivo->nro."'> <i class='icon-cloud-upload'></i> </a></td>";   
								echo "</tr>";  
						  
						}
					}
					if($band == FALSE)
					{
						echo "<tr><td></td><td></td><td></td><td></td></tr>";
						echo "<tr><td></td><td></td><td></td><td></td></tr>";
					}
				?>    
			</tbody>
		</table>
	</div>
</div>
			</div>
		</div>
	</div>
</body>


																																
																																
<form action="amaaa.php" method="POST"></form>
<form action="<?= base_url() ?>index.php/principalSuperAdmin/editarPacienteInfo/<?= $idPaciente ?>" method="POST">
	<div id="editarPacienteInfo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			 <h3 id="myModalLabel">Editar Paciente</h3>
		</div>
		  <div class="modal-body">
			<div class="row-fluid">
					 <div class="span5">
						 <h5>Nombre</h5>
						 <input name="nombre" class="" value="<?=$info->nombre ?>"/>
					 </div>
					 <div class="span5">
						 <h5>Apellido</h5>
						 <input class="" name="apellido" value="<?=$info->apellido ?>"/>
					 </div>
			</div>
			<div class="page-header" ></div>
			<div class="row-fluid">
					 <div class="span5">
						 <h5>Telefono Personal</h5>
						 <input name="telefono_personal" class="" value="<?=$info->telefono_personal ?>"/>
					 </div>
					 <div class="span5">
						 <h5>Telefono Casa</h5>
						 <input name="telefono_casa" class="" value="<?=$info->telefono_casa ?>"/>
					 </div>
			</div>
			<div class="row-fluid">
				<div class="span5">
						<h5>Telefono Oficina</h5>
					<input name="telefono_oficina" class="" value="<?=$info->telefono_oficina ?>"/>
					 </div>
			</div>
			<div class="page-header"></div>
				<div class="row-fluid">
					<div class="span5">
							<h5>Lugar de Nacimiento</h5>
								<input name="lugar_nacimiento" class="" value="<?=$info->lugar_nacimiento ?>"/>
						</div>
						  <div class="span5">
								<h5>Fecha de Nacimiento</h5>
								<input class="" type="text" name="fecha_nacimiento" value="<?=$info->fecha_nacimiento ?>"/>
						  </div>
					</div>
					<div class="row-fluid">
						  <div class="span5">
							<h5>Genero</h5>
								<input name="genero" class="" value="<?=$info->genero ?>"/>
						  </div>
					</div>
					<div class="row-fluid">
						  <div class="span5">
								<h5>Titulo</h5>
								<input name="titulo" class="" value="<?=$info->titulo ?>"/>
						  </div>
						  <div class="span5">
								<h5>Codigo Postal</h5>
								<input class="" name="codigo_postal" value="<?=$info->codigo_postal ?>"/>
						  </div>
					</div>
					<div class="row-fluid">
						  <div class="span5">
								<h5>Direccion</h5>
								<input name="direccion" class="" value="<?=$info->direccion ?>"/>
						  </div>
						  <div class="span5">
								<h5>Ciudad</h5>
								<input name="ciudad" class="" value="<?=$info->ciudad ?>"/>
						  </div>
					</div>
					<div class="row-fluid">
						  <div class="span5">
								<h5>Pais</h5>
								<input name="pais" class="" value="<?=$info->estado ?>"/>
						  </div>
					</div>
					<div class="page-header"></div>
					<div class="row-fluid">
						<div class="span5">
							<h5>Nro Seguridad Social</h5>
							<input name="nro_seguridad_social" class="" value="<?=$info->nro_seguridad_social ?>"/>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span5">
							<h5>Correo Electronico</h5>
							<input name="correo_electronico" class="" value="<?=$info->correo_electronico ?>"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
					<button class="btn btn-success">Editar</button>
				</div>
			</div>
		</form>


<?php $this->load->view("superusuario/historia_modales"); ?>


<form action="http://e-siat.net/siat/index.php/principalSuperAdmin/nuevaReceta/<?=$tratamiento['idTratamiento']?>" method="POST">
	 <div style="top:1%; height: 100%; overflow:auto" id="nuevaReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Nueva Receta</h3>
		  </div>
		  <div style="max-height:none" class="modal-body">
				<div class="row-fluid">
					 <div class="span6">
						  <label>
								<input value="p" checked="" class="tipo_tratamiento" id="profilaxis" name="tipo_tratamiento" type="radio">
								Profilaxis
						  </label>
					 </div>
					 <div class="span6">
						  <label>
								<input value="d" class="tipo_tratamiento" id="demanda" name="tipo_tratamiento" type="radio">
								Demanda
						  </label>
					 </div>
				</div>
				<div class="page-header"></div>
				<div class="row-fluid profilaxis esconder">
					 <div class="span6">
						  <label>
								<input value="horas" checked="" class="tipo_intervalo" id="horas" name="form-field-radio" type="radio">
								Intervalo de horas
						  </label>
					 </div>
					 <div class="span6">
						  <label>
								<input value="dias" class="tipo_intervalo" id="dias" name="form-field-radio" type="radio">
								Dias
						  </label>
					 </div>
				</div>
				<div class="row-fluid  profilaxis esconder">
					 <div class="span12 row-fluid containerr" style="background:#e4e4e4; padding: 10px" id="horas_container">
						  <div class="span12">
								<input placeholder="Intervalo en horas Ej: 16" type="input" name="horas">
						  </div>
					 </div>
				</div>
				<div class="row-fluid  profilaxis esconder">
					 <div class="span12 containerr" style="background:#e4e4e4; padding: 10px; display:none" id="dias_container">
						  <div class="row-fluid">
								<div class="span4" id="horas_containter">
									 <div>
										  <input checked="" type="checkbox" name="lunes">
										  Lunes
									 </div>
								</div>
								<div class="span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="martes">
										  Martes
									 </div>
								</div>
								<div class="row-fluid span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="miercoles">
										  Miercoles
									 </div>
								</div>
						  </div>
						  <div class="row-fluid">
								<div class="row-fluid span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="jueves">
										  Jueves
									 </div>
								</div>
								<div class="row-fluid span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="viernes">
										  Viernes
									 </div>
								</div>
								<div class="row-fluid span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="sabado">
										  Sabado
									 </div>
								</div>
						  </div>
						  <div class="row-fluid">
								<div class="row-fluid span4" id="horas_containter">
									 <div>
										  <input type="checkbox" name="domingo">
										  Domingo
									 </div>
								</div>
						  </div>
					 </div>
				</div>
				<div class="row-fluid profilaxis esconder" style="margin-top:10px">
										  <input style="width:50%; height:25px" type="date" name="fecha" value="2014-10-10">
					 <input style="width:49%; height:25px" type="time" name="hora" value="15:25">
				</div>
				<div class="row-fluid esconder">
					 <input class="input-xxlarge" type="text" style="height:25px" name="cantidadUI" placeholder="Cantidad UI Ej: 25000"> 
				</div>           
				<div class="row-fluid esconder">
					 <textarea style="height: 200px; resize: none" class="input-xxlarge" name="descripcion" placeholder="Descripcion"></textarea> 
				</div>
				<div class="">
					 <div class="row-fluid"> 
						<div class="span12">
							 <div style="display:none">
								<input type="text" value="ADVATE L BAXJ II 250 UI GTIN 05413760468211" id="select-drogas">
								<input type="text" value="ADVATE  250" id="select-comercial">
								<input type="text" value="BAXTER ARGENTINA S.A." id="select-proveedor">
							 </div>
							 <div class="">
								  <div class="span12 esconder">
									 <select id="drogas_info" class="span12">
										  
									 </select>
								</div>
						  </div>
						  <div class="row-fluid">
								<div class="span12">
									 <input value="" placeholder="Cantidad de UI. EJ: 2000" class="span12" style="height:30px" id="droga_cantidad_ui">
								</div>
						  </div>
<!--Entregar el dia -->
<br><label>Fecha Entrega</label>
	 
				<div class="row-fluid profilaxis esconder" style="margin-top:10px">
								 <input style="width:50%; height:25px" type="date" name="fecha_entregar" value="2014-10-10">
					 <input style="width:49%; height:25px" type="time" name="hora_entregar" value="15:25">
				</div>

<!-- Fin entregar -->





						  <div class="row-fluid" style="margin-top:10px">
								<div class="span12">
									 <button class="span4 input btn btn-small pull-right" id="boton_agregar_droga">Agregar</button>
								</div>
						  </div>
						  <div class="page-header"></div>
						<div class="row-fluid" id="drogas-container">
						</div>  
						<div class="page-header"></div>
					 </div>      
				</div>
		  </div>
	 </div>
		  <div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
				<button class="btn btn-success">Crear</button>
		  </div>
	 </div>
</form>

<form id='recibida' action="<?= base_url() ?>index.php/principalSuperAdmin/cambiarImagenPerfil/<?= $idPaciente; ?>" method="POST" enctype="multipart/form-data" >
		  <div id="cambiarImagen" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					 <h3 id="myModalLabel">Cambiar Imagen de Perfil</h3>
				</div>
				<div class="modal-body">
					 <input name="userfile" type="file" id="id-input-file-1" />
				</div>
				<div class="modal-footer">
					 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
					 <button class="btn btn-success">Confirmar</button>
				</div>
		  </div>
	 </form>




	<form action="<?= base_url() ?>index.php/pacientes/eliminar" id="borrar" method="POST">
		<div id="borrado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Borrar archivo de Historial</h3>
			</div>
			<div class="modal-body">
				<div>
               <h5>¿Esta segudo desea borrar el archivo? Se perderan sus datos para siempre.</h5>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
				<button class="btn btn-success">Si</button>
			</div>
		</div>
	</form>
<!-- FIX: Necesitamos que el campo de "articulación" en la aplicación a demanda sea una lista desplegable. -->
	      <form action="<?= base_url() ?>index.php/principalSuperAdmin/abmdosis_demanda/<?= $idPaciente ?>" method="POST">
				<div style="top:4%; height:auto" id="nuevaDemanda" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Dosis a demanda</h3>
					</div>
					<div class="modal-body" style="max-height:none">
						<div class="">
                     <div class="row-fluid" style="margin-bottom:20px">
                     	<?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
                     	<input class="span6" type="date" name="startingDay"  value="<?= date('Y-m-d') ?>" />
                     	<input class="span6" type="time" name="startingHour" value="<?= date('H:i') ?>"/>
                     </div>
                     <div class="row-fluid" style="margin-bottom:20px">
	                    <input type="number" class="span6" name="cantidad" placeholder="Cantidad">
	                    <!-- <input type="text" class="span6" name="articulacion" placeholder="Articulación"> -->
                       <select class="span6" name="articulacion" id="hall" value="3" style="color: #aaa;">
                           <option>Rodilla derecha</option>
								   <option>Rodilla derecha</option>
								   <option>Rodilla izquierda</option>
								   <option>Codo derecho</option>
								   <option>Codo izquierdo</option>
								   <option>Tobillo derecho</option>
								   <option>Tobillo izquierdo</option>
								   <option>Muñeca derecha</option>
								   <option>Muñeca izquierda</option>
								   <option>Hombro derecho</option>
								   <option>Hombro izquierdo</option>
								   <option>Intervención odontología</option>
								   <option>Prueba de coagulación</option>
								   <option>Cadera</option>
								</select>
                     </div>
						</div>
					</div>
					<div class="modal-footer" style="bottom:0">
					    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
					    <input type="submit" class="btn btn-success" value="aceptar">
					</div>
				</div>
			</form>
<!-- ****************************************************************************************************************************** -->

<!-- FIX: al reformular el tratamiento de un paciente. Cuando le pongo intervalo de dias y selecciono el domingo no me lo toma despues al cambio. -->
			<form action="<?= base_url() ?>index.php/pacientes/reformularTratamiento/<?= $tratamiento['idTratamiento'] ?>/<?= $idPaciente ?>" id="reformular" method="POST">
				<div style="top:4%; height:auto" id="reformulado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Reformulado de Tratamiento</h3>
					</div>
					<div class="modal-body" style="max-height:none">
						<div class="row-fluid" >
                     <div class="span6">
                     	<label>
                     		<input value="horas" checked class="tipo_intervalo" id="horas2" name="form-field-radio" type="radio">
                     		Intervalo de horas
                     	</label>
                     </div>
                     <div class="span6">
                     	<label>
                     		<input value="dias" class="tipo_intervalo" id="dias2" name="form-field-radio" type="radio">
                     		Dias
                     	</label>
                     </div>
						</div>
					   <div class="row-fluid">
                     <div class="span12 row-fluid containerr" style="background:#e4e4e4; padding: 10px" id="horas_container2">
                     	<div class="span12">
                     		<input placeholder="Intervalo en horas Ej: 16" type="input" name="horas" />
                     	</div>
                     </div>
						</div>
					   <div class="row-fluid">
                     <div class="span12 containerr" style="background:#e4e4e4; padding: 10px; display:none" id="dias_container2" >
                     	<div class="row-fluid">
                     		<div class="span4" id="horas_containter">
                     			<div>
                     				<input checked type="checkbox" name="lunes" />
                     				Lunes
                     			</div>
                     		</div>
                     		<div class="span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="martes" />
                     				Martes
                     			</div>
                     		</div>
                     		<div class="row-fluid span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="miercoles" />
                     				Miercoles
                     			</div>
                     		</div>
                     	</div>
                     	<div class="row-fluid">
                     		<div class="row-fluid span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="jueves" />
                     				Jueves
                     			</div>
                     		</div>
                     		<div class="row-fluid span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="viernes" />
                     				Viernes
                     			</div>
                     		</div>
                     		<div class="row-fluid span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="sabado" />
                     				Sabado
                     			</div>
                     		</div>
                     	</div>
                     	<div class="row-fluid" >
                     		<div class="row-fluid span4" id="horas_containter">
                     			<div >
                     				<input type="checkbox" name="domingo" />
                     				Domingo
                     			</div>
                     		</div>
                     	</div>
                     </div>
						</div>
						<div class="page-header"></div>
						<div class="">
                  <div class="row-fluid">
                  	<div class="span12" >
                  		<div style="display:none">
                  			<input type="text" value="ADVATE L BAXJ II 250 UI GTIN 05413760468211" id="select-drogas" />
                  			<input type="text" value="ADVATE  250" id="select-comercial" />
                  			<input type="text" value="BAXTER ARGENTINA S.A." id="select-proveedor" />
                  		</div>
                  		<div class="">
                  			<div class="span12">
                  				<select id="drogas_info2" class="span12" >

                  				</select>
                  			</div>
                  		</div>
                  		<div class="row-fluid">
                  			<div class="span12">
                  				<input value="<?=$last_month ? $last_month->dosis : "" ?>" placeholder="Cantidad de UI. EJ: 2000"  class="span12" style="height:30px" id="droga_cantidad_ui" />
                  			</div>
                  		</div>
                  		<div class="row-fluid" style="margin-top:10px">
                  			<div class="span12">
                  				<button class="span4 input btn btn-small pull-right" id="boton_agregar_droga">Agregar</button>
                  			</div>
                  		</div>
                  		<div class="page-header"></div>
                  		<div class="row-fluid" id="drogas-container">
                  		</div>
                  		<div class="page-header"></div>
                  	</div>
                  </div>
                  <div class="row-fluid" style="margin-bottom:20px">
                  	<?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
                  	<input class="span6" type="date" name="startingDay"  value="<?= date('Y-m-d') ?>" />
                  	<input class="span6" type="time" name="startingHour" value="<?= date('H:i') ?>"/>
                  </div>
						</div>
					</div>
					<div class="modal-footer" style="bottom:0">
						<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
						<input type="submit" class="btn btn-success" value="aceptar">
					</div>
				</div>
			</form>
<!-- ****************************************************************************************************************************** -->


	<?php foreach ($scripts as $script) { ?>
	  <script src="<?= $script ?>"></script>
	<?php }?>

   <script type="text/template" id="cardTemplate">
      <div id="{1}_close" class="span12" style=' background:#f2f2f2; margin-bottom:1px;'>
         <div class="span11" style="height:10px">
            <p style="margin:5px">{0} &nbsp; ({2}UI)</p>
            <input type="text" name="{1}_droga" id="{1}_droga" style="display:none" value="{0}" />
            <input type="text" name="{1}_cantidad" id="{1}_cantidad" style="display:none" value="{2}" />
            <input type="text" name="{1}_comercial" id="{1}_comercial" style="display:none" value="{3}" />
            <input type="text" name="{1}_proveedor" id="{1}_proveedor" style="display:none" value="{4}" />
         </div>
         <div class="span1" style="height:10px; ">
            <i data-id="#{1}_close" style="margin:5px; cursor:pointer; color:red" class="pull-right close icon-remove-sign" ></i>
         </div>
      </div>
   </script>

<script type="text/template" id="foja_item_template" >
<tr>
<td>
<%= fechaHoraReal %>
</td>
<td>
<%= dosis %> UI
</td>
<td>
<%= comercial %>
</td>
<td>
<%= lote %>
</td>
<td>
<%= tipo %>
</td>
<td>

</td>
</tr>
</script>

<script>
/*$("#promedio").text("<?php echo 'Puntuacion Promedio: ' . (($row[1] + $row[2] + $row[3] + $row[4] +$row[5] +$row[0]) / 6) ?>");*/
</script>

<script>

var CLEAR_HTML = "";
var PROFILAXIS = "profilaxis";
var DEMANDA = "demanda";
var FOJA_TABLE_BODY = "#foja_table_body";
var FOJA_SELECT_MONTH = "#foja_select_month";
var FOJA_SELECT_YEAR = "#foja_select_year";

var dosisFojaJson = <?=$tratamiento['dosisJson']?>;
var foja_item_template = _.template($("#foja_item_template").html());

function update_form_fields(m, y){
	$("#month_form_field").val(m);
	$("#year_form_field").val(y);
}

$(document).ready(function(){

	$(FOJA_TABLE_BODY).html(CLEAR_HTML);

	var today = new Date();
	var mm = today.getMonth() + 1;
	var yyyy = today.getFullYear();

	if(mm < 10) {
		mm = '0' + mm;
	}

	$(FOJA_SELECT_MONTH).val(mm);
	$(FOJA_SELECT_YEAR).val(yyyy);

	update_form_fields(mm, yyyy);

	$.each(dosisFojaJson, function(k, v){
	 if(mm == v.month && yyyy == v.year){
		 $(FOJA_TABLE_BODY).append(
			foja_item_template({
			 fechaHoraReal : v.fechaHoraReal,
			 dosis : v.dosis,
			 comercial : v.comercial + " " + v.proveedor,
			 lote : v.lote,
			 tipo : v.tipo == 1 ? PROFILAXIS : DEMANDA
		 })
);
}
});

$(FOJA_SELECT_MONTH).change(function(){

  update_form_fields($(FOJA_SELECT_MONTH).val(), $(FOJA_SELECT_YEAR).val());

  $(FOJA_TABLE_BODY).html(CLEAR_HTML);
  $.each(dosisFojaJson, function(k, v){
	 if(v.month == $(FOJA_SELECT_MONTH).val() && v.year == $(FOJA_SELECT_YEAR).val()){
		 console.log("TRUE");
		 $(FOJA_TABLE_BODY).append(
		  foja_item_template({
			 fechaHoraReal : v.fechaHoraReal,
			 dosis : v.dosis,
			 comercial : v.comercial + " " + v.proveedor,
			 lote : v.lote,
			 tipo : v.tipo == 1 ? PROFILAXIS : DEMANDA
		 })
		  );
	 }
 });
});

$(FOJA_SELECT_YEAR).change(function(){

	update_form_fields($(FOJA_SELECT_MONTH).val(), $(FOJA_SELECT_YEAR).val());

	$(FOJA_TABLE_BODY).html(CLEAR_HTML);
	$.each(dosisFojaJson, function(k, v){
	  if(v.month == $(FOJA_SELECT_MONTH).val() && v.year == $(FOJA_SELECT_YEAR).val()){
		  $(FOJA_TABLE_BODY).append(
			foja_item_template({
			  fechaHoraReal : v.fechaHoraReal,
			  dosis : v.dosis,
			  comercial : v.comercial + " " + v.proveedor,
			  lote : v.lote,
			  tipo : v.tipo == 1 ? PROFILAXIS : DEMANDA
		  })
			);
		  console.log(v);
	  }
  });
});
});

$(document).ready(function(){




	var listado_drogas = <?=$drogas?>;

	$.each(listado_drogas, function(k, v){
	  $("#drogas_info").append("<option value='" + v.id + "' >" + v.nombre_comercial + "</option>");
	  $("#drogas_info2").append("<option value='" + v.id + "' >" + v.nombre_comercial + "</option>");
  });

	$("#drogas_info option").each(function(k,v){
		/*if($(v).text() == "<?=$last_month->comercial?>") {
			$("#drogas_info").val($(v).val());
			console.log($(v).text() + " <?=$last_month->comercial?>");
			return true;
		} */ return true;
	});

	$("#drogas_info").change(function(){
	  console.log("asd");
	  $.each(listado_drogas, function(k, v){
		 console.log(v);
		 if(v.id == $("#drogas_info").val()){
			 $("#select-drogas").val(v.descripcion);
			 $("#select-comercial").val(v.nombre_comercial);
			 $("#select-proveedor").val(v.proveedor);
			 return true;
		 }
	 });
  });

	$("#cancelar_droga").click(function(){
		$(this).val("Seleccionar");
	});

	$("body").on("click", ".close", function(){
	  $($(this).data("id")).remove();
	  cont--;
  });

	var cont = 0;

	String.prototype.format = function() {
		var args = arguments;
		return this.replace(/{(\d+)}/g, function(match, number) {
		 return typeof args[number] != 'undefined'
		 ? args[number]
		 : match
		 ;
	 });
	};

	$("#boton_agregar_droga").click(function(){
	 var cardTemplate = $("#cardTemplate").html();
	 var template = cardTemplate.format(
	  $("#select-drogas").val(),
	  cont++,
	  parseInt($("#droga_cantidad_ui").val()),
	  $("#select-comercial").val(),
	  $("#select-proveedor").val()
	  );
	 $("#droga_cantidad_ui").val("");
	 $("#drogas-container").append(template);
	 $(this).val("Seleccionar");
	 return false;
 });

});

</script>

<script>
   $(document).ready(function() {

      $("#demanda").click(function(){
   	  $(".esconder").hide();         
      });

      $("#profilaxis").click(function(){
   	  $(".esconder").show();     
      });


   	$("#reset").click(function(){
   		$(".checkNE").prop("checked", false);
   		$(".selectNE").val(0).prop("disabled", false);
   		$(".total").text("0");
   		return false;
   	});

   	$(".borrar_button").click(function() {
   	 $("#borrar").attr("action", "<?= base_url() ?>index.php/pacientes/borrarArchivoSuper/<?= $idPaciente ?>/" + $(this).data("id"));
      });

   	$('#menu-toggler').on('click', function(e) {
   	  e.preventDefault();
   	  if (!$(this).hasClass("active")) {
   		  console.log("click");
   		  $("#sidebar").animate({"left": "0px"});
   		  $(this).addClass("active");
   	  } else {
   		  $("#sidebar").animate({"left": "-200px"});
   		  $(this).removeClass("active");
   	  }
      });

   	$("#table_dosis").dataTable({
   	});

   	$("#print").click(function() {
   		$(this).css("display", "none");
   		$(".search_filter_foja").css("display", "none");
   		$("#tratamiento_month_specs").html("Mes de tratamiento: " + $(FOJA_SELECT_MONTH).val() + "." + $(FOJA_SELECT_YEAR).val());
   		var mywindow = window.open('', 'my div', 'height=500,width=1000');
   		mywindow.document.write('<html><head><title>my div</title>');
   		mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css" />');
   		mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace.min.css" type="text/css" />');
   		mywindow.document.write('</head><body>');
   		mywindow.document.write("<div style='width:80%; margin:2% auto'>" + $(".printable").html() + "</div>");
   		mywindow.document.write('</body></html>');
   		$(".search_filter_foja").css("display", "block");
   		$(this).css("display", "block");
   		mywindow.print();
   		//mywindow.close();
   	});

      $("#printButton").click(function() {
      	$(this).css("display", "none");
      	console.log("TRUE");
      	var mywindow = window.open('', 'my div', 'height=500,width=1000');
      	mywindow.document.write('<html><head><title>my div</title>');
      	mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css" />');
      	mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace.min.css" type="text/css" />');
      	mywindow.document.write('</head><body>');
      	mywindow.document.write("<div style='width:80%; margin:2% auto'>" + $("#dashboard").html() + "</div>");
      	mywindow.document.write('</body></html>');
      	$(this).css("display", "block");
      	mywindow.print();
   			//mywindow.close();
   		});

   });

   window.onload = function() {

   	$('#id-input-file-3').ace_file_input({
   	   style: 'well',
   	   btn_choose: 'click to choose',
   	   btn_change: null,
   	   no_icon: 'icon-cloud-upload',
   	   droppable: true,
   	   thumbnail: 'small',
   	   before_change: function(files, dropped) {
   		 /**
   		  if(files instanceof Array || (!!window.FileList && files instanceof FileList)) {
   		  //check each file and see if it is valid, if not return false or make a new array, add the valid files to it and return the array
   		  //note: if files have not been dropped, this does not change the internal value of the file input element, as it is set by the browser, and further file uploading and handling should be done via ajax, etc, otherwise all selected files will be sent to server
   		  //example:
   		  var result = []
   		  for(var i = 0; i < files.length; i++) {
   		  var file = files[i];
   		  if((/^image\//i).test(file.type) && file.size < 102400)
   		  result.push(file);
   		  }
   		  return result;
   		  }
   		  */
   		  return true;
   	   },before_remove: function() {
   		  return true;
   	   }

      }).on('change', function() {
   		 //console.log($(this).data('ace_input_files'));
   		 //console.log($(this).data('ace_input_method'));
   	});
   }
</script>

<script type="text/javascript">
   
   $(function() {

	   /* initialize the external events**
		-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
      		title: $.trim($(this).text()) // use the element's text as the event title
      	};
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true, // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

      });

	   /* initialize the calendar
	   -----------------------------------------------------------------*/
	  
	   var date = new Date();
	   var d = date.getDate();
	   var m = date.getMonth();
	   var y = date.getFullYear();
	  
	  
	   var calendar = $('#calendar').fullCalendar({
   		buttonText: {
   			prev: '<',
   			next: '>'
   		},
   		header: {
   			left: 'prev',
   			center: 'title',
   			right: 'next'
   		},
   		events: [],
   		editable: false,
   		droppable: false, // this allows things to be dropped onto the calendar !!!
   		drop: function(date, allDay) { // this function is called when something is dropped
   		/*
   		 // retrieve the dropped element's stored Event Object
   		 var originalEventObject = $(this).data('eventObject');
   		 var $extraEventClass = $(this).attr('data-class');
   		 
   		 
   		 // we need to copy it, so that multiple events don't have a reference to the same object
   		 var copiedEventObject = $.extend({}, originalEventObject);
   		 
   		 // assign it the date that was reported
   		 copiedEventObject.start = date;
   		 copiedEventObject.allDay = allDay;
   		 if ($extraEventClass)
   		 copiedEventObject['className'] = [$extraEventClass];
   		 
   		 // render the event on the calendar
   		 // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
   		 $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
   		 
   		 // is the "remove after drop" checkbox checked?
   		 if ($('#drop-remove').is(':checked')) {
   		 // if so, remove the element from the "Draggable Events" list
   		 $(this).remove();
   		 }
   		 */
	      },
	      selectable: false,
	      selectHelper: true,
	      select: function(start, end, allDay) {
            calendar.fullCalendar('unselect');
		
	      },
	      eventClick: function(calEvent, jsEvent, view) {
         // ***************************Se agrega este codigo en js para filtrar la view sin el boton de No Aplica********************************** 
            if (calEvent.color === "rgb(106, 213, 227)") {
               var template = _.template($("#dosis_info_sheet_NoAplica").html());
            }
         // ***************************Se agrega este codigo en js para filtrar la view sin el boton de A tiempo***********************************
            if (calEvent.color === "rgb(106, 196, 96)"){
               var template = _.template($("#dosis_info_sheet_Atiempo").html());
            }
         // ***************************Se agrega este codigo en js para filtrar la view sin el boton de Omitir*************************************
            if (calEvent.color === "#EA899A"){
               var template = _.template($("#dosis_info_sheet_Omitir").html());
            }
 
   		   bootbox.dialog({
      			message: template({
      				estado : calEvent.titulo,
      				prevista : calEvent.fechaPrevista,
      				real : calEvent.fechaReal,
      				id_dosis : calEvent.id_dosis,
      				fechaM : calEvent.fechaM
      			}),
               title: "Información",
               buttons: {
               	success: {
               		label: "Cerrar",
               		className: "btn-success",
               		callback: function() {

               		}
               	}
               }
            });
         }
      });

      var turnos = <?= $dosisJson ?>;
      var color = new Array('#E43D3D', '#625EBA', '#A4A3B0', '#6AC460', '#507C4C', '#6AD5E3', '#E3E36A');

      $.each(turnos, function(key, value) {
      	calendar.fullCalendar('renderEvent',
         	{
         	  title: value.title + " " + value.formatedDate,
         	  start: value.start,
         	  color: value.tipo == 1 ?
         	  (
         		 value.aplicada == 0 ?
         		 value.inTime == 1 ?
         		 "rgb(106, 213, 227)" :
         		 "#FFFF88" :
         		 (
         			value.aplicada == 2 ?
         			"#EA899A" :
         			(
         			  value.inTime == 1 ?
         			  "rgb(106, 196, 96)" :
         			  "#FFA420"
         			  )
         			)
         		 )
         	  : "red",
         	  titulo: value.titulo,
         	  fechaPrevista: value.fechaEstimada,
         	  fechaReal : value.fechaReal,
         	  id_dosis : value.id_dosis,
         	  fechaM : value.fechaM
           },
         true
        );
      });

      grisDesplazamiento();

      $(".fc-button").click(function(){
         grisDesplazamiento(); 
      });
   })
</script>

<script>
function grisDesplazamiento(){
	//cantidad de dias del mes anterior
	var desplazamiento = $(".fc-first > .fc-other-month").length;
	var ancho = ($(".fc-week").width()/7)-1;
	$(".fc-event").each(function(){
		if($(this).css('top')=='45px')
		{
			if(((($(this).position().left)-3)/ancho)<desplazamiento)
			{
				$(this).css("background-color","#8C8C8C");
				$(this).css("border-color","#8C8C8C");
			}
		}   
	});

	//ultima semana
	desplazamiento = $(".fc-last > .fc-other-month").length;
	var alto = ($("table.fc-border-separate>tbody").height());
	alto = (alto/6*5)+5;
	$(".fc-event").each(function(){
		if($(this).position().top>alto)
		{
			if((7-((($(this).position().left)-3)/ancho))<desplazamiento)
			{
				$(this).css("background-color","#8C8C8C");
				$(this).css("border-color","#8C8C8C");
			}
		}   
	});

	//pen ultima semana
	desplazamiento = $(".fc-week:eq(4) > .fc-other-month").length;
	var alto = ($("table.fc-border-separate>tbody").height());
	alto = (alto/6*4)+5;
	$(".fc-event").each(function(){
		if($(this).position().top>alto)
		{
			if(7-((($(this).position().left)-3)/ancho)<desplazamiento)
			{
				$(this).css("background-color","#8C8C8C");
				$(this).css("border-color","#8C8C8C");
			}
		}   
	});


}

$(document).ready(function(){

	CanvasJS.addColorSet("modo",
																		[//colorSet Array
																		
																		"red",
																		"green"
																		]);

$("input[type=checkbox]").on("change", function(){
 if($(this).is(":checked")){
	 $(this).parent().parent().find("div select").append("<option value='NE' checked='checked' >NE</option>");
	 $(this).parent().parent().find("div select").val("NE");
 }else{
	 $(this).parent().parent().find("div select option[value='NE']").remove();
 }
 $(this).parent().parent().find("div select").prop("disabled", $(this).is(":checked") ? true : false);
});

$("#test1 tr").each(function(key, value){
 var cont = 1;
 $(value).find("td select").each(function(key, value){
  $(value).addClass("row-"+cont++);
});
 cont = 1;
});



$("#test1 select").on("change", function(){
  $("#"+$(this).attr("class")).html(parseInt($("#"+$(this).attr("class")).text()) + 1);
});

$("a[href='#H']").click(function(){



	$("#articulaciones").css("height", $("#dashboard").css("height"));

	$("#loader-screen").css("display", "block");

	setTimeout(function(){


	 function drawTextBox(x, y, ctx, color, cWidth, cHeight, cant){
		 ctx.fillStyle = color;
		 var pH = cHeight / 100 * 0.5;
		 var pW = cWidth / 100 * 0.6;
		 ctx.beginPath();
		 ctx.moveTo(x + 2 * pW, y);
		 ctx.lineTo(x + 12 * pW, y);
		 ctx.arc(x + 12 * pW, y + 5 * pH, 5 * pH, Math.PI * 1.5, Math.PI);
		 ctx.lineTo(x + 12 * pW + 5 * pH, y + 5 * pH);
		 ctx.arc(x + 12 * pW, y + 10 * pH, 5 * pH, 0, Math.PI * 0.5);
		 ctx.lineTo(x + 2 * pW , y + 15 * pH);
		 ctx.arc(x + 2 * pW, y + 10 * pH, 5 * pH, Math.PI * 0.5, Math.PI);
		 ctx.lineTo(x - 10, y + 5 * pH);
		 ctx.arc(x + 2 * pW, y + 5 * pH, 5 * pH, Math.PI, Math.PI * 1.5);
		 ctx.fill();
		 ctx.fillStyle = "white";
		 ctx.font="40px thinfont";
		 ctx.fillText(cant,x ,y + 38);
	 }

	 var c = document.getElementById("canvas-man");
	 var cContext = c.getContext('2d');
	 var source = new Image();
	 source.src = "<?=base_url()?>assets/images/unhombrecito.png";
	 console.log(c.width+" "+c.height);
	 source.onload = function(){
		 console.log(c.width);
		 cContext.drawImage(source, 1, 1, c.width, c.height);
		 drawTextBox(c.width * 15 / 100, c.height * 25 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[2]?>");
		 drawTextBox(c.width * 76 / 100, c.height * 25 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[3]?>");
		 drawTextBox(c.width * 13 / 100, c.height * 40 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[4]?>");
		 drawTextBox(c.width * 78 / 100, c.height * 40 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[5]?>");
		 drawTextBox(c.width * 24 / 100, c.height * 70 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[0]?>");
		 drawTextBox(c.width * 68 / 100, c.height * 70 / 100, cContext, "#e86a52", c.width, c.height, "<?=$diana[1]?>");
	 }

	 $(".square").each(function(){
		 $(this).css("height", $(this).css("width"));
	 });
	 $(".rectangle").each(function(){
		 $(this).css("height", (parseInt($(".model").width())) + "px" );
	 });
	 $(".vertical-rectangle").css({
	  "height" : $("#model-vertical-rectangle").css("height")
  });
	 $("#chartContainerSpline").html("");
	 $("#chartContainerTorta").html("");

	 var chart = new CanvasJS.Chart("chartContainerSpline",
	 {
		title: {
			text: ""
		},
		axisY: {
			title: "Minutos de Retraso",
			includeZero: false
		},
		toolTip: {
			shared: "true"
		},
		data: [
		{
			type : "line",
			lineThickness: 2,
			showInLegend: true,
			markerType: "square",
			name: "Real",
			markerSize: 0,
			dataPoints: datosVisit
		},
		{
			type : "line",
			lineThickness: 2,
			showInLegend: true,
			markerType: "square",
			name: "Previsto",
			color: "red",
			dataPoints: datosVisit2
		}]
	});

	 chart.render();

	 var chart = new CanvasJS.Chart("chartContainerTorta",
	 {
		title: {
			text: ""
		},
		theme: "theme2",
		data: [
		{
			type: "doughnut",
			indexLabelFontFamily: "Garamond",
			indexLabelFontSize: 20,
			startAngle: 0,
			colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
			indexLabelFontColor: "dimgrey",
			indexLabelLineColor: "darkgrey",
			toolTipContent: "{nombre}:&nbsp;{valor}",
			dataPoints: [
			{y: <?= $metricas['atiempo'] > 0 ? ($metricas['atiempo']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : $metricas['atiempo'] ?>, label: "", nombre: "A tiempo", valor: <?= $metricas['atiempo'] ?>},
			{y: <?= $metricas['retrasada'] > 0 ? ($metricas['retrasada']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : "0" ?>, label: "", nombre : "Retrasadas", valor: <?= $metricas['retrasada'] ?>}
			]
		}
		]
	});

	 chart.render();

	 $("#loader-screen").css("display", "none");
 }, 1500);



});

$( window ).resize(function(){


  $("#articulaciones").css("height", $("#dashboard").css("height"));

  $("#chartContainerSpline").html("");
  $("#chartContainerTorta").html("");

  console.log("resize");

  $(".square").each(function(){
	  $(this).css("height", $(this).width());
  });
  $(".rectangle").each(function(){
	  $(this).css("height", (parseInt($(".model").width())) + "px" );
  });

  var chart = new CanvasJS.Chart("chartContainerTorta",
  {
	 title: {
		 text: ""
	 },
	 theme: "theme2",
	 data: [
	 {
		 type: "doughnut",
		 indexLabelFontFamily: "Garamond",
		 indexLabelFontSize: 20,
		 startAngle: 0,
		 colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
		 indexLabelFontColor: "dimgrey",
		 indexLabelLineColor: "darkgrey",
		 toolTipContent: "{y} %",
		 dataPoints: [
		 {y: <?= $metricas['atiempo'] > 0 ? ($metricas['atiempo']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : $metricas['atiempo'] ?>, label: "", nombre: "A tiempo"},
		 {y: <?= $metricas['retrasada'] > 0 ? ($metricas['retrasada']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : "0" ?>, label: "", nombre : "Retrasadas"}
		 ]
	 }
	 ]
 });

  chart.render();

  var chart = new CanvasJS.Chart("chartContainerSpline",
  {
	 title: {
		 text: ""
	 },

	 axisY: {
		 title: "Minutos de Retraso",
		 includeZero: false
	 },
	 toolTip: {
		 shared: "true"
	 },
	 data: [
	 {
		 type: "spline",
		 showInLegend: false,
		 name: "dosis",
		 markerSize: 0,
		 dataPoints: datosVisit
	 }
	 ]
 });

  chart.render();

});

});

</script>
<script>
$(document).ready(function(){
	$(".agregarFacturaIco").click(function(event){
				event.preventDefault();
				var idS = $(this).data("id");

				$('#agregarFactura').on('show.bs.modal', function(e) {
					 $(this).find('#id_fac').attr('value', idS);
				});
				$('#agregarFactura').modal();            
		  });

	$("#dias").click(function(){
	 $("#dias_container").css("display", "block");
	 $("#horas_container").css("display", "none");



 });
	$("#horas").click(function(){
		$("#dias_container").css("display", "none");
		$("#horas_container").css("display", "block");
	});

	$("#dias2").click(function(){
	 $("#dias_container2").css("display", "block");
	 $("#horas_container2").css("display", "none");



 });
	$("#horas2").click(function(){
		$("#dias_container2").css("display", "none");
		$("#horas_container2").css("display", "block");
	});

  /*setTimeout(function(){ 
		$("img").each(function(){
			//("width", "75%"); 
			alert($(this).attr("src")); 
		}); 
	
	},1500);*/


	$("#buscadorReintegro").keyup(function(){
		if( $(this).val() != '')
		{
			var textFiltro = $(this).val();
			$("#bodyReintegro > tr").each(function(){
				var textFecha = $(this).children("td:nth-child(1)").html();
				var textFactura = $(this).children("td:nth-child(3)").children("a").html();
				if(textFactura == undefined) textFactura = '';
				if(textFecha.indexOf(textFiltro) >= 0 || textFactura.indexOf(textFiltro) >= 0)
					$(this).show();
				else
					$(this).hide();
			});
		}
		else
		{
			$("#bodyReintegro > tr").each(function(){
				$(this).show();
			});
		}
	});
	


});
</script>

<!-- Fix: En el calendario, si la dosis esta como no aplicada (celeste) y se la quiere modificar a "no aplicada" da error, pero no avisa cual es. -->
<!-- ***************************Se agrega este script para generar la view sin el boton de No aplica********************************** -->
<script type="text/plain" id="dosis_info_sheet_NoAplica" >
   <div>
      <div>
         <h4>Estado de dosis : <%= estado %></h4>
      </div>
      <div>
         <h4>Fecha Prevista : <%= prevista %></h4>
      </div>
      <div>
         <h4>Fecha Real : <%= real %></h4>
      </div>
      <div>
         <% 
         	var p = new Date(prevista.substr(14,4), parseInt(prevista.substr(11,2))-1, prevista.substr(8,2), prevista.substr(0,2), prevista.substr(3,2)); 
         	var r = new Date(real.substr(14,4), parseInt(real.substr(11,2))-1, real.substr(8,2), real.substr(0,2), real.substr(3,2)); 
         	var diffMs = (r - p); // milliseconds between now & Christmas
         	var diffDays = Math.round(diffMs / 86400000); // days
         	var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
         	var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
         	var diferencia = "";
         	if (diffDays != 0) diferencia += diffDays + " días, ";
         	diferencia += diffHrs + " horas, " + diffMins + " minutos";
         	if(diffDays < -3000) diferencia = "";
         %>
         <h4>Diferencia: <%= diferencia %></h4>
         <br>
         <?php if($data['tipoUsuario'] == "superadmin"): ?>
            <!-- <%= "<br><a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_noapli/<?=$idPaciente?>/"+id_dosis+"'>No aplicada</a><br>" %> -->
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_atiempo/<?=$idPaciente?>/"+id_dosis+"/"+fechaM+"'>A tiempo</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_omitir/<?=$idPaciente?>/"+id_dosis+"'>Omitir</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_eliminar/<?=$idPaciente?>/"+id_dosis+"'>Eliminar</a><br>" %>
         <?php endif; ?>
      </div>
   </div>
</script>
<!-- ********************************************************************************************************************************* -->
<!-- ***************************Se agrega este script para generar la view sin el boton de A tiempo*********************************** -->
<script type="text/plain" id="dosis_info_sheet_Atiempo" >
   <div>
      <div>
         <h4>Estado de dosis : <%= estado %></h4>
      </div>
      <div>
         <h4>Fecha Prevista : <%= prevista %></h4>
      </div>
      <div>
         <h4>Fecha Real : <%= real %></h4>
      </div>
      <div>
         <% 
            var p = new Date(prevista.substr(14,4), parseInt(prevista.substr(11,2))-1, prevista.substr(8,2), prevista.substr(0,2), prevista.substr(3,2)); 
            var r = new Date(real.substr(14,4), parseInt(real.substr(11,2))-1, real.substr(8,2), real.substr(0,2), real.substr(3,2)); 
            var diffMs = (r - p); // milliseconds between now & Christmas
            var diffDays = Math.round(diffMs / 86400000); // days
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
            var diferencia = "";
            if (diffDays != 0) diferencia += diffDays + " días, ";
            diferencia += diffHrs + " horas, " + diffMins + " minutos";
            if(diffDays < -3000) diferencia = "";
         %>
         <h4>Diferencia: <%= diferencia %></h4>
         <br>
         <?php if($data['tipoUsuario'] == "superadmin"): ?>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_noapli/<?=$idPaciente?>/"+id_dosis+"'>No aplicada</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_omitir/<?=$idPaciente?>/"+id_dosis+"'>Omitir</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_eliminar/<?=$idPaciente?>/"+id_dosis+"'>Eliminar</a><br>" %>
         <?php endif; ?>
      </div>
   </div>
</script>
<!-- ********************************************************************************************************************************* -->
<!-- ***************************Se agrega este script para generar la view sin el boton de Omitir************************************* -->
<script type="text/plain" id="dosis_info_sheet_Omitir" >
   <div>
      <div>
         <h4>Estado de dosis : <%= estado %></h4>
      </div>
      <div>
         <h4>Fecha Prevista : <%= prevista %></h4>
      </div>
      <div>
         <h4>Fecha Real : <%= real %></h4>
      </div>
      <div>
         <% 
            var p = new Date(prevista.substr(14,4), parseInt(prevista.substr(11,2))-1, prevista.substr(8,2), prevista.substr(0,2), prevista.substr(3,2)); 
            var r = new Date(real.substr(14,4), parseInt(real.substr(11,2))-1, real.substr(8,2), real.substr(0,2), real.substr(3,2)); 
            var diffMs = (r - p); // milliseconds between now & Christmas
            var diffDays = Math.round(diffMs / 86400000); // days
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
            var diferencia = "";
            if (diffDays != 0) diferencia += diffDays + " días, ";
            diferencia += diffHrs + " horas, " + diffMins + " minutos";
            if(diffDays < -3000) diferencia = "";
         %>
         <h4>Diferencia: <%= diferencia %></h4>
         <br>
         <?php if($data['tipoUsuario'] == "superadmin"): ?>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_noapli/<?=$idPaciente?>/"+id_dosis+"'>No aplicada</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_atiempo/<?=$idPaciente?>/"+id_dosis+"/"+fechaM+"'>A tiempo</a><br>" %>
            <%= "<a href='<?=base_url()?>index.php/principalSuperAdmin/abmdosis_eliminar/<?=$idPaciente?>/"+id_dosis+"'>Eliminar</a><br>" %>
         <?php endif; ?>
      </div>
   </div>
</script>
<!-- ********************************************************************************************************************************* -->


<style>
th {
	text-align: left; padding:15px
}
</style>
</html>



