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
	      <a href="<?=base_url()?>index.php/reservas/"><div class="col-xs-4">Carrito</div></a>
	      <a href="#"><div class="col-xs-4 active">Pendiente</div></a>
	      <a href="<?=base_url()?>index.php/reservas/confirmadas"><div class="col-xs-4">Confirmado</div></a>
	    </div>
	    <?php foreach ($compras as $compra) { ?>
	    <div class="reserva col-xs-12" >
	    	<div class="col-xs-2 reserva_cantidad" ><?=$compra->total_cant?></div>
	    	<div class="col-xs-7 prod_desc" id="reserva_descrip"><?=$compra->desc?></div>
	    	<div class="col-xs-3 prod_desc" id="reserva_prec">$<?=$compra->prec?></div>
	    </div>
	    <?php } ?>

	</div>
</div>
<script type="text/javascript">reservas()</script>