<!DOCTYPE html>
<html lang="en">
<title>Ingreso</title>
        
        <?php $this->load->view("commons/header"); ?>

	<body class="login-layout" style="background: url('<?=base_url()?>_priv/css/images/bg.jpg'); background-repeat:no-repeat; background-size:100% 100%">
		<div class="container-fluid" id="main-container">
			<div id="main-content">
				<div class="row-fluid" style="margin-top: 10%">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-group green"></i>
												    Inicio de Sesion
												</h4>
												<div class="space-6"></div>

												<form action="<?=base_url()?>index.php/login/cheUserData" method="POST">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input name="user" type="text" class="span12" placeholder="Username" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input name="pass" type="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="row-fluid">
															<input style="float: right" type="submit" class="span4 btn btn-small btn-primary">
															</input>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
												<div>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														Olvide mi contraseña
													</a>
												</div>

												<!--<div>
													<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
														Crear usuario nuevo
														<i class="icon-arrow-right"></i>
													</a>
												</div>-->
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Recobrar Contraseña
												</h4>

												<div class="space-6"></div>
												<p>
													Ingrese su e-mail y recibira instrucciones para recobrarla
												</p>

												<form>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<div class="row-fluid">
															<button onclick="return false;" class="span5 offset7 btn btn-small btn-danger">
																<i class="icon-lightbulb"></i>
																Enviar
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													VOLVER
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->

									<div id="signup-box" class="widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Registro Nuevo Especialista
												</h4>

												<div class="space-6"></div>

												<form id="newUserForm" method="POST" action="<?=base_url()?>index.php/login/addEspecialista">
													<fieldset>
														<label>
                                                                                                                    <div class="control-group">
                                                                                                                        <div class="controls">
                                                                                                                                <span class="input-icon input-icon-right">
                                                                                                                                        <input required name="email" placeholder="Email" class="input-xlarge editable_perfil" style="height: 30px;" type="text" value="" />
                                                                                                                                        
                                                                                                                                </span>
                                                                                                                        </div>
                                                                                                                    </div>
														</label>

														<label>
                                                                                                                       <div id="control-usuario" class="control-group">
                                                                                                                            <div class="controls">
                                                                                                                                    <span class="input-icon input-icon-right">
                                                                                                                                            <input required name="usuario" placeholder="Usuario" id="nombreUsuario" class="input-xlarge editable_perfil" style="height: 30px;" type="text" value="" />
                                                                                                                                            <i id="usuarioOk" class="icon-ok-sign hidden" ></i>
                                                                                                                                            <i id="usuarioError" class="icon-remove-sign hidden"></i>
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                        </div>
														</label>

														<label>
															<div id="control-usuario" class="control-group">
                                                                                                                            <div class="controls">
                                                                                                                                    <span class="input-icon input-icon-right">
                                                                                                                                            <input required name="contrasenia" id="password" class="input-xlarge editable_perfil" style="height: 30px;" type="password" value="" placeholder="Contraseña"/>
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                        </div>
														</label>

														<label>
                                                                                                                    <div class="control-group" id="error-div">
															<div class="controls">
                                                                                                                                <span class="input-icon input-icon-right">
                                                                                                                                        <input placeholder="Repetir Contraseña" id="repeatPassword" type="password" value="" style="height: 30px;" class="input-xlarge editable_perfil tooltip-error" type="text" id="inputError" data-rel="tooltip" title="" data-trigger="focus" data-original-title="Contraseñas no coinciden">
                                                                                                                                        <i style="display:none" id="error-sign" class="icon-remove-sign"></i>
                                                                                                                                </span>
                                                                                                                        </div>
                                                                                                                    </div>
														</label>

                                                                                                                <label>
															 <div class="progress progress-success progress-striped active">
                                                                                                                                <div id="bar" class="bar" style="width: 0%"></div>
                                                                                                                        </div>
														</label>

														<div class="space-24"></div>

														<div class="row-fluid">

															<button onclick="" class="span6 btn btn-small btn-success pull-right">
																Register
																<i class="icon-arrow-right icon-on-right"></i>
															</button>
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													<i class="icon-arrow-left"></i>
													Back to login
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/signup-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->

		<!--basic scripts-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>"+"<"+"/script>");
		</script>

		<!--page specific plugin scripts-->

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
                <script>
                    $(document).ready(function(){

                        var passMatch = false;
                        var userExist = false;

                        $("#password").on("keyup", function(){
                            var perc = 0;
                            if($(this).val().match(/[a-z]/) != null && $(this).val().match(/[a-z]/).length > 0){
                                perc++;
                            }
                            if($(this).val().match(/[A-Z]/) != null && $(this).val().match(/[A-Z]/).length > 0){
                                perc++;
                            }
                            if($(this).val().match(/[0-9]/) != null && $(this).val().match(/[0-9]/).length > 0){
                                perc++;
                            }
                            if($(this).val().length > 8){
                                perc++;
                            }
                            if($(this).val().length > 12){
                                perc++;
                            }
                            if($(this).val().length > 16){
                                perc++;
                            }
                            $("#bar").css("width", perc * 100 / 6+"%");


                            if($("#repeatPassword").val().length > 0){
                               var reg = new RegExp("^" + $("#password").val() + "$", "");
                               if($("#repeatPassword").val().match(reg) != null){
                                   passMatch = true;
                                   $("#error-div").removeClass("error");
                                   $("#error-sign").css("display", "none");
                               }else{
                                   passMatch = false;
                                   $("#error-div").addClass("error");
                                   $("#error-sign").css("display", "block");
                               }
                            }else{
                                passMatch = false;
                                $("#error-div").removeClass("error");
                                $("#error-sign").css("display", "none");
                            }
                        });

                       $("#repeatPassword").on("keyup", function(){
                           if($(this).val().length > 0){
                               var reg = new RegExp("^" + $("#password").val() + "$", "");
                               if($(this).val().match(reg) != null){
                                   passMatch = true;
                                   $("#error-div").removeClass("error");
                                   $("#error-sign").css("display", "none");
                               }else{
                                   passMatch = false;
                                   $("#error-div").addClass("error");
                                   $("#error-sign").css("display", "block");
                               }
                           }else{
                               passMatch = false;
                               $("#error-div").removeClass("error");
                               $("#error-sign").css("display", "none");
                           }
                       });
                       
                       $("#newUserForm").submit(function(){
                            if(passMatch && userExist)
                                return true;
                            return false;
                       });
                       
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
                                         $("#control-usuario").removeClass("success");
                                         $("#control-usuario").addClass("error");
                                         $("#usuarioOk").addClass("hidden");
                                         $("#usuarioError").removeClass("hidden");
                                         userExist = false;
                                    }, 
                                    success : function(response){
                                        console.log("success");
                                         if(response == "0"){
                                             $("#control-usuario").removeClass("error");
                                             $("#control-usuario").addClass("success");
                                             $("#usuarioOk").removeClass("hidden");
                                             $("#usuarioError").addClass("hidden");
                                             userExist = true;
                                         }else{
                                             userExist = false;
                                             $("#control-usuario").removeClass("success");
                                             $("#control-usuario").addClass("error");
                                             $("#usuarioOk").addClass("hidden");
                                             $("#usuarioError").removeClass("hidden");
                                         }
                                    }
                                });
                            }else{
                                $("#usuarioOk").addClass("hidden");
                                $("#usuarioError").addClass("hidden");
                                $("#control-usuario").removeClass("success");
                                $("#control-usuario").removeClass("error");
                            }
                        });
                    });
                </script>
                
	</body>
</html>