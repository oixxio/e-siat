<div class="container-fluid amplio">
	<div id="titulo" class="row">
    <div class="col-xs-12">
        <img src="<?=base_url()?>assets/img/icosponsors.png">
        Sponsor
      </div>    
  </div>
  <hr>

   <div id="sponsor" class="row">
    <div id="mail" class="col-xs-1 col-xs-offset-11">
      <img src="<?=base_url()?>assets/img/mail.png">
    </div>
    <div id="cabecera">
      <div id="sponsor_logo" class="col-xs-4">       
        <img src="http://redlinkup.com/upload/empresas/<?=$logo->logo;?>">
       </div>
      <a href="<?=base_url()?>index.php/empresa/index/<?=$idUsuario_empresa->idUsuario;?>"><div class="col-xs-4 naranja" style="border-right: 1px solid #FFFFFF;">Empresa</div></a>
      <a href="<?=base_url()?>index.php/empresa/index/<?=$idUsuario_distribuidor->idUsuario;?>"><div class="col-xs-4 naranja">Distribuidor</div></a>
    </div>
    <div id="comunicado" class="row">
      <div id="comunicado_titulo" class="col-xs-12"><?=$comunicado->titulo;?></div>
      <div id="comunicado_cuerpo" class="col-xs-12"><?=$comunicado->comunicado;?></div>
    </div>
    <div id="marcas">MARCAS</div>
    <?php $m=0; 
    foreach ($marcas as $key => $marca) { 
    $m=$key;
    if($key%2==0){ ?>
    <div class="row cuadros">
      <a href="<?=base_url()?>index.php/productos/index/<?=$marca->idProducto;?>">
        <div class="col-xs-6">
          <img src="http://redlinkup.com/upload/marcas/<?=$marca->imagen;?>">
        </div> 
      </a>
    <?php } else{?>
    <a href="<?=base_url()?>index.php/productos/index/<?=$marca->idProducto;?>">
      <div class="col-xs-6">
        <img src="http://redlinkup.com/upload/marcas/<?=$marca->imagen;?>">
      </div> 
    </a>
    </div>
    <?php } }
    if($m%2==0){ echo "</div>"; }
    ?>
   </div>
</div>
<script>cuadros()</script>