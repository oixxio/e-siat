<div class="container-fluid">
  <div class="row" id="mensajes">
    <div id="head_mensajes" class="col-xs-12">
      <div id="datos_mensajes" class="col-xs-8">
        <div class="col-xs-12">
          <div class="col-xs-10"><?=$empresa->desc;?></div>
          <div class="col-xs-2"><img src="<?=base_url()?>assets/img/mensajes_person.png"></div>
        </div>
        <div class="col-xs-12">
          <div class="col-xs-10">
          <?php
            $ultimo = 0; 
            if($mensajes<>null){
              $date = new DateTime(end($mensajes)->fecha_creacion);            
              echo $date->format('d-m-Y H:i');
              $ultimo = end($mensajes)->id;
            } ?>
          </div>
          <div class="col-xs-2"><img src="<?=base_url()?>assets/img/mensajes_calendar.png"></div>
        </div>
      </div>
      <div id="img_mensaje" class="col-xs-4">
        <img src="<?=base_url()?>assets/img/mensajes_phone.jpg" height="100%">
      </div>
    </div>
    <div id="all_mensajes" class="col-xs-12 amplio">    
    	<?php foreach ($mensajes as $mensaje) {
        if($mensaje->mensaje <> ""){
        if($mensaje->id_from == $empresa->idUsuario){ ?>
         <div class="col-xs-12 mensaje_izquierda">
          <?=$mensaje->mensaje;?>        
         </div> 
        <?php }else{ ?>
          <div class="col-xs-12 mensaje_derecha">
          <?=$mensaje->mensaje;?>        
         </div>
        <?php } }
        }  ?>
    </div>  
  </div>
  <div id="chat" class="col-xs-12">
    <div id="mensaje_text" class="col-xs-10">
      <input id="input_mensaje" type="text" placeholder="Escribir Mensaje">
    </div>
    <div id="mensajes_ico" class="col-xs-2">
      <img src="<?=base_url()?>assets/img/mensajes_talk.png">
    </div>
  </div>  
</div>
<style type="text/css">body{background-color: #dbd4c6;}</style>
<script type="text/javascript">mensajes('<?=base_url()?>','<?=$userData["id"]?>','<?=$empresa->idUsuario?>','<?=$ultimo?>')</script>