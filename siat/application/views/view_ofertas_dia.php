<div class="container-fluid amplio">
	<hr>
<?php 
    $m=0;
    foreach ($mayoristas as $key => $mayorista) { 
    $m=$key;
    if($key%2==0){ ?>
  <div class="row cuadros">
    <a href="<?=base_url()?>index.php/ofertas_dia_lista/index/<?=$mayorista->id;?>">
      <div class="col-xs-5 izquierdo">
         <img src="http://redlinkup.com/upload/mayoristas/<?=$mayorista->logo;?>">
      </div> 
    </a>
     <?php } else{?>
     <a href="<?=base_url()?>index.php/ofertas_dia_lista/index/<?=$mayorista->id;?>">
      <div class="col-xs-5">
        <img src="http://redlinkup.com/upload/empresas/<?=$mayorista->logo;?>">
      </div> 
    </a>
  </div>
  <?php } }
  if($m%2==0){ echo "</div>"; }
  ?>
</div>
<script>cuadros()</script>