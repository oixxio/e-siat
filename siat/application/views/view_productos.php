<div class="container-fluid amplio">
<br>
	<?php foreach ($productos as $key => $producto) { ?>
  <a href="<?=base_url()?>index.php/producto/index/<?=$producto->id?>">
    <div class="occ row">
      <div class="col-xs-3">
        <div class="occImg">
          <img src="http://redlinkup.com/upload/productos/<?=$producto->pic ?>">
        </div>
        <div class="occPrecio">
          <?=$producto->prec ?>
        </div>
      </div>
      <div class="col-xs-9">
        <div class="occDescripcion">
          <?=$producto->desc ?>
        </div>
      </div>
    </div>  
  </a>
  <?php } ?>  
</div>
<script>productos()</script>