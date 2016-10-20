<form action="<?=base_url()?>index.php/acciones/usuario_cuestionario/{id}" method="POST" >
  <div class="container-fluid">
    <div>
      <h2 style="text-align:center" >{descripcion}</h2>
    </div>
    {preguntas}
      <div>
        <div class="row-fluid">
          <h4>{detalle}</h4>
        </div>
        {respuestas}
          <div style="margin-left:10px">
            <div>
              <input type="radio" value="{idRespuesta}" name="pregunta[{idPregunta}]" /> {descripcion}
            </div>
          </div>
        {/respuestas}
      </div>
    {/preguntas}
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
