<div class="container-fluid amplio">
	<hr>
  <?php foreach ($productos as $producto) { ?>
  <div class="occ row">
    <div class="col-xs-3">
      <div class="occImg">
        <img src="http://redlinkup.com/upload/ofertas_dia/<?=$producto->img_url?>">
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
<script>productos()</script>