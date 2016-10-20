<?php 
	$ci = &get_instance();
	$ci->load->model('footer_model'); 
	$compra = $ci->footer_model->getCarrito($this->data['userData']['id']);	
	$cantidad=0;
	$precio=0;
	foreach ($compra as $value) {
		$cantidad+=$value->total_cant;
		$precio+=($value->prec*$value->total_cant);
	}
?>
<div id="carrito_footer">
	<div >
		<div style="float:left; border:1px solid #ccc; width:25%">
			<img style="width:25px; float:left; margin:10px" src="<?=base_url()?>assets/img/cart.png" />
			<h4 style="float:left; padding:0; margin:5px; margin-top:14px; margin-left:2px"><?=$cantidad?></h4>
		</div>
		<div style="float:left; border:1px solid #ccc; width:43%">
			<h1 style="color:#d2311f; font-size:41px; float:left; margin:0; margin-left:10px;" >$</h1>
			<h4 style="float:left; padding:0; margin:10px; margin-left:5px" ><?=$precio?></h4>
		</div>
		<a href="<?=base_url()?>index.php/reservas">
			<div style="float:left; background: #ddd; border:1px solid #ccc; width:15%">
				<img style="width:25px; float:left; margin:10px" src="<?=base_url()?>assets/img/plus.png" />
			</div>
		</a>
		<a href="<?=base_url()?>index.php/reservas/createCompras" >
			<div style="float:left; background: #d2311f; border:1px solid #ccc; width:17%">
				<img style="width:25px; float:left; margin:10px" src="<?=base_url()?>assets/img/car_ok.png" />
			</div>
		</a>
	</div>
</div>
</body>
</html>