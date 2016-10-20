<html>

    <?php $this->load->view("superusuario/commons/header"); ?>    
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
                                            <img alt="" style="width:100%;" src="<?= base_url()."profilepicture/".$data['imagen_perfil'] ?>">
                                            <div class="text">
                                                <div class="inner">
                                                    <span>Cambiar imagen</span>
                                                    <br>
                                                    <a href="#cambiarImagen" data-toggle="modal">
                                                        <i class="icon-picture"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-header"></div>
                    <div class="row-fluid">
                        <div class="tabbable tabs-stacked">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#A" data-toggle="tab">Datos de Usuario</a></li>
                            </ul>
                            <div class="tab-content" style="margin-bottom: 50px">
                                <div class="tab-pane active" id="A">
                                    <form action="<?= base_url() ?>index.php/principalSuperAdmin/updatePass" method="POST"> 
                                        <div  class="row-fluid">
                                            <h2>Datos de Usuario</h2>
                                            <div class="page-header"></div>
                                            <div class="span11">
                                                <div  class="row-fluid">
                                                    <div class="span11">
                                                        <h4>Usuario</h4>
                                                        <div>
                                                            <div id="control-usuario" class="control-group">
                                                                <div class="controls">
                                                                    <span class="input-icon input-icon-right">
                                                                        <input required name="nombreUsuario" id="nombreUsuario" class="input-xlarge" style="height: 30px;" type="text" value="<?= $data['nombreUsuario'] ?>" />
                                                                        <i id="usuarioOk" class="icon-ok-sign hidden" ></i>
                                                                        <i id="usuarioError" class="icon-remove-sign hidden"></i>
                                                                    </span>
                                                                    <i id="check" style=" margin-left: 7px; cursor: pointer; " class="icon-refresh hidden"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div  class="row-fluid">
                                                    <div class="span3">
                                                        <h4>Contraseña Anterior</h4>
                                                        <div>
                                                            <div>
                                                                <input required name="passAnterior" class="input-xlarge" style="height: 30px;" type="password" value="" />
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div  class="row-fluid">
                                                    <div class="span3">
                                                        <h4>Contraseña</h4>
                                                        <div>
                                                            <div>
                                                                <input name="newPass" id="password" class="input-xlarge" style="height: 30px;" type="password" value="" />
                                                            </div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span11">
                                            <hr>
                                            <div >
                                                <input class="btn btn-default" style="float:right" type="submit" value="Guardar" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  
    
    <form id='recibida' action="<?= base_url() ?>index.php/principalSuperAdmin/cambiarImagenPerfil" method="POST" enctype="multipart/form-data" >
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
    
    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>  
    <style>
        @-webkit-keyframes rotate {
            0% {
            -webkit-transform: rotate(0deg)
        }
        100% {
            -webkit-transform: rotate(360deg)
        }
        }
        #check {
            -webkit-animation-duration: 1s;
            -webkit-animation-iteration-count: infinite;
        }
    </style>
</html>
