<html>
    
    <?php $this->load->view("commons/header"); ?>
    <style>
      h5 {
        -webkit-margin-before: 0px;
        -webkit-margin-after: 0px;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        }
    </style>
    <body>
        <?php $this->load->view("commons/navbar"); ?>
        <div class='container-fluid' style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                        <h1>Crear Nuevo Paciente</h1>
                    </div>
                    <div id="alert" style="display:none" class="alert">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Advertencia!</strong> Asegurese de que todos los campos de borde naranja han sido completados en ambas pestañas.
                    </div>
                    <div id="alert-usuario" style="display:none" class="alert">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Advertencia!</strong> Asegurese de que el nombre de usuario que especifico no existe en el sistema.
                    </div>
                    <div class="page-header"> </div>
                    <div class="tabbable tabs-stacked">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#A" data-toggle="tab">Perfil</a></li>
                          <!--<li class=""><a href="#C" data-toggle="tab">Tratamiento</a></li>-->
                        </ul>
                        <form action="<?=base_url()?>index.php/pacientes/crearPacienteCargar" method="POST" enctype="multipart/form-data" >
                        <div class="tab-content">
                          <div class="tab-pane active" id="A">
                          <h2>Datos Personales</h2>
                        <div class="page-header"></div> 
                            <div class="row-fluid">
                                <div class="span10">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="input- required text input-xlarge" style="height: 30px" type="text" placeholder="Apellido" name="apellido" />
                                        </div>
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" type="text" placeholder="Nombre" name="nombre" />
                                        </div>
                                    </div>
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <h4>Imagen de Perfil</h4>
                                            <input class="input-required input-xlarge" style="height: 30px" type="file" placeholder="Apellido" name="userfile" />
                                        </div>
                                    </div>
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="text input-xlarge" style="height: 30px" type="tel" pattern=".{9,}" title="Minimo 10 caracteres" placeholder="Telefono Oficina" name="tel_oficina" />
                                        </div>
                                        <div class="span6">
                                            <select class="text input-xlarge" name="genero" style="height: 30px">
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" type="date" name="fecha_nac" />
                                        </div>
                                        <div class="span6">
                                            <input required class="text input-xlarge" style="height: 30px" type="text" placeholder="Lugar de Nacimiento" name="lugar_nac" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="required text input-xlarge" pattern=".{7,10}" title="Minimo 7 caracteres" style="height: 30px" type="text" placeholder="DNI" name="dni" />
                                        </div>
                                    </div>  
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <select class="input-xlarge" style="height: 30px" name="obrasocial" >
                                                <?php foreach($obrasocial as $o){ ?>
                                                    <option value="<?=$o->idObraSocial?>"><?=$o->nombre?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="span6">
                                            <input required class="text input-xlarge" style="height: 30px" type="text" pattern=".{6,}" title="Minimo 6 caracteres" placeholder="Nro. Seguridad Social" name="nro_seguridad" />
                                        </div>
                                    </div>  
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" type="text" placeholder="Direccion" name="direccion" />
                                        </div>
                                        <div class="span6">
                                            <select name="provincia" class="required text input-xlarge" style="height: 30px">
                                                <option value="Buenos Aires">Buenos Aires</option>
                                                <option value="Buenos Aires Capital">Buenos Aires Capital</option>
                                                <option value="Catamarca">Catamarca</option>
                                                <option value="Chaco">Chaco</option>
                                                <option value="Chubut">Chubut</option>
                                                <option value="Cordoba">Cordoba</option>
                                                <option value="Corrientes">Corrientes</option>
                                                <option value="Entre Rios">Entre Rios</option>
                                                <option value="Formosa">Formosa</option>
                                                <option value="Jujuy">Jujuy</option>
                                                <option value="La Pampa">La Pampa</option>
                                                <option value="La Rioja">La Rioja</option>
                                                <option value="Mendoza">Mendoza</option>
                                                <option value="Misiones">Misiones</option>
                                                <option value="Neuquen">Neuquen</option>
                                                <option value="Rio Negro">Rio Negro</option>
                                                <option value="Salta">Salta</option>
                                                <option value="San Juan">San Juan</option>
                                                <option value="San Luis">San Luis</option>
                                                <option value="Santa Cruz">Santa Cruz</option>
                                                <option value="Santa Fe">Santa Fe</option>
                                                <option value="Santiago del Estero">Santiago del Estero</option>
                                                <option value="Tierra del Fuego">Tierra del Fuego</option>
                                                <option value="Tucuman">Tucuman</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" value="Argentina" type="text" placeholder="Pais" name="estado" />
                                        </div>
                                        <div class="span6">
                                            <input required class="text input-xlarge" style="height: 30px" type="text" pattern=".{4,}" title="Minimo 4 caracteres" placeholder="Codigo Postal" name="codigo_postal" />
                                        </div>
                                    </div>
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div>
                                                <div id="control-usuario" class="control-group">
                                                    <div class="controls">
                                                        <span class="input-icon input-icon-right">
                                                            <input name="usuario" id="nombreUsuario" class="required text input-xlarge" style="height: 30px;" placeholder="Nombre de Usuario" type="text" />
                                                            <i id="usuarioOk" class="icon-ok-sign hidden" ></i>
                                                            <i id="usuarioError" class="icon-remove-sign hidden"></i>
                                                        </span>
                                                        <i id="check" style=" margin-left: 7px; cursor: pointer; " class="icon-refresh hidden"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<input class="required text input-xlarge" style="height: 30px" type="text" placeholder="Usuario" name="usuario" />-->
                                        </div>
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" pattern=".{7,}" title="Minimo 7 caracteres" type="password" placeholder="Contraseña" name="pass" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input required class="required text input-xlarge" style="height: 30px" type="email" placeholder="Correo Electronico" name="correo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <!--<div class="tab-pane" id="C">
                              <h2>Datos de tratamiento</h2>
                              <div class="page-header"></div>
                              <div class="row-fluid">
                                  <div class="span6">
                                      <input required value="Tratamiento Profilaxis Hemofilia" class="required text input-xlarge" style="height: 30px" type="text" placeholder="Detalle" name="detalle" />
                                  </div>
                                  <div class="span6">
                                      <input required class="required text input-xlarge" style="height: 30px" type="datetime-local" value="<?=date("Y-m-d\TH:i:s",time ())?>" name="fecha_inicio" />
                                  </div>
                              </div>
                              <div class="row-fluid">
                                <div class="page-header" ></div>
                                <div class="span6">
                                        <label>
                                            <input  checked class="tipo_intervalo" id="horas" name="form-field-radio" type="radio">
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
                                <div class="row-fluid containerr" id="horas_container">
                                    <div class="span12">
                                        <input value="48" placeholder="Intervalo en horas Ej: 16" type="input" name="horas" />
                                    </div>
                                </div>
                                <div id="dias_container" class="containerr" style="display:none">
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input checked type="checkbox" name="lunes" />
                                            Lunes
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input type="checkbox" name="martes" />
                                            Martes
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input checked type="checkbox" name="miercoles" />
                                            Miercoles
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input type="checkbox" name="jueves" />
                                            Jueves
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input checked type="checkbox" name="viernes" />
                                            Viernes
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input type="checkbox" name="sabado" />
                                            Sabado
                                        </div>
                                    </div>
                                    <div class="row-fluid" id="horas_containter">
                                        <div >
                                            <input type="checkbox" name="domingo" />
                                            Domingo
                                        </div>
                                    </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="page-header" ></div>
                                  <div class="span6">
                                        <h4>Factor Faltante (Tipo Hemofilia)</h4>   
                                        <div >
                                            <input checked="" type="radio"  name="hemofiliatipo" value="A"> &nbsp; Factor VIII (A)
                                        </div></br>
                                        <div >
                                            <input type="radio" name="hemofiliatipo" value="B"> &nbsp; Factor IX (B)
                                        </div></br>
                                        <div >
                                            <input type="radio" name="hemofiliatipo" value="C"> &nbsp; Factor XI (C)
                                        </div>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="page-header" ></div>
                                  <div class="span5"> 
                                      <h4>Drogas</h4>
                                      <div>
                                        <select id="select-drogas">
											<option>Seleccionar</option>
											<option value="ADVATE L BAXJ II 250 UI GTIN 05413760468211" >ADVATE L BAXJ II 250 UI GTIN 05413760468211</option>
											<option value="ADVATE M BAXJ II 500 UI  GTIN 05413760468228" >ADVATE M BAXJ II 500 UI  GTIN 05413760468228</option>
											<option value="ADVATE M BAXJ II 500 UI  GTIN 05413760468228" >ADVATE M BAXJ II 500 UI  GTIN 05413760468228</option>
											<option value="ADVATE H B II 1000 UI   GTIN 05413760468235" >ADVATE H B II 1000 UI   GTIN 05413760468235</option>
											<option value="ADVATE H B II 1000 UI   GTIN 05413760468235" >ADVATE H B II 1000 UI   GTIN 05413760468235</option>
											<option value="ADVATE S BAXJ II 1500 UI GTIN 5413760468242" >ADVATE S BAXJ II 1500 UI GTIN 5413760468242</option>
											<option value="ADVATE S BAXJ II 1500 UI GTIN 5413760468242" >ADVATE S BAXJ II 1500 UI GTIN 5413760468242</option>
											<option value="FEIBA TIM-4 1.000 UI GTIN 09002864058822" >FEIBA TIM-4 1.000 UI GTIN 09002864058822</option>
											<option value="FACTOR VIII  500 U.I (H) GTIN 07797545000444" >FACTOR VIII  500 U.I (H) GTIN 07797545000444</option>
											<option value="FACTOR VIII 500 UI (HH) GTIN 7797545000444" >FACTOR VIII 500 UI (HH) GTIN 7797545000444</option>
											<option value="FACTOR VIII 1000 U.I. (HH) GTIN 7797545000451" >FACTOR VIII 1000 U.I. (HH) GTIN 7797545000451</option>
											<option value="FACTOR VIII 1000 U.I. (H) GTIN 07797545000451" >FACTOR VIII 1000 U.I. (H) GTIN 07797545000451</option>
											<option value="FACTOR VIII 250 U.I. (I) GTIN 5413760255309" >FACTOR VIII 250 U.I. (I) GTIN 5413760255309</option>
											<option value="FACTOR VIII 500 U.I. (I) GTIN 05413760255316" >FACTOR VIII 500 U.I. (I) GTIN 05413760255316</option>
											<option value="FACTOR VIII 1000 U.I. (I) GTIN 05413760255323" >FACTOR VIII 1000 U.I. (I) GTIN 05413760255323</option>
											<option value="IMMUNINE 600 UI GTIN 05413760196411" >IMMUNINE 600 UI GTIN 05413760196411</option>
											<option value="IMMUNINE 1.200 UI GTIN 05413760196428" >IMMUNINE 1.200 UI GTIN 05413760196428</option>
											<option value="FACTOR VIII 1000 UI (K) GTIN 07793640215653" >FACTOR VIII 1000 UI (K) GTIN 07793640215653</option>
											<option value="FACTOR VIII  500 UI (A) GTIN 07798098720148" >FACTOR VIII  500 UI (A) GTIN 07798098720148</option>
											<option value="FACTOR VIII 1000 UI (A) GTIN 07798098720155" >FACTOR VIII 1000 UI (A) GTIN 07798098720155</option>
											<option value="BERININ P 600 U.I." >BERININ P 600 U.I.</option>
											<option value="BERININ P 1.200 U.I." >BERININ P 1.200 U.I.</option>
											<option value="FACTOR VIII 1000 UI (HAE) GTIN 7798098720353" >FACTOR VIII 1000 UI (HAE) GTIN 7798098720353</option>
											<option value="FACTOR VIII 500 UI ( OP ) GTIN 7798006871412" >FACTOR VIII 500 UI ( OP ) GTIN 7798006871412</option>
											<option value="FACTOR VIII 1000 UI (OP) GTIN 7798006870231" >FACTOR VIII 1000 UI (OP) GTIN 7798006870231</option>
											<option value="FACTOR IX 500 UI GRIFOLS" >FACTOR IX 500 UI GRIFOLS</option>
											<option value="FACT. IX 1000 U.I GRIFOLS GTIN 07798019610473" >FACT. IX 1000 U.I GRIFOLS GTIN 07798019610473</option>
											<option value="FACTOR IX 1500 UI GRIFOLS" >FACTOR IX 1500 UI GRIFOLS</option>
											<option value="FACTOR VIII 500 U.I. (G) GTIN 07798019610220" >FACTOR VIII 500 U.I. (G) GTIN 07798019610220</option>
											<option value="FACTOR VIII 1000 U.I. (G) GTIN 07798019610237" >FACTOR VIII 1000 U.I. (G) GTIN 07798019610237</option>
											<option value="FACTOR VIII 1500 UI (G) GTIN 07798019610497" >FACTOR VIII 1500 UI (G) GTIN 07798019610497</option>
											<option value="FACTOR VIII 500 U.I. (O) GTIN 07798035313655" >FACTOR VIII 500 U.I. (O) GTIN 07798035313655</option>
											<option value="FACTOR VIII 500 U.I. (O) GTIN 07798035313655" >FACTOR VIII 500 U.I. (O) GTIN 07798035313655</option>
											<option value="FACTOR VIII 1000 U.I. (O) GTIN 07798035313662" >FACTOR VIII 1000 U.I. (O) GTIN 07798035313662</option>
											<option value="FACTOR VIII 1000 U.I. (O) GTIN 07798035313662" >FACTOR VIII 1000 U.I. (O) GTIN 07798035313662</option>
											<option value="FACTOR IX 1000 U.I. (V) GTIN 07798035313723" >FACTOR IX 1000 U.I. (V) GTIN 07798035313723</option>
											<option value="FACTOR IX 1000 U.I. (V) GTIN 07798035313723" >FACTOR IX 1000 U.I. (V) GTIN 07798035313723</option>
											<option value="WILATE 900 MG FCO. AMP T GTIN 07798035313846" >WILATE 900 MG FCO. AMP T GTIN 07798035313846</option>
											<option value="NOVOSEVEN RT 1MG - GTIN 7798058931263" >NOVOSEVEN RT 1MG - GTIN 7798058931263</option>
											<option value="NOVOSEVEN RT 5MG - GTIN 7798058931270" >NOVOSEVEN RT 5MG - GTIN 7798058931270</option>
											<option value="BENEFIX 500 U.I. T GTIN 7792499698006" >BENEFIX 500 U.I. T GTIN 7792499698006</option>
											<option value="BENEFIX 500 UI R X 1 VIAL GTIN 7795381000888" >BENEFIX 500 UI R X 1 VIAL GTIN 7795381000888</option>
											<option value="BENEFIX 1000 U.I. GTIN 07792499698501" >BENEFIX 1000 U.I. GTIN 07792499698501</option>
											<option value="BENEFIX R 1000 UI X 1 VIAL GTIN 7795381000895" >BENEFIX R 1000 UI X 1 VIAL GTIN 7795381000895</option>
											<option value="FACTOR VIII 500 UI (XY) GTIN 07792499697009" >FACTOR VIII 500 UI (XY) GTIN 07792499697009</option>
											<option value="FACTOR VIII 500 UI (XY) GTIN 07795381000918" >FACTOR VIII 500 UI (XY) GTIN 07795381000918</option>
											<option value="FACTOR VIII 1000 UI (XY) GTIN 07792499697108" >FACTOR VIII 1000 UI (XY) GTIN 07792499697108</option>
                                        </select>
                                      </div>
                                      <div id="drogas-container">

                                      </div>
                                  </div>
                              </div>
                          </div>-->
                        </div>
                         <div class="page-header"> </div>
                         <div>
                             <input type="submit" class="btn btn-default" value="Crear"/>
                         </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
        <div id="borrado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Cantidad de UI de cada dosis</h3>
            </div>
            <div class="modal-body">
				<div>
					<h4>Nombre Comercial</h4>
					<select id="select-comercial" class="input input-xxl" >
						<option value="ADVATE  250" >ADVATE  250</option>
						<option value="ADVATE 500" >ADVATE 500</option>
						<option value="ADVATE  1000" >ADVATE  1000</option>
						<option value="ADVATE 1500" >ADVATE 1500</option>
						<option value="FEIBA 1000" >FEIBA 1000</option>
						<option value="HEMOFIL 500" >HEMOFIL 500</option>
						<option value="HEMOFIL 1000" >HEMOFIL 1000</option>
						<option value="IMMUNATE 250" >IMMUNATE 250</option>
						<option value="IMMUNATE 500" >IMMUNATE 500</option>
						<option value="IMMUNATE 1000" >IMMUNATE 1000</option>
						<option value="IMMUNINE 600" >IMMUNINE 600</option>
						<option value="IMMUNINE 1200" >IMMUNINE 1200</option>
						<option value="KOGENATE 1000" >KOGENATE 1000</option>
						<option value="BERIATE 500" >BERIATE 500</option>
						<option value="BERIATE 1000" >BERIATE 1000</option>
						<option value="BERININ 600" >BERININ 600</option>
						<option value="BERININ 1200" >BERININ 1200</option>
						<option value="HAEMATE P 1000" >HAEMATE P 1000</option>
						<option value="OPTIVATE 500" >OPTIVATE 500</option>
						<option value="OPTIVATE 1000" >OPTIVATE 1000</option>
						<option value="FACTOR IX GRIFOLS 500" >FACTOR IX GRIFOLS 500</option>
						<option value="FACTOR IX GRIFOLS 1000" >FACTOR IX GRIFOLS 1000</option>
						<option value="FACTOR IX GRIFOLS 1500" >FACTOR IX GRIFOLS 1500</option>
						<option value="FAHNDI 500" >FAHNDI 500</option>
						<option value="FAHNDI 1000">FAHNDI 1000</option>
						<option value="FAHNDI 1500" >FAHNDI 1500</option>
						<option value="OCTANATE 500" >OCTANATE 500</option>
						<option value="OCTANATE  1000" >OCTANATE  1000</option>
						<option value="OCTANINE 1000" >OCTANINE 1000</option>
						<option value="WILATE 900" >WILATE 900</option>
						<option value="NOVOSEVEN 1" >NOVOSEVEN 1</option>
						<option value="NOVOSEVEN 5" >NOVOSEVEN 5</option>
						<option value="BENEFIX 500" >BENEFIX 500</option>
						<option value="BENEFIX 1000" >BENEFIX 1000</option>
						<option value="XYNTHA 500" >XYNTHA 500</option>
						<option value="XYNTHA 1000" >XYNTHA 1000</option>
					</select>
				</div>
				<div>
					<select id="select-proveedor" >
						<option value="BAXTER ARGENTINA S.A." >BAXTER ARGENTINA S.A.</option>
						<option value="BAYER S.A." >BAYER S.A.</option>
						<option value="CSL BEHRING S.A." >CSL BEHRING S.A.</option>
						<option value="GP PHARM S.A." >GP PHARM S.A.</option>
						<option value="GRIFOLS ARGENTINA SA" >GRIFOLS ARGENTINA SA</option>
						<option value="LABORATORIO VARIFARMA S.A." >LABORATORIO VARIFARMA S.A.</option>
						<option value="NOVO NORDISK S.A." >NOVO NORDISK S.A.</option>
						<option value="PFIZER S.R.L." >PFIZER S.R.L.</option>
					</select>
				</div>
                <div>
                  <input value="" placeholder="EJ: 2000" id="droga_cantidad_ui" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dissmis="modal" id="cancelar_droga" id="cerrar_modal" aria-hidden="true">No</button>
                <button data-dismiss="modal" class="btn btn-success" id="agregar_droga" >Si</button>
            </div>
        </div>
    </body>  
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

    <script type="text/template" id="cardTemplate">
      <div id="{1}_close" class="span12" style='row-fluid; background:#f2f2f2; margin-bottom:1px;'>
          <div class="span11" style="height:10px">
            <p style="margin:2px">{0} &nbsp; ({2}UI)</p>
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

    <script>

    $(document).ready(function(){

      $("body").on("click", ".tipo_intervalo", function(){
          $(".containerr").css("display", "none");
          $("#" + $(this).attr("id") + "_container").css("display", "block");
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

      $("#agregar_droga").click(function(){
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
        $("#select-drogas").val("Seleccionar");
      });

      $("#select-drogas").change(function(){
         var a = $("<a href='#borrado' role='button' data-toggle='modal'></a>").appendTo("body").trigger("click").remove();
      });

    });

    </script>

    <script>
        $(document).ready(function(){

            var submit = false;
            var userNameDoesntExist = true;

            $("#nombreUsuario").on("keyup", function(){
               if($(this).val().length > 0){
                    $("#check").css({
                        "-webkit-animation-name" : "rotate"
                    }).removeClass("hidden");
                    $.ajax({
                        url : "<?=base_url()?>index.php/utils/checkUserNameExist",
                        type : "POST",
                        data : {
                             "userName" : $(this).val()
                        },
                        error : function(){
                            console.log("error");
                            userNameDoesntExist = false;
                             $("#control-usuario").removeClass("success");
                             $("#control-usuario").addClass("error");
                             $("#usuarioOk").addClass("hidden");
                             $("#usuarioError").removeClass("hidden");
                             userExist = false;
                        }, 
                        success : function(response){
                            console.log("success");
                             if(response == "0"){
                                 userNameDoesntExist = true;
                                 $("#control-usuario").removeClass("error");
                                 $("#control-usuario").addClass("success");
                                 $("#usuarioOk").removeClass("hidden");
                                 $("#usuarioError").addClass("hidden");
                                 userExist = true;
                             }else{
                                 userNameDoesntExist = false;
                                 userExist = false;
                                 $("#control-usuario").removeClass("success");
                                 $("#control-usuario").addClass("error");
                                 $("#usuarioOk").addClass("hidden");
                                 $("#usuarioError").removeClass("hidden");
                             }
                        }
                    });
                }else{
                    userNameDoesntExist = true;
                    $("#usuarioOk").addClass("hidden");
                    $("#usuarioError").addClass("hidden");
                    $("#control-usuario").removeClass("success");
                    $("#control-usuario").removeClass("error");
                }
            });

            
            $("#table_dosis").dataTable({
                "bPaginate": false
            });
            $("form").on("submit", function(){
                var complete = true;
                submit = true;
                $(".required").each(function(){
                    if($(this).val().length <= 0) complete = false;
                });
                if(!complete){
                    $(".required").each(function(){
                        if($(this).val().length <= 0) $(this).css("border-color", "#c09853");
                    });
                    $("#alert").css("display", "block");
                }else if(!userNameDoesntExist){
                    $("#alert").css("display", "none");
                    $("#alert-usuario").css("display", "block");
                }

                $.ajax({
                        url : "<?=base_url()?>index.php/utils/checkUserNameExist",
                        type : "POST",
                        async: false,
                        data : {
                             "userName" : $("#nombreUsuario").val()
                        },
                        error : function(){
                            userNameDoesntExist = false;
                             $("#control-usuario").removeClass("success");
                             $("#control-usuario").addClass("error");
                             $("#usuarioOk").addClass("hidden");
                             $("#usuarioError").removeClass("hidden");
                             userExist = false;
                        }, 
                        success : function(response){
                            console.log("success");
                             if(response == "0"){
                                 userNameDoesntExist = true;
                                 $("#control-usuario").removeClass("error");
                                 $("#control-usuario").addClass("success");
                                 $("#usuarioOk").removeClass("hidden");
                                 $("#usuarioError").addClass("hidden");
                                 userExist = true;
                             }else{
                                 userNameDoesntExist = false;
                                 userExist = false;
                                 $("#control-usuario").removeClass("success");
                                 $("#control-usuario").addClass("error");
                                 $("#usuarioOk").addClass("hidden");
                                 $("#usuarioError").removeClass("hidden");
                             }
                        }
                    });

                return complete && userNameDoesntExist;

            });
            $(".required").change(function(){
                if (submit){
                    if($(this).val().length > 0) $(this).css("border-color", "#d5d5d5");
                    else $(this).css("border-color", "#c09853");
                }
            });
        });
    </script>
    <style>
        th {
            text-align: left; padding:15px
        }
    </style>
</html>