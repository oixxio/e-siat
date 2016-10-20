<div class="container-fluid">
	<div class="row" id="login">
		<br>
		<form method="POST" action="<?=base_url()?>index.php/login/acceso" role="form" class="col-xs-8 col-xs-offset-2">
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" name="user" class="form-control">
			</div>
			<div class="form-group">
				<label for="pass">Password</label>
				<input type="password" name="pass" class="form-control">
			</div>
			<button type="submit" class="btn btn-default">Ingresar</button>
		</form>
	</div>
			<div clas="col-xs-8"><p><?php if(isset($errores)) echo $errores;  if(isset($datos)) echo json_encode($datos); ?></p></div>
</div>