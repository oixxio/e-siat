<div class="container-fluid amplio">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icosponsors.png">
        Sponsor
      </div>    
  </div>
  <hr>
  <div id="producto" class="row">
  	<div class="col-xs-4" id="producto_img">
  		<img src="http://redlinkup.com/upload/productos/<?=$producto->pic?>">
  	</div>
  	<div class="col-xs-8" id="producto_datos">
  		<div class="col-xs-6" id="producto_precio">$<?=$producto->prec?></div>
  		<div class="col-xs-1"id="producto_spiner">
  			<img src="<?=base_url()?>assets/img/arr_up.png" id="up" width="100%">
  			<img src="<?=base_url()?>assets/img/arr_down.png" id="down" width="100%">
  		</div>
  		<div class="col-xs-5" id="producto_cantidad"></div>
  		<div class="col-xs-12" id="producto_comprar" data-url="<?=base_url()?>index.php/producto/comprar/<?=$producto->id?>/">COMPRAR</div>
  	</div>
  </div>
  <div id="producto_exhib" class="row">
  	<p>Exhibicion</p>
  	<img style="width:100%" src="http://redlinkup.com/upload/productos/<?=$producto->exhib_pic?>" height="100%">
  </div>
  <div id="producto_desc" class="row">
  	<p><?=$producto->nombre?></p>
  </div>


  

</div>

<script>productos(); comprar();</script>