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
      <a href=""><div class="col-xs-4 active">Perfil</div></a>
      <a href=""><div class="col-xs-4">Programa</div></a>
      <a href="<?=base_url()?>index.php/lista/index/<?=$idUsuario_mayorista->idUsuario;?>"><div class="col-xs-4">Lista de Precios</div></a>
    </div>

    <div id="mail" class="col-xs-1 col-xs-offset-11">
      <img src="<?=base_url()?>assets/img/mail.png">
    </div>
    <div id="cabecera">
      <div id="sponsor_logo2" class="col-xs-4">       
        <img src="http://redlinkup.com/upload/mayoristas/<?=$logo->logo;?>">
       </div>
      <a href="<?=base_url()?>index.php/empresa/index/<?=$idUsuario_mayorista->idUsuario;?>"><div class="col-xs-4 naranja" style="border-right: 1px solid #FFFFFF;">Mayorista</div></a>
      <a href="<?=base_url()?>index.php/empresa/index/<?=$idUsuario_sucursal->idUsuario;?>"><div class="col-xs-4 naranja">Sucursal</div></a>
    </div>
    <div id="comunicado" class="row">
      <div id="comunicado_titulo" class="col-xs-12"><?=$comunicado->titulo;?></div>
      <div id="comunicado_cuerpo" class="col-xs-12"><?=$comunicado->comunicado;?></div>
    </div>
  </div>
</div>
<script type="text/javascript">logo()</script>