<html>

    <?php $this->load->view("commons/header"); ?>    
    <body>
        <?php $this->load->view("obrasocial/commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                <span></span>
            </a>
            <?php $this->load->view("obrasocial/commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                        <div class="span2">
                            <div style="width:100%;">
                                <ul class="ace-thumbnails" style="width:100%;">
                                    <li style="width:100%;">
                                        <div style="width:100%;">
                                            <img alt="" style="width:100%;" src="<?= base_url()."profilepicture/".$perfil->imagen_perfil ?>">
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
                        <div class="span4">
                            <h1><?= $perfil->nombre . " " . $perfil->apellido ?></h1>
                            <h4><?= $perfil->direccion . ", " . $perfil->ciudad . ", " . $perfil->estado ?></h4>
                            <h4><?= $perfil->telefono ?></h4>
                        </div>
                    </div>
                    <div class="page-header"></div>
                    <?php if ($state == "2") { ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Error: </strong>Ha ocurrido un error al ejecutar la consulta. Intente nuevamente.
                        </div>
                    <?php } else if ($state == "1") { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Completado: </strong>El cambio ha sido realizado correctamente.
                        </div>
                    <?php } ?>
                    <div class="row-fluid">
                        <div class="tabbable tabs-stacked">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#A" data-toggle="tab">Perfil</a></li>
                                <li class=""><a href="#B" data-toggle="tab">Datos de Usuario</a></li>
                            </ul>
                            <div class="tab-content" style="margin-bottom: 50px">
                                <div class="tab-pane active" id="A">
                                    <h2>Perfil</h2>
                                    <div class="page-header"></div>
                                    <div class="row-fluid">
                                        <div class="span14">
                                            <form action="<?= base_url() ?>index.php/perfilObrasocial/actualizarData" method="POST">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <h4>Nombre</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->nombre ?></h5>
                                                        <input name="nombre" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="tel" value="<?= $perfil->nombre ?>" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <h4>Ciudad</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->ciudad ?></h5>
                                                        <input name="ciudad" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="tel" value="<?= $perfil->ciudad ?>" />
                                                    </div>
                                                    <div class="span6">
                                                        <h4>Pais</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->estado ?></h5>
                                                        <input name="estado" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="tel" value="<?= $perfil->estado ?>" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <h4>Telefono</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->telefono_oficina ?></h5>
                                                        <input name="telefonoOficina" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="tel" value="<?= $perfil->telefono_oficina ?>" />
                                                    </div>
                                                    <div class="span6">
                                                        <h4>Codigo Postal</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->codigo_postal ?></h5>
                                                        <input name="codigoPostal" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="text" value="<?= $perfil->codigo_postal ?>" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <h4>Correo Electronico</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->correo_electronico ?></h5>
                                                        <input name="correoElectronico" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="email" value="<?= $perfil->correo_electronico ?>" />
                                                    </div>
                                                    <div class="span6">
                                                        <h4>Direccion</h4>
                                                        <h5 class="non-editable-perfil"><?= $perfil->direccion ?></h5>
                                                        <input name="direccion" class="input-xlarge editable_perfil" style="height: 30px; display: none" type="tel" value="<?= $perfil->direccion ?>" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row-fluid">
                                                    <div class="span3 pull-right">
                                                        <input id="editar" style="float:right; margin-left: 3px" class="btn btn-default non-editable-perfil" value="Editar" type="button" />
                                                        <input id="enviar" style="float:right; margin-left: 3px; display: none" class="btn btn-success editable_perfil" type="submit" value="Finalizado" />
                                                        <input id="cancelar" style="float:right; margin-left: 3px; display: none" class="btn btn-danger editable_perfil" type="button" value="Cancelar" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="B">
                                    <form action="<?= base_url() ?>index.php/perfilObrasocial/updatePass" method="POST"> 
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
                                                                        <input required name="nombreUsuario" id="nombreUsuario" class="input-xlarge" style="height: 30px;" type="text" value="<?= $perfil->nombreUsuario ?>" />
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
                                                            <h5>Repetir Contraseña</h5>
                                                            <div>
                                                                <div class="control-group" id="error-div">
                                                                    <div class="controls">
                                                                        <span class="input-icon input-icon-right">
                                                                            <input id="repeatPassword" type="password" value="" style="height: 30px;" class="input-xlarge tooltip-error" type="text" id="inputError" data-rel="tooltip" title="" data-trigger="focus" data-original-title="Contraseñas no coinciden">
                                                                            <i style="display:none" id="error-sign" class="icon-remove-sign"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <div class="progress progress-info progress-striped active">
                                                                <div id="bar" class="bar" style="width: 0%"></div>
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
    
    <form id='recibida' action="<?= base_url() ?>index.php/perfilObrasocial/cambiarImagenPerfil" method="POST" enctype="multipart/form-data" >
        <div id="cambiarImagen" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Confirmar Prescripcion Recibida</h3>
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
    <script>
        $(document).ready(function() {

            $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                no_file: 'No File ...',
                btn_choose: 'Choose',
                btn_change: 'Change',
                droppable: false,
                onchange: null,
                thumbnail: false //| true | large
                        //whitelist:'gif|png|jpg|jpeg'
                        //blacklist:'exe|php'
                        //onchange:''
                        //
            });

            $("#editar").click(function() {
                $(".non-editable-perfil").css("display", "none");
                $(".editable_perfil").css("display", "block");
            });
            $("#cancelar").click(function() {
                $(".non-editable-perfil").css("display", "block");
                $(".editable_perfil").css("display", "none");
            });

            $("#password").on("keyup", function() {
                var perc = 0;
                if ($(this).val().match(/[a-z]/) != null && $(this).val().match(/[a-z]/).length > 0) {
                    perc++;
                }
                if ($(this).val().match(/[A-Z]/) != null && $(this).val().match(/[A-Z]/).length > 0) {
                    perc++;
                }
                if ($(this).val().match(/[0-9]/) != null && $(this).val().match(/[0-9]/).length > 0) {
                    perc++;
                }
                if ($(this).val().length > 8) {
                    perc++;
                }
                if ($(this).val().length > 12) {
                    perc++;
                }
                if ($(this).val().length > 16) {
                    perc++;
                }
                $("#bar").css("width", perc * 100 / 6 + "%");


                if ($("#repeatPassword").val().length > 0) {
                    var reg = new RegExp("^" + $("#password").val() + "$", "");
                    if ($("#repeatPassword").val().match(reg) != null) {
                        $("#error-div").removeClass("error");
                        $("#error-sign").css("display", "none");
                    } else {
                        $("#error-div").addClass("error");
                        $("#error-sign").css("display", "block");
                    }
                } else {
                    $("#error-div").removeClass("error");
                    $("#error-sign").css("display", "none");
                }
            });

            $("#repeatPassword").on("keyup", function() {
                if ($(this).val().length > 0) {
                    var reg = new RegExp("^" + $("#password").val() + "$", "");
                    if ($(this).val().match(reg) != null) {
                        $("#error-div").removeClass("error");
                        $("#error-sign").css("display", "none");
                    } else {
                        $("#error-div").addClass("error");
                        $("#error-sign").css("display", "block");
                    }
                } else {
                    $("#error-div").removeClass("error");
                    $("#error-sign").css("display", "none");
                }
            });

            $("#nombreUsuario").on("keyup", function() {
                $("#check").css({
                    "-webkit-animation-name": "rotate"
                }).removeClass("hidden");
                $.ajax({
                    url: "<?= base_url() ?>index.php/perfil/checkUserName",
                    type: "POST",
                    data: {
                        "userName": $(this).val(),
                        "actualUserName": "<?= $perfil->nombreUsuario ?>"
                    },
                    error: function() {
                        $("#check").css({
                            "-webkit-animation-name": "rotate"
                        }).addClass("hidden");
                        $("#control-usuario").removeClass("success");
                        $("#control-usuario").addClass("error");
                        $("#usuarioOk").addClass("hidden");
                        $("#usuarioError").removeClass("hidden");
                    },
                    success: function(response) {
                        $("#check").css({
                            "-webkit-animation-name": "rotate"
                        }).addClass("hidden");
                        if (response == "0") {
                            $("#control-usuario").removeClass("error");
                            $("#control-usuario").addClass("success");
                            $("#usuarioOk").removeClass("hidden");
                            $("#usuarioError").addClass("hidden");
                        } else {
                            $("#control-usuario").removeClass("success");
                            $("#control-usuario").addClass("error");
                            $("#usuarioOk").addClass("hidden");
                            $("#usuarioError").removeClass("hidden");
                        }
                    }
                });
            });

        });
    </script>
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
