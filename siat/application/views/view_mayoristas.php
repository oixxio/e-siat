<div class="container-fluid amplio">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icooffers.png">
        Mayoristas
      </div>    
  </div>
  <div class="row boton">
	  <a href="<?=base_url()?>index.php/ofertas_dia">
      <div class="col-xs-10 .col-xs-offset-1">
	  		Ofertas del día
      </div>  
	  </a>			
  </div>
  <?php 
    $m=0;
    foreach ($mayoristas as $key => $mayorista) { 
    $m=$key;
    if($key%2==0){ ?>
  <div class="row cuadros">
    <a href="<?=base_url()?>index.php/mayorista/index/<?=$mayorista->id;?>">
      <div class="col-xs-5 izquierdo">
         <img src="http://redlinkup.com/upload/mayoristas/<?=$mayorista->logo;?>">
      </div> 
    </a>
     <?php } else{?>
     <a href="<?=base_url()?>index.php/mayorista/index/<?=$mayorista->id;?>">
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