<div class="container-fluid amplio">
   <div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icooffers.png">
        Mayorista
      </div>    
  </div>
  <hr>
   <div id="sponsor" class="row">
   <div id="tabs_mayorista" class="col-xs-12">
      <a href="<?=base_url()?>index.php/mayorista/index/<?=$idUsuario_mayorista->id;?>"><div class="col-xs-4">Perfil</div></a>
      <a href=""><div class="col-xs-4">Programa</div></a>
      <a href=""><div class="col-xs-4 active">Lista de Precios</div></a>
    </div>
   </div>

	<?php foreach ($productos as $producto) { ?>
  <div class="occ row">
    <div class="col-xs-3">
      <div class="occImg">
        <img src="http://redlinkup.com/upload/productos/<?=$producto->pic;?>">
      </div>
      <div class="occPrecio">
        $<?=$producto->prec?>
      </div>
    </div>
    <div class="col-xs-9">
      <div class="occDescripcion">
        <?=$producto->desc?>
      </div>
    </div>
  </div>
  <?php } ?>  
</div>
<script>productos();</script>