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
            background-color: c7c7c7!important
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
                    <div class="row-fluid" style="display:none" >
                        <h2>Filtro de Busqueda</h2>
                        <div class="page-header" ></div>
                        <div class="span11" id="filtros" >
                        </div>
                        <div class="page-header" ></div>
                        <button class="btn btn-success ">Buscar</button>
                        <button class="btn "><a role="button" href="#filterselector" data-toggle="modal" style="color:white; text-decoration:none"> Agregar Filtro </a></button>
                    </div>
                    <div class="row-fluid">
                        <h2 class="span12" >Pacientes</h2> 
                    </div>
                    <div class="page-header" ></div>
                    <div class="row-fluid">
                        <table id="pacientes" class="span12 table-striped">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    Mensaje
                                </th>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Usuario
                                </th>
                            </thead>
                            <tbody id="tablebody" >
                                <?php foreach ($logs as $k => $p) { ?>
                                    <tr>
                                        <td>
                                           <?=$k?>
                                        </td>
                                        <td>
                                            <?=$p->message?>
                                        </td>
                                        <td>
                                            <?=$p->fecha?>
                                        </td>
                                        <td>
                                            <?=$p->idUsuario?>
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
				<button id="addfilter" class="btn btn-danger" >Eliminar</button>
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
                <button id="restartbutton" class="btn btn-danger" >Cambiar</button>
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
			$(".delete").click(function(){
				$("#delete-paciente-form").attr("action", $(this).data("href"));
			});
            $(".restore").click(function(){
                $("#reiniciar-paciente-form").attr("action", $(this).data("href"));
            });
			$(".especialista").click(function(){
				$("#especialista").val($(this).data("idespecialista"));
				$("#change-especialista-form").attr("action", "<?=base_url()?>index.php/principalSuperAdmin/changeEspecialista/"+$(this).data("id"));
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

    
     
    
    