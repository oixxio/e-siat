<div class="container-fluid">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icomembers.png">
        Empresas Adheridas
      </div>    
  </div>
  <?php 
    $m=0;
    foreach ($adheridas as $key => $adherida) { 
    $m=$key;
    if($key%2==0){ ?>
    <div class="row cuadros">
      <a href="<?=base_url()?>index.php/sponsor/index/<?=$adherida->id;?>">
        <div class="col-xs-5 izquierdo">
          <img src="http://redlinkup.com/upload/empresas/<?=$adherida->logo;?>">
        </div> 
      </a>
    <?php } else{?>
    <a href="<?=base_url()?>index.php/sponsor/index/<?=$adherida->id;?>">
      <div class="col-xs-5">
        <img src="http://redlinkup.com/upload/empresas/<?=$adherida->logo;?>">
      </div> 
    </a>
  </div>
  <?php } }
  if($m%2==0){ echo "</div>"; }
  ?>
</div>
<script>cuadros()</script>