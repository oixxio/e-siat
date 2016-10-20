<div class="tabbable tabs-stacked">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#concentimiento_archivos" data-toggle="tab">Concentimiento Informado</a></li> <!-- Tipo1 -->
      <li class=""><a href="#asistencia_archivos" data-toggle="tab">Certificado de Asistencia</a></li> <!-- Tipo2 -->
      <li class=""><a href="#social_archivos" data-toggle="tab">Estudio Social</a></li> <!-- Tipo3 -->
      <li class=""><a href="#vacunas_archivos" data-toggle="tab">Vacunas</a></li> <!-- Tipo4 -->
      <li class=""><a href="#complementarios_archivos" data-toggle="tab">Estudios Complementarios</a></li> <!-- Tipo5 -->         
      <li class=""><a href="#receta_archivos" data-toggle="tab">Receta Médica</a></li> <!-- Tipo6 -->          
   </ul>
   <div class="tab-content" style="margin-bottom: 50px">
      
      <!-- Tab1 -->     
      <div class="tab-pane active" id="concentimiento_archivos">
         <h3>Concentimiento Informado</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 1)
                     {  
                        $band = TRUE;                      
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarConsentimiento" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab1 -->


      <!-- Tab2 -->
      <div class="tab-pane" id="asistencia_archivos">
         <h3>Certificado de Asistencia</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 2)
                     {    
                        $band = TRUE;                    
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarAsistencia" data-toggle="modal" >Agregar</a>
         </div>
      </div>      
      <!-- FIN - Tab2 -->


      <!-- Tab3 -->
      <div class="tab-pane" id="social_archivos">
         <h3>Estudio Social</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 3)
                     {  
                        $band = TRUE;                      
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarSocial" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab3 -->


      <!-- Tab4 -->
      <div class="tab-pane" id="vacunas_archivos">
         <h3>Vacunas</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 4)
                     {  
                        $band = TRUE;                      
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarVacunas" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab4 -->


      <!-- Tab5 -->
      <div class="tab-pane" id="complementarios_archivos">
         <h3>Estudios Complementarios</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 5)
                     {  
                        $band = TRUE;                      
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarComplementarios" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab5 --> 

      <!-- Tab6 -->
      <div class="tab-pane" id="receta_archivos">
         <h3>Receta Médica</h3>
         <br>
         <br>
         <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                  <th>Fecha</th>
                  <th>Archivo</th>
                  <th style="width:60%;">Observaciones</th>
               </tr>
            </thead>
            <tbody>
              <?php 
               $band = FALSE; 
               if(isset($archivos)){
                  foreach ($archivos as $archivo) 
                  {
                     if($archivo->tipo == 6)
                     {  
                        $band = TRUE;                      
                        echo "<tr>";
                        echo "<td>".date_format(new DateTime($archivo->fecha),"d/m/Y H:i")."</td>";
                        if($archivo->url <> '')
                           echo "<td><a target='_blank' href='".base_url()."uploads/archivos/".$archivo->url."'>".$archivo->original_name."</a></td>";
                        else   
                           echo "<td></td>";
                        echo "<td>".$archivo->observaciones."</td>";
                       
                        echo "</tr>";  
                     }
                  }
               }
               if($band == FALSE)
               {
                  echo "<tr><td></td><td></td><td></td></tr>";
                  echo "<tr><td></td><td></td><td></td></tr>";
               }
               ?>    
            </tbody>
         </table>
         <br>
         <div class="span6">
            <a class="btn btn-success" href="#agregarReceta" data-toggle="modal" >Agregar</a>
         </div>
      </div>
      <!-- FIN - Tab6 -->      
   </div>
</div>

