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
                        <h2 class="span12" >Obras Sociales</h2> 
                    </div>
                    <div class="page-header" ></div>
                    <div class="row-fluid">
                        <table id="pacientes" class="span12 table-striped">
                            <thead>
                                <th>
                                    Razon Social
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </thead>
                            <tbody id="tablebody" >
                                <?php foreach ($obrasocial as $p) { ?>
                                    <tr style="<?=$p->active == 0 ? 'color: #878484' : '' ?>">

                                        <td style="margin-left: 5px">
                                            <h5 data-id="<?=$p->idUsuario?>" class="action-all" ><?=$p->nombre?></h5>
                                        </td>
                                        <td>
                                            <?php if($permiso->perm == 4 || $permiso->perm == 3){ ?>
                                                <a class="delete_obra_social_button" style="text-decoration:none;" href="#eliminar_obra_social_modal"
                                                    data-toggle="modal"
                                                    data-href="<?=base_url()?>index.php/principalSuperAdmin/eliminarObraSocial/<?=$p->idUsuario?>"
                                                >
                                                    <i class="icon-trash"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
    											<a href="<?=base_url()?>index.php/principalSuperAdmin/defaultPassO/<?=$p->idUsuario?>" style="text-decoration:none; color: #B64444"	>
                                                    <i class="icon-key"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>      
                    </div>
                    <div class="page-header"></div> 
                    <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                        <div class="row-fluid" style="background: #f4f4f4; "> 
                            <div class="span10" style="padding-left:12px" >
                                <h3>Agregar Obra Social</h3>
                            </div>
                        </div>
                        <form id="agregar_obra_social_form" action="<?=base_url()?>index.php/principalSuperAdmin/agregarObraSocial" method="POST" style="background: #f4f4f4; padding-left:14px; padding-right:14px" >
                        <div class="row-fluid">                     
                            <div class="span6" >
                                <input style="width:100%; height:35px" class="input-xlarge" id="nombre_usuario_agregar_obra_social" required type="text" placeholder="Nombre Usuario" name="user" />
                            </div>           
                            <div class="span6" >
                                <input style="width:100%; height:35px" class="input-xlarge" required type="text" placeholder="Contraseña" name="pass" />
                            </div>
                        </div>
                        <div class="row-fluid">                     
                            <div class="span6" >
                                <input style="width:100%; height:35px" class="input-xlarge" required type="text" placeholder="Razon Social" name="name" />
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12" >
                                <input type="submit" value="Crear" class="btn btn-success pull-right" />
                            </div>
                        </div>
                        <div class="page-header"></div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body> 


    
    	
	<form id="delete-obra-social-form" action="#">
		<div id="eliminar_obra_social_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Eliminar Obra Social</h3>
			</div>
			<div class="modal-body">
				<p>Cuidado! Si borra esta Obra Social absolutamente todos sus datos se perderan definitivamente.</p>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
				<button id="addfilter" class="btn btn-danger" >Eliminar</button>
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
            $(".delete_obra_social_button").click(function(){
                $("#delete-obra-social-form").attr("action", $(this).data("href"));
            });

            $("#agregar_obra_social_form").submit(function(){
                var exists = false;
                
                $.ajax({
                    url : "<?=base_url()?>index.php/utils/checkUserNameExist",
                    type : "POST",
                    data : {
                         "userName" : $("#nombre_usuario_agregar_obra_social").val()
                    },
                    async : false,
                    error : function(){
                         exists = true;
                         $("#nombre_usuario_agregar_obra_social").css("color","red");
                    }, 
                    success : function(response){
                         if(response == "0"){
                             $("#nombre_usuario_agregar_obra_social").css("color","#aaa");
                             exists = false;
                         }else{
                             $("#nombre_usuario_agregar_obra_social").css("color","red");
                             exists = true;
                         }
                         
                    }
                });
                            
                return !exists;
            });

        });
    </script>

</html>

    
     
    
    