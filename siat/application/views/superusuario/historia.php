<div class="tabbable tabs-stacked">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#principal_historia" data-toggle="tab">Principal</a></li>
      <li class=""><a href="#observaciones_historia" data-toggle="tab">Observaciones</a></li>
      <li class=""><a href="#historico_historia" data-toggle="tab">Histórico</a></li>
      <li class=""><a href="#evolucion_historia" data-toggle="tab">Evolución</a></li>
      <li class=""><a href="#examen_historia" data-toggle="tab">Examen</a></li>         
   </ul>
   <div class="tab-content" style="margin-bottom: 50px">
      <!-- Tab1 -->     
      <div class="tab-pane active" id="principal_historia">
         <h2>Información del Paciente</h2>
         <form class="form-horizontal historia_clinica" id="form_principal" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setHistoriaPrincipal/<?= $idPaciente ?>" method="POST">
            <br>
            <div class="row">
               <div class="span3">
                  <input type="text" name="obraSocial" placeholder="Obra Social" value="<?php if(isset($historia_principal->obraSocial)) echo $historia_principal->obraSocial;?>">
               </div>
               <div class="span2">
                  <input type="text" name="plan" placeholder="Plan" value="<?php if(isset($historia_principal->plan)) echo $historia_principal->plan;?>">
               </div>
               <div class="span2">
                  <input type="text" name="nroAfiliado" placeholder="Nº Afiliado" value="<?php if(isset($historia_principal->nroAfiliado)) echo $historia_principal->nroAfiliado;?>">
               </div>
               <div class="span3">
                  <input type="text" name="valido" placeholder="Válido Hasta" value="<?php if(isset($historia_principal->validoHasta)) echo $historia_principal->validoHasta;?>">
               </div>
            </div>
            <br><hr>
            <div class="row">
               <div class="span4">
                  <input type="text" name="nombrePaciente" placeholder="Nombre" value="<?php if(isset($historia_principal->nombre)) echo $historia_principal->nombre;?>">
               </div>
               <div class="span3">
                  <input type="text" name="fechaNac" placeholder="Fecha de Nacimiento" value="<?php if(isset($historia_principal->fechaNacimiento)) echo $historia_principal->fechaNacimiento;?>">
               </div>
               <div class="span3">
                  <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php if(isset($historia_principal->nacionalidad)) echo $historia_principal->nacionalidad;?>">
               </div>
            </div><br>
            <div class="row">
               <div class="span3">
                  <input type="text" name="edad" placeholder="Edad" value="<?php if(isset($historia_principal->edad)) echo $historia_principal->edad;?>">
               </div>
               <div class="span3">
                  <input type="text" name="sexo" placeholder="Sexo" value="<?php if(isset($historia_principal->sexo)) echo $historia_principal->sexo;?>">
               </div>
               <div class="span4">
                  <input type="text" name="estadoCivil" placeholder="Estado Civil" value="<?php if(isset($historia_principal->estadoCivil)) echo $historia_principal->estadoCivil;?>">
               </div>
            </div><br>
            <div class="row">
               <div class="span3">
                  <input type="text" name="direccion" placeholder="Direccion" value="<?php if(isset($historia_principal->direccion)) echo $historia_principal->direccion;?>">
               </div>
               <div class="span2">
                  <input type="text" name="barrio" placeholder="Barrio" value="<?php if(isset($historia_principal->barrio)) echo $historia_principal->barrio;?>">
               </div>
               <div class="span1">
                  <input type="text" name="codigoPostal" placeholder="CP" value="<?php if(isset($historia_principal->codigoPostal)) echo $historia_principal->codigoPostal;?>">
               </div>
               <div class="span2">
                  <input type="text" name="ciudad" placeholder="Ciudad" value="<?php if(isset($historia_principal->ciudad)) echo $historia_principal->ciudad;?>">
               </div>
               <div class="span2">
                  <input type="text" name="provincia" placeholder="Provincia" value="<?php if(isset($historia_principal->provincia)) echo $historia_principal->provincia;?>">
               </div>
            </div><br>
            <div class="row">
               <div class="span2">
                  <input type="text" name="telefono1" placeholder="Teléfono 1" value="<?php if(isset($historia_principal->telefono1)) echo $historia_principal->telefono1;?>">
               </div>
               <div class="span2">
                  <select name="tipo1" id="tipo1">
                     <option value="1">Fijo</option>
                     <option value="2">Celular</option>
                     <option value="3">Oficina</option>
                  </select>
               </div>
               <div class="span2">
                  <input type="text" name="telefono2" placeholder="Teléfono 2" value="<?php if(isset($historia_principal->telefono2)) echo $historia_principal->telefono2;?>">
               </div>
               <div class="span2">
                  <select name="tipo2" id="tipo2">
                     <option value="1">Fijo</option>
                     <option value="2">Celular</option>
                     <option value="3">Oficina</option>
                  </select>
               </div>
               <script type="text/javascript">
               <?php 
                  if(isset($historia_principal->tipo1))
                     echo "document.getElementById('tipo1').value='".$historia_principal->tipo1."';";
                  if(isset($historia_principal->tipo2))
                     echo "document.getElementById('tipo2').value='".$historia_principal->tipo2."';";
               ?>
               </script>
               <div class="span2">
                  <input type="text" name="emailPaciente" placeholder="Email" value="<?php if(isset($historia_principal->email)) echo $historia_principal->email;?>"> 
               </div>
            </div>
            <br><hr>
            <div class="row">
               <div class="span4">
                  <input type="text" name="patologia" placeholder="Patología" value="<?php if(isset($historia_principal->patologia)) echo $historia_principal->patologia;?>">
               </div>
               <div class="span3">
                  <input type="text" name="medicoCabecera" placeholder="Médico de Cabecera" value="<?php if(isset($historia_principal->medico)) echo $historia_principal->medico;?>">
               </div>
               <div class="span3">
                  <input type="text" name="telefonoMedico" placeholder="Teléfono Médico" value="<?php if(isset($historia_principal->telefonoMedico)) echo $historia_principal->telefonoMedico;?>"> 
               </div>
            </div><br>
            <div class="row">
               <div class="span4">
                  <input type="text" name="factor" placeholder="Factor" value="<?php if(isset($historia_principal->factor)) echo $historia_principal->factor;?>">
               </div>
               <div class="span3">
                  <input type="text" name="cantidadUI" placeholder="Cantidad UI" value="<?php if(isset($historia_principal->cantidadUI)) echo $historia_principal->cantidadUI;?>">
               </div>
               <div class="span3">
                  <input type="text" name="compuesto" placeholder="Compuesto" value="<?php if(isset($historia_principal->compuesto)) echo $historia_principal->compuesto;?>">
               </div>
            </div>
            <br><br>
            <button class="btn btn-info" type="submit">Enviar</button>
         </form>
      </div>
      <!-- FIN - Tab1 -->
      <!-- Tab2 -->
      <div class="tab-pane" id="observaciones_historia">
         <h2>Información del Paciente</h2>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th style="width:41%;">Observaciones</th>
                  <th style="width:41%;">Referencias</th>
                  <th style="width:6%;">Altura</th>
                  <th style="width:6%;">Peso</th>
                  <th style="width:6%;">IMC</th>
               </tr>
            </thead>
            <tbody>
               <?php 
               if(isset($historia_observaciones[0]->observaciones)){
                  foreach ($historia_observaciones as $key) {
                     echo "<tr>";
                     echo "<td>".$key->observaciones."</td>";
                     echo "<td>".$key->referencias."</td>";
                     echo "<td>".$key->altura."</td>";
                     echo "<td>".$key->peso."</td>";
                     echo "<td>".$key->pesoNormal."</td>";
                     echo "</tr>";  
                  }
               }
               else{
                  echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
               }
               ?>               
            </tbody>
         </table>
         <br><br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarObservacion" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab2 -->
      <!-- Tab3 -->
      <div class="tab-pane" id="historico_historia">
         <h2>Información del Paciente</h2>
         <form class="form-horizontal historia_clinica" id="form_historico" role="form" action="<?= base_url() ?>index.php/principalSuperAdmin/setHistorico/<?= $idPaciente ?>" method="POST">
            <br>  
            <div class="row">
               <div class="span12">
                  <label for="obs_txt">Historia Médica</label>
                  <textarea class="form-control" name="historia_medica_txt" placeholder="Historia Médica"> <?php if(isset($historia_principal->historiaMedica)) echo $historia_principal->historiaMedica;?> </textarea>
               </div>
            </div>
            <br>
            <h3>Estado de salud</h3>
            <div class="row">
               <div class="span12">
                  <label for="nro_consulta" style="display:inline-block">Consulta realizada el día</label><input type="text" style="width:100px;margin-top: -1px;margin-left: 9px;" name="nro_consulta" value="<?php if(isset($historia_principal->consultaRealizada)) echo $historia_principal->consultaRealizada;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Alergias</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="alergiasRadio" id="alergiasRadio1" value="1" <?php if(isset($historia_principal->alergia)) if($historia_principal->alergia == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="alergiasRadio" id="alergiasRadio2" value="0" <?php if(isset($historia_principal->alergia)) if($historia_principal->alergia == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="alergiaDesc" value="<?php if(isset($historia_principal->alergiaDesc)) echo $historia_principal->alergiaDesc;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Diabetes</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="diabetesRadio" id="diabetesRadio1" value="1" <?php if(isset($historia_principal->diabetes)) if($historia_principal->diabetes == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="diabetesRadio" id="diabetesRadio2" value="0" <?php if(isset($historia_principal->diabetes)) if($historia_principal->diabetes == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="diabetesDesc" value="<?php if(isset($historia_principal->diabetesDesc)) echo $historia_principal->diabetesDesc;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Problemas respiratorios</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="respiratoriosRadio" id="respiratoriosRadio1" value="1" <?php if(isset($historia_principal->respiratorios)) if($historia_principal->respiratorios == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="respiratoriosRadio" id="respiratoriosRadio2" value="0" <?php if(isset($historia_principal->respiratorios)) if($historia_principal->respiratorios == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="respiratoriosDesc" value="<?php if(isset($historia_principal->respiratoriosDesc)) echo $historia_principal->respiratoriosDesc;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Problemas circulatorios</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="circulatoriosRadio" id="circulatoriosRadio1" value="1" <?php if(isset($historia_principal->circulatorios)) if($historia_principal->circulatorios == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="circulatoriosRadio" id="circulatoriosRadio2" value="0" <?php if(isset($historia_principal->circulatorios)) if($historia_principal->circulatorios == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="circulatoriosDes" value="<?php if(isset($historia_principal->circulatoriosDes)) echo $historia_principal->circulatoriosDes;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Cirugías</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="cirugiasRadio" id="cirugiasRadio1" value="1" <?php if(isset($historia_principal->cirugias)) if($historia_principal->cirugias == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="cirugiasRadio" id="cirugiasRadio2" value="0" <?php if(isset($historia_principal->cirugias)) if($historia_principal->cirugias == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="cirugiasDes" value="<?php if(isset($historia_principal->cirugiasDes)) echo $historia_principal->cirugiasDes;?>">
               </div>
            </div>
            <hr>
            <div class="row">  
               <div class="span12">
                  <label>Medicametnos</label>
                  <div class="radio">
                     <label class="radio-inline">
                        <input type="radio" name="medicamentosRadio" id="medicamentosRadio1" value="1" <?php if(isset($historia_principal->medicamentos)) if($historia_principal->medicamentos == 1) echo "checked" ?>> Si
                     </label>
                     <label class="radio-inline radio-right">
                       <input type="radio" name="medicamentosRadio" id="medicamentosRadio2" value="0" <?php if(isset($historia_principal->medicamentos)) if($historia_principal->medicamentos == 0) echo "checked" ?>> No
                     </label>
                  </div>
               </div>
               <div class="span5">
                  <input type="text" name="medicamentosDes" value="<?php if(isset($historia_principal->medicamentosDes)) echo $historia_principal->medicamentosDes;?>">
               </div>
            </div>
            <br>
            <button class="btn btn-info" type="submit">Enviar</button>
         </form>
      </div>
      <!-- FIN - Tab3 -->
      <!-- Tab4 -->
      <div class="tab-pane" id="evolucion_historia">
         <h2>Información del Paciente</h2>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th style="width:60%;">Dolencia</th>
                  <th style="width:40%;">Histórico</th>                  
               </tr>
            </thead>
            <tbody>
               <?php 
               if(isset($historia_evolucion[0]->dolencia)){
                  foreach ($historia_evolucion as $key) {
                     echo "<tr>";
                     echo "<td>".$key->dolencia."</td>";
                     echo "<td>".$key->historicoEnfermedad."</td>";
                     echo "</tr>";  
                  }
               }
               else{
                  echo "<tr><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td></tr>";
               }
               ?>             
            </tbody>
         </table>
         <br><br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarEvolucion" data-toggle="modal" >Agregar</a>
         </div>         
      </div>
      <!-- FIN - Tab4 -->
      <!-- Tab5 -->
      <div class="tab-pane" id="examen_historia">
         <h2>Información del Paciente</h2>
         <br>
         <br>
         <h4>Exámenes</h4>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th style="width:60%;">Tipo</th>
                  <th>Resultado</th>
                  <th>Archivo</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               if(isset($historia_examen[0]->resultado)){
                  foreach ($historia_examen as $key) {
                     echo "<tr>";
                     echo "<td>".$key->tipo."</td>";
                     echo "<td>".$key->resultado."</td>";
                     if($key->archivo <> '')
                        echo "<td><a href='".base_url()."uploads/examenes/".$key->archivo."'>Archivo</a></td>";
                     else   
                        echo "<td></td>";
                    
                     echo "</tr>";  
                  }
               }
               else{
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarExamen" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab5 -->      
   </div>
</div>