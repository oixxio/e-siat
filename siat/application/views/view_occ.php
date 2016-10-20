<div class="container-fluid amplio">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icoocc.png">
        OCC
      </div>    
  </div>
    <?php foreach ($occ as $o) { ?>
  <div class="occ row">
    <div class="col-xs-3">
      <div class="occImg">
        <img src="http://redlinkup.com/upload/ocss/<?=$o->pic?>">
      </div>
      <div class="occPrecio">
        $<?=$o->precio?>
      </div>
    </div>
    <div class="col-xs-9">
      <div class="occDescripcion">
        <?=$o->desc?>
      </div>
    </div>
  </div>
  <?php } ?>  
</div>
<script>productos()</script>