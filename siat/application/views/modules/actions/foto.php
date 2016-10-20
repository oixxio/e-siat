<form action="<?=base_url()?>index.php/acciones/usuario_foto/{id}" method="POST" enctype='multipart/form-data' >
  <div class="container-fluid">
    <div>
      <h2 style="text-align:center" >{titulo}</h2>
    </div>
      <div>
        <div class="row-fluid">
          <h4>{descripcion}</h4>
        </div>
        <div class="row-fluid" >
          <img class="col-xs-12" src="<?=base_url()?>upload/foto/{imagen_example}" />
        </div>
        <div class="row-fluid" >
          <input class="col-xs-12" type="file" name="userfile" />
        </div>
      </div>
  </div>
  <div class="" style="bottom:0; position:fixed; width:100%" >
    <input type="button" value="Bases y Condiciones" class="btn btn-bases col-xs-6" />
    <input type="submit" value="Enviar" class="btn btn-enviar col-xs-6" />
  </div>
</form>

<style>
  .btn-bases {
    background: #404040;
    color: white;
    border-radius: 0
  }
  .btn-enviar {
    background: #d33120;
    color:white;
    border-radius: 0
  }
</style>
