<!--Observaciones-->
<div id="agregarObservacion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_observaciones" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setHistoriaObservaciones/<?= $idPaciente ?>" method="POST"> 
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Observación</h3>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="span12">
               <label for="obs_txt">Observaciones</label>
               <textarea class="form-control" name="obs_txt" placeholder="Observaciones"></textarea>
            </div>
            <div class="span12">
               <label for="referencias_txt">Referencias</label>
               <textarea class="form-control" name="referencias_txt" placeholder="Referencias"></textarea>
            </div>
         </div>
         <br>
         <h3>Datos de evolicion de IMC del paciente</h3>
         <div class="row">
            <div class="span3">
               <input type="text" name="altura" placeholder="Altura">
            </div>
            <div class="span3">
               <input type="text" name="peso" placeholder="Peso">
            </div>
         </div>
         <div class="row">
            <div class="span3">
               <input type="text" name="peso_normal" placeholder="IMC Peso normal">
            </div>
         </div>
         <br><br>
         <button class="btn btn-info" type="submit">Enviar</button>
      </div>
   </form>
</div>
<!--Fin Observaciones-->
<!-- Evolucion -->
<div id="agregarEvolucion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_evolucion" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setHistoriaEvolucion/<?= $idPaciente ?>" method="POST">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Evolución</h3>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="span12">
               <label for="obs_txt">Dolencia principal</label>
               <textarea class="form-control" name="dolencia_txt" placeholder="Dolencia principal"></textarea>
            </div>
            <br><br>
            <div class="span12">
               <label for="referencias_txt">Histórico de la enfermedad actual [Evolución del Tratamiento]</label>
               <textarea class="form-control" name="historico_enfermedad_txt" placeholder="Histórico"></textarea>
            </div>
         </div>  
         <br>         
         <button class="btn btn-info" type="submit">Enviar</button>
      </div>
   </form>
</div>
<!-- Fin Evolucion -->
<!-- Examen -->
<div id="agregarExamen" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setHistoriaExamen/<?= $idPaciente ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Exámen</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <div class="span12">
               <label for="tipo_examen">Tipo</label>
               <select name="tipo_examen">
                  <option>Otros</option>
                  <option>Sangineo</option>
                  <option>Heces</option>
                  <option>Orina</option>
                  <option>Ecografía</option>
                  <option>Radiografía</option>
                  <option>Escaner</option>
                  <option>Contraste</option>
               </select>
            </div>
            <br>
            <div class="span12">
               <label for="obs_txt">Exámen</label>
               <textarea class="form-control" name="dolencia_txt"></textarea>
            </div> 
            <br>
            <div class="span12">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" />
            </div>
         </div> 
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Examen -->



 
<!-- Archivos -->
<!-- Archivos -->
<!-- Archivos -->


<!-- Consentimiento -->
<div id="agregarConsentimiento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/1" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Consentimiento Informado</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Consentimiento -->

<!-- Asistencia -->
<div id="agregarAsistencia" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/2" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Certidicado de Asistencia</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Asistencia -->

<!-- Social -->
<div id="agregarSocial" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/3" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Estudio Social</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Social -->

<!-- Vacunas -->
<div id="agregarVacunas" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/4" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Vacunas</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Vacunas -->

<!-- Complementarios -->
<div id="agregarComplementarios" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/5" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Estudios Complementarios</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Complementarios -->

<!-- Receta -->
<div id="agregarReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setArchivos/<?= $idPaciente ?>/6" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Receta Médica</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <div class="row">
            <div class="span12" style="width:500px;">
               <label for="observaciones_txt">Observaciones</label>
               <textarea class="form-control" name="observaciones_txt"></textarea>
            </div> 
         </div>
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Receta -->



<!-- Factura -->
<div id="agregarFactura" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal historia_clinica" id="form_examen" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setFactura/<?= $idPaciente ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Agregar Factura</h3>
      </div> 
      <div class="modal-body">
         <div class="row">
            <br>
            <input type="hidden" id="id_fac" name="id_fac">
            <div class="span12" style="width:500px;">
               <label for="userfile">Archivo</label>
               <input type="file" name="userfile" size="20" required/>
            </div>
         </div> 
         <br>
         <button class="btn btn-info" type="submit">Enviar</button> 
      </div>         
   </form>
</div>
<!-- Fin Factura -->