<div class="container-fluid amplio">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icocarrito.png">
        Reservas
      </div>    
  </div>
  <hr>
   
   <div id="sponsor" class="row">
	    <div id="tabs_mayorista" class="col-xs-12">
	      <a href="#"><div class="col-xs-4 active">Carrito</div></a>
	      <a href="<?=base_url()?>index.php/reservas/pendientes"><div class="col-xs-4">Pendiente</div></a>
	      <a href="<?=base_url()?>index.php/reservas/confirmadas"><div class="col-xs-4">Confirmado</div></a>
	    </div>
	    <?php foreach ($compras as $compra) { ?>
	    <div class="reserva col-xs-12" id="compra_<?=$compra->idCarro?>">
	    	<div class="col-xs-1" id="reserva_spiner">
	    		<img src="<?=base_url()?>assets/img/arr_up.png" class="up" data-id="<?=$compra->idCarro?>" id="up" width="100%">
  				<img src="<?=base_url()?>assets/img/arr_down.png" class="down" data-id="<?=$compra->idCarro?>" id="down" width="100%">
	    	</div>
	    	<div class="col-xs-2 reserva_cantidad" id="reserva_cantidad_<?=$compra->idCarro?>"><?=$compra->total_cant?></div>
	    	<div class="col-xs-5 prod_desc" id="reserva_descrip"><?=$compra->desc?></div>
	    	<div class="col-xs-3 prod_desc" id="reserva_prec">$<?=$compra->prec?></div>
	    	<div class="col-xs-1 prod_desc" id="reserva_close"  >
	    		<img src="<?=base_url()?>assets/img/closeico.png" class="close" data-id="<?=$compra->idCarro?>" width="100%">
	    	</div>
	    </div>
	    <?php } ?>

	</div>
	<a href="<?=base_url()?>index.php/reservas/createCompras" >
		<div style="position:fixed; height:50px; width:100%; bottom:0; padding:2px">
			<div id="boton-enviar" style="width:100%; height:100%; background:#d52f1f; padding-top:10px">
				<h3 style="margin:0; color:white; width:100%; height:100%; text-align:center;">ENVIAR</h3>
			</div>
		</div>
	</a>
</div>
<script type="text/javascript">reservas()</script>