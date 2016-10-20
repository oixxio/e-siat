<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>LinkUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
	<script src="<?=base_url()?>assets/js/jquery.min.js"></script> 
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/funciones.js"></script>
	<style>
		.new-row {
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;
		}
		.left_bar {
			width: 80%;
			height: 80%;	
			background:#444;
			position:absolute;
			left: -80%;
			z-index:200;
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
		#trigger_left_menu {
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
		#trigger_left_menu:active {
			background:#AAA
		}
		li:active {
			background:#8eb1ec;
		}
		.action_bar {
			background: #e0e0e0;
			height:auto;
			width:60%;
			left:40%;
			position:absolute;
			z-index:200;
			visibility: hidden;
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
		#settings {
			background:#D2311F;
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
		#settings:active {
			background:#ee988e;
		}
		#home {
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
		#home:active {
			background:#cccccc;
		}
		#obscure {
			-webkit-transition-duration: 0.5s;
			-webkit-transform: translate3d(0, 0, 0);
			-moz-transition-duration: 0.5s;
			-moz-transform: translate3d(0, 0, 0);
			-o-transition-duration : 0.5s;
			-o-transform: translate3d(0, 0, 0);
			transition-duration : 0.5s;
			transform: translate3d(0, 0, 0);
		}
	</style>
	<script>
		var BASE_URL = "<?=base_url()?>";
	</script>
	<script>
		$(document).ready(function(){
			var is_open = true;
			var is_action_open = true;

			var just_open = true;

			$(document).click(function(evt){    

				if(!just_open){
					if(!is_open){
						if(evt.target.id == "left_bar")
				          return;

				       if($(evt.target).closest('.left_bar').length)
				          return  true;          

	  					$(".left_bar").css("left", "-80%");
						$("#trigger_left_menu").css("left", "0px");
						$("#obscure").css("display", is_open ? "block" : "none" );
						is_open = !is_open;

						return false;

					}

				    if(!is_action_open)  {
				    	if(evt.target.id == "action_bar")
				        	return;

				        if($(evt.target).closest('.action_bar').length)
				          	return true;             

	      				$(".action_bar").css({
							"visibility" : is_action_open ? "visible" : "hidden",
							"opacity" : is_action_open ? "1" : "0"
						});
						is_action_open = !is_action_open;

						return false;

				    }
				}

				just_open = false;

			});

			$("#trigger_left_menu").click(function(){
				$(".left_bar").css("left", is_open ? "0%" : "-80%");
				$(this).css("left", is_open ? "-7px" : "0px");
				$("#obscure").css("display", is_open ? "block" : "none" );
				is_open = !is_open;
				if(!is_action_open){
					$(".action_bar").css({
						"visibility" : "hidden",
						"opacity" : "0"
					});
					is_action_open = !is_action_open;
				}
				just_open = true;
			});

			$("#settings").click(function(){
				$(".action_bar").css({
					"visibility" : is_action_open ? "visible" : "hidden",
					"opacity" : is_action_open ? "1" : "0"
				});
				is_action_open = !is_action_open;
				console.log(is_open);
				if(!is_open){
					$(".left_bar").css("left", "-80%");
					$("#trigger_left_menu").css("left", "0px");
					is_open = !is_open;
				}
				just_open = true;
			});
			
		});
	</script>
</head>
<body>	
	
	<div style="position:relative">
  		<div id="toolbar" style="background:#424242; position:relative; height:60px" style="">
  			<div id="trigger_left_menu" class="col-xs-6" style="float:left" >
  				<img id="imagenHead" src="<?=base_url()?>assets/img/logo_toolbar.png" style="100%" class="img-responsive" alt="head" width="100%">
  			</div>
  			<div style="height:100%; float:right" id="settings">
  				<img style="height:100%" id="" src="<?=base_url()?>assets/img/settings.png" class="img-responsive" alt="head">
  			</div>
  			<a href="<?=base_url()?>">
	  			<div style="height:100%; float:right" id="home">
	  				<img style="height:100%" id="" src="<?=base_url()?>assets/img/home.png" class="img-responsive" alt="head">
	  			</div>
	  		</a>
  		</div>
	</div>
	<div id="obscure" style="position:absolute; z-index:199; width:100%; height:100%; background: rgba(0,0,0,0.5); display:none">
	</div>
	<div class="left_bar">
		<ul class="list-unstyled" >
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:white" href="https://www.facebook.com/pages/Red-de-Compra/631465046952637" >Facebook</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:grey" href="#" >Twitter</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:grey" href="#" >QQ</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:grey" href="#" >Preguntas Frecuentes</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:grey" href="#" >Bases y Condiciones</a></li>
		</ul>
	</div>
	<div class="action_bar">
		<ul class="list-unstyled" >
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; width:100%; color:black" href="<?=base_url()?>index.php/reservas" >Reservas</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; color:grey" href="#" >Mensajes</a></li>
		  <li style="padding:10px" ><a style="text-decoration:none; text-size:20px; width:100%; color:black" href="<?=base_url()?>index.php/login/salida" >Cerrar Sesion</a></li>
		</ul>
	</div>

