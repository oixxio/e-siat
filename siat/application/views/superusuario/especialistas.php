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
        tr{
            height: 35px;
            background-color: rgb(238, 238, 238)!important
        }
        thead tr {
            background : #438eb9!important;
            color: white!important;
        }
        th, td {
            text-align: center;
        }
    </style>
    <?php $this->load->view("superusuario/commons/header"); ?>    
    <body>
        <?php $this->load->view("superusuario/commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("superusuario/commons/lateral"); ?>
            <div  id='main-content' class='clearfix '>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                        <h2 class="span12" >Especialistas</h2> 
                    </div>
                    <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                        <div class="page-header" ></div>
    					<div class="row-fluid">
    						<a class="btn btn-success" href="#agregar_especialista" data-toggle="modal" > Agregar Especialista </a>
    					</div>
                    <?php } ?>
                    <div class="row-fluid" style="display:none" >
                        <h2>Filtro de Busqueda</h2>
                        <div class="page-header" ></div>
                        <div class="span11" id="filtros" >
                        </div>
                        <div class="page-header" ></div>
                        <button class="btn btn-success ">Buscar</button>
                        <button class="btn "><a role="button" href="#filterselector" data-toggle="modal" style="color:white; text-decoration:none"> Agregar Filtro </a></button>
                    </div>
                    <div class="page-header" ></div>
                    <div class="row-fluid">
                        <table id="pacientes" class="span12 table-striped">
                            <thead>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Apellido
                                </th>
                                <th>
                                    Usuario
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </thead>
                            <tbody id="tablebody" >
                                <?php foreach ($especialista as $p) { ?>
                                    <tr style="<?=$p->active == 0 ? 'color: #878484' : '' ?>">
                                        <td style="margin-left:20px" >
                                            <?=$p->nombre?>
                                        </td>
                                        <td style="margin-left:20px" >
                                            <?=$p->apellido?>
                                        </td>
										<td>
                                            <?=$p->nombreUsuario?>
                                        </td>
                                        <td>
                                            <?php if($permiso->perm == 4 || $permiso->perm == 3){ ?>
                                                <?php if($p->active == 1){ ?>
                                                    <a style="text-decoration:none; color: #55B235" href="<?=base_url()?>index.php/principalSuperAdmin/desactivarEspecialista/<?=$p->idUsuario?>">
                                                        <i class="icon-user"></i>
                                                    </a>
                                                <?php }else{ ?>
                                                    <a style="text-decoration:none; color: #878484" href="<?=base_url()?>index.php/principalSuperAdmin/activarEspecialista/<?=$p->idUsuario?>">
                                                        <i class="icon-user"></i>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                                               <!-- <a href="#deletemodal" style="text-decoration:none; color: #B64444" class="delete"
													data-toggle="modal"
													data-href="<?=base_url()?>index.php/principalSuperAdmin/eliminarEspecialista/<?=$p->idUsuario?>"
													>
                                                    <i class="icon-trash"></i>
                                                </a>-->
												<a href="#editar_especialista_modal" style="text-decoration:none; color: #B64444" class="editar_especialista_button" id="editar_especialista" class="delete"
													data-toggle="modal"
													data-id="<?=$p->idUsuario?>"
													data-href="<?=base_url()?>index.php/principalSuperAdmin/get_especialista_json/<?=$p->idUsuario?>"
													>
                                                    <i class="icon-pencil"></i>
                                                </a>
												<a href="<?=base_url()?>index.php/principalSuperAdmin/defaultPassE/<?=$p->idUsuario?>" style="text-decoration:none; color: #B64444"	>
                                                    <i class="icon-key"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>      
                    </div>   
                </div>
            </div>
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
            <button id="addfilter" class="btn btn-success" onclick="return false;" >Agregar</button>
        </div>
    </div>
    	
	<form id="delete-paciente-form" action="#">
		<div id="deletemodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Eliminar Paciente</h3>
			</div>
			<div class="modal-body">
				<p>Cuidado! Si borra este paciente absolutamente todos sus datos se perderan definitivamente.</p>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
				<button id="addfilter" class="btn btn-danger" >Eliminar</button>
			</div>
		</div>
	</form>
	
	<form id="editar_especialista_form" method="POST" action="#">
		<div id="editar_especialista_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Editar Especialista</h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" id="nombre"  name="nombre" placeholder="Nombre" />
					</div>
					<div class="span6" >
						<input required type="text" id="apellido" name="apellido" placeholder="Apellido" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" id="ciudad" name="ciudad" placeholder="Ciudad" />
					</div>
					<div class="span6" >
						<input required type="text" id="estado" name="pais" placeholder="Pais" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" id="telefono_personal" name="tel_personal" placeholder="Telefono Personal" />
					</div>
					<div class="span6" >
						<input required type="text" id="telefono_casa" name="tel_hogar" placeholder="Telefono Hogar" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" id="telefono_oficina" name="tel_oficina" placeholder="Telefono Oficina" />
					</div>
					<div class="span6" >
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" id="codigo_postal" name="cod_postal" placeholder="Codigo Postal" />
					</div>
					<div class="span6" >
						<input required type="text" id="correo_electronico" name="email" placeholder="Correo Electronico" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn" aria-hidden="true" value="Modificar" />
				<button id="" data-dismiss="modal" class="btn btn-danger" >Cancelar</button>
			</div>
		</div>
	</form>
	
	<form id="agregar_especialista_form" method="POST" action="<?=base_url()?>index.php/principalSuperAdmin/addEspecialista">
		<div id="agregar_especialista" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Agregar Especialista</h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="contrasenia" placeholder="Contraseña" />
					</div>
					<div class="span6" >
						<input id="nombre_usuario_agregar_especialista" required type="text" class="required_agregar_especialista" name="usuario" placeholder="Usuario" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" class="required_agregar_especialista" name="nombre" placeholder="Nombre" />
					</div>
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="apellido" placeholder="Apellido" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="ciudad" placeholder="Ciudad" />
					</div>
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="pais" placeholder="Pais" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="tel_personal" placeholder="Telefono Personal" />
					</div>
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="tel_hogar" placeholder="Telefono Hogar" />
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="tel_oficina" placeholder="Telefono Oficina" />
					</div>
					<div class="span6" >
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="cod_postal" placeholder="Codigo Postal" />
					</div>
					<div class="span6" >
						<input required type="text" class="required_agregar_especialista" name="email" placeholder="Correo Electronico" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn" aria-hidden="true" value="Agregar" />
				<button id="" data-dismiss="modal" class="btn btn-danger" >Cancelar</button>
			</div>
		</div>
	</form>
	
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

    <script>
        $(document).ready(function(){

            var BASE_URL = "<?=base_url()?>";

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
		$(document).ready(function(){
			
			$(".editar_especialista_button").click(function(){
				$("#editar_especialista_form").attr("action", "<?=base_url()?>index.php/principalSuperAdmin/editarEspecialista/" + $(this).data("id"));
				$.ajax({
					url : $(this).data("href"),
					type : "POST",
					data : {
						 "idUsuario" : $(this).data("id")
					},
					async : false,
					error : function(){
						 console.log("err");
					}, 
					success : function(response){
						console.log(response);
						var json = $.parseJSON(response);
						$.each(json[0], function(key, value){
							console.log(key+" "+value);
							$("#"+key).val(value);	
						});
					}
				});
			});
			
			$("#agregar_especialista_form").submit(function(){
				var is_complete = true;
				var exists = false;
				
				$(".required_agregar_especialista").each(function(){
					if($(this).val().length <= 0){
						is_complete = false;
						console.log("false");
					}
				});
				
				$.ajax({
					url : "<?=base_url()?>index.php/utils/checkUserNameExist",
					type : "POST",
					data : {
						 "userName" : $("#nombre_usuario_agregar_especialista").val()
					},
					async : false,
					error : function(){
						 exists = true;
						 $("#nombre_usuario_agregar_especialista").css("color","red");
						 console.log("ERR");
					}, 
					success : function(response){
						console.log(response);
						 if(response == "0"){
							 $("#nombre_usuario_agregar_especialista").css("color","#aaa");
							 console.log("NOT");
							 exists = false;
						 }else{
							 $("#nombre_usuario_agregar_especialista").css("color","red");
							 exists = true;
							 console.log("YES");
						 }
						 
					}
				});
							
				return is_complete && !exists;
			});
		
			$(".delete").click(function(){
				$("#delete-paciente-form").attr("action", $(this).data("href"));
			});
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

</html>

    
     
    
    