<html>
    
    <?php $this->load->view("commons/header"); ?>
    
    <body>
        <?php $this->load->view("commons/navbar"); ?>
        <div class="row-fluid">
            <div class='container-fluid' id="main-container" style='padding:0px'>
                <a id="menu-toggler" href="#">
                        <span></span>
                </a>
                <?php $this->load->view("commons/lateral"); ?>
                <div id='main-content' class='clearfix'>
                    <div id='page-content' class='clearfix'>
                        <div class="row-fluid">
                            <h1>Turnos paciente</h1>
                        </div>
                        <div class="page-header"> </div>
                        <table id="clients_table" class="table-striped table" >
                            <thead>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Lugar
                                </th>
                                <th>
                                    Observaciones
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($turnos as $turno) { ?>
                                <tr>
                                    <td><?=$turno->hora?></td>
                                    <td><?=$turno->lugar?></td>
                                    <td><?=$turno->observaciones?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div style="margin-top: 50px">
                            <a href="#myModal" role="button" class="btn" data-toggle="modal">Nuevo Turno</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
    <form action="<?=base_url()?>index.php/turnos/addTurno/<?=$id?>" method="POST">
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Nuevo Turno</h3>
          </div>
          <div class="modal-body">
              <div>
                  <input type="text" value="<?=$id?>" style="display:none; padding:20px" class="input-xxlarge" name="idPaciente" placeholder="Paciente"/>
              </div>
              <div>
                  <input value="<?= date('Y-m-d') ?>" type="date" style="padding:20px;width: 49.7%;"  name="fecha"/>
                  <input  value="<?= date('H:i') ?>" type="time" style="padding:20px;width: 49.6%;"  name="hora"/>
              </div>
              <div >
                  <input type="text" style="padding:20px" class="input-xxlarge" name="lugar" placeholder="Lugar"/>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <button class="btn btn-primary">Registrar</button>
          </div>
        </div>
    </form>
    
    <form id="editarForm" action="<?=base_url()?>index.php/turnos/editTurno" method="POST">
        <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Editar Turno</h3>
          </div>
          <div class="modal-body">
              <div>
                  <input id="idPaciente" type="text" style="padding:20px" class="input-xxlarge" name="idPaciente" placeholder="Paciente"/>
              </div>
              <div >
                 <input value="<?= date('Y-m-d') ?>" id="fecha" type="date" style="padding:20px;width: 49.7%;"  name="fecha"/>
                 <input value="<?= date('H:i') ?>" id="hora" type="time" style="padding:20px;width: 49.6%;"  name="hora"/>
              </div>
              <div >
                  <input id="lugar" type="text" style="padding:20px" class="input-xxlarge" name="lugar" placeholder="Lugar"/>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <button class="btn btn-primary">Actualizar</button>
          </div>
        </div>
    </form>
    
    <form id="delForm" action="#" method="POST">
        <div id="eliminarModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Eliminar Turno</h3>
          </div>
          <div class="modal-body">
              <h3>Si elimina el turno sus datos se perderan permanentemente!</h3>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <input type="submit" class="btn btn-danger" value="Eliminar"/>
          </div>
        </div>
    </form>    
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>
            
    <script>
        $(document).ready(function(){
            $("body").on('click', '.eliminar', function(){
                $("#delForm").attr("action", "<?=base_url()?>index.php/turnos/delTurno/"+$(this).attr("id"));
            });
            $("body").on('click', '.editar', function(){
                $("#editarForm").attr("action", "<?=base_url()?>index.php/turnos/editTurno/"+$(this).attr("id"));
                $.ajax({
                    url : "<?=base_url()?>index.php/turnos/getJsonFromId/"+$(this).attr("id"),
                    method : "POST",
                    success : function(response){
                        response = $.parseJSON(response);
                        $("#idPaciente").val(response.idPaciente);
                        $("#fecha").val(response.fecha);
                        $("#hora").val(response.hora2);
                        $("#lugar").val(response.lugar);
                    }
                });
            });
                       
        });          
        
    </script>

</html>