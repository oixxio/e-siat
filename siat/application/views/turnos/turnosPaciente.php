<html>
    <style>
        iframe {
            width:100%;
            height:30%;
        }
    </style>   
    <?php $this->load->view("commons/header"); ?>    
    <body>
        <?php $this->load->view("commons/navbarPaciente"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("commons/lateralPaciente"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                            <h1>Mis Turnos</h1>
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
                                <th>
                                    
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($turnos as $turno) { ?>
                                <tr>
                                    <td><?=$turno->hora." - ".$turno->fecha?></td>
                                    <td><?=$turno->lugar?></td>
                                    <td><?=$turno->observaciones?></td>
                                    <td>
                                        <?php if($turno->asistenciaPaciente == '1'){ ?>
                                        <a style="text-decoration: none" class="cambiar-button" href="#cambio" role="button" 
                                           data-toggle="modal" 
                                           data-id="<?=$turno->idTurno?>"
                                           data-fecha="<?=$turno->fechaField?>"
                                           data-hora="<?=$turno->hora?>"
                                           >
                                            <button class="btn btn-warning">
                                                <i class="icon-calendar  bigger-110 icon-only"></i>
                                            </button>
                                        </a> 
                                        <a class="borrar-button" href="#borrado" role="button" 
                                           data-toggle="modal" 
                                           data-id="<?=$turno->idTurno?>"
                                           >
                                            <button class="btn btn-danger">
                                                <i class="icon-trash  bigger-110 icon-only"></i>
                                            </button>
                                        </a>
                                        <?php }else{ ?>
                                        <a class="resolicitud-button" style="text-decoration:none" href="#resolicitud" role="button" 
                                           data-toggle="modal" 
                                           data-id="<?=$turno->idTurno?>"
                                           >
                                            <button class="btn btn-success">
                                                <i class="icon-arrow-down  bigger-110 icon-only"></i>
                                            </button>
                                        </a>
                                        <a style="text-decoration:none; color: red" >Turno Cancelado</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </body>
    
    <form action="" method="POST" id="cambiar" >
        <div id="cambio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Solicitud de Cambio de Horario</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input id="fecha" type="date" style="padding:20px;width: 49.7%;"  name="fecha"/>
                    <input id="hora" type="time" style="padding:20px;width: 49.6%;"  name="hora"/>
                </div>                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
    
    <form action="<?= base_url() ?>index.php/turnosPaciente/eliminar" id="borrar" method="POST">
        <div id="borrado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Solicitar Cancelacion de Turno</h3>
            </div>
            <div class="modal-body">
                <div>
                    <h5>Se enviara una solicitud a su medico.</h5>
                </div>               
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-danger">Enviar</button>
            </div>
        </div>
    </form>

    <form action="<?= base_url() ?>index.php/turnosPaciente/eliminar" id="returno" method="POST">
        <div id="resolicitud" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Solicitar Turno Nuevamente</h3>
            </div>
            <div class="modal-body">
                <div>
                    <h5>Se enviara una solicitud a su medico.</h5>
                </div>               
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-success">Enviar</button>
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
        $(".cambiar-button").click(function(){
            $("#fecha").val($(this).data("fecha"));
            $("#hora").val($(this).data("hora"));
            $("#cambiar").attr("action", "<?= base_url() ?>index.php/turnosPaciente/cambiar/"+$(this).data("id"));
        });
        $(".borrar-button").click(function(){
            $("#borrar").attr("action", "<?= base_url() ?>index.php/turnosPaciente/eliminar/"+$(this).data("id"));
        });
        $(".resolicitud-button").click(function(){
            $("#returno").attr("action", "<?= base_url() ?>index.php/turnosPaciente/resolicitud/"+$(this).data("id"));
        });
    </script>
            
</html>