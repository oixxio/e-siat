<html>

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
                    <h1>Mi Tratamiento</h1>
                    <div class="page-header" ></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <h3><?= $tratamiento["detalle"] ?> &nbsp; (<?= $tratamiento['fechaInicio'] ?>) </h3>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">                            
                            <?php if (sizeof($tratamiento['dosis']) > 0) { ?>
                                <div class="hero-unit">
                                    <h1>Proxima Dosis</h1>
                                    <p>No olvide que debe colocarse su proxima dosis a las <?= $tratamiento['dosis'][0]->fechaHoraPrevistoFormated ?></p>
                                    <p>
                                        <?php if (strtotime(date($tratamiento['dosis'][0]->fechaHoraPrevisto)) > strtotime(date('Y-m-d H:i:d'))) { ?>
                                            <a data-toggle="modal" href='#fueradehorario' class="btn btn-grey">
                                                Aplicar 
                                            </a>
                                        <?php } else { ?>
                                            <a href='<?= base_url() ?>index.php/tratamientoPaciente/aplicar/<?= $tratamiento['dosis'][0]->idDosis ?>' class="btn btn-success">
                                                Aplicar
                                            </a>
                                        <?php } ?>
                                        <a href='#aDemanda' data-toggle="modal" class="btn btn-danger">
                                           <?php if($patologia != 1){ ?> Retrasada <?php }else{ ?> A demanda <?php } ?>
                                        </a>
                                    </p>
                                </div>
                            <?php } else { ?>
                                <div class="hero-unit">
                                    <h1>No quedan dosis por aplicar</h1>
                                    <p>Consulte a su medico para obtener mas informacion sobre su tratamiento o ante cualquier duda.</p>
                                    <p>
                                        <a href='#aDemanda' data-toggle="modal" class="btn btn-danger">
                                           <?php if($patologia != 1){ ?> Retrasada <?php }else{ ?> A demanda <?php } ?>
                                        </a>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row-fluid" style="">
                        <div  class="span12">
                            <hr>
                        </div>
                        <div class="span12" style="margin:0">
                            <?php for ($i = 1; $i < sizeof($tratamiento['dosis']) && $i < 7; $i++) { ?>
                                <table class="table table-striped">
                                    <thead>
                                    <th>Fecha/Hora</th>
                                    <th>Droga</th>
                                    <th>Cantidad</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $tratamiento['dosis'][$i]->fechaHoraPrevisto ?></td>
                                            <td><?= $tratamiento['dosis'][$i]->droga ?></td>
                                            <td><?= $tratamiento['dosis'][$i]->cantidad ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  

    

    <div id="fueradehorario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Dosis aun no disponible</h3>
        </div>
        <div class="modal-body">
            <h5>Si ha aplicado una dosis fuera del horario de
                profilaxis por favor indiquela como dosis a demanda.</h5>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Ok</button>
        </div>
    </div>

    <form action="<?= base_url() ?>index.php/tratamientoPaciente/aDemanda" id="borrar" method="POST">
        <div id="aDemanda" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Dosis a demanda</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input required class="input-xxlarge" name="cantidadUI" placeholder="Cantidad UI Ej: 1000" />
                </div>               
                <div style="margin-top:10px">
                    <select class="input-xxlarge" name="articulacion">
                        <option value="No Especifica" >Seleccione Articulacion</option>
                        <option value="Rodilla Izquierda" >Rodilla Izquierda</option>
                        <option value="Rodilla Derecha" >Rodilla Derecha</option>
                        <option value="Codo Izquierdo" >Codo Izquierdo</option>
                        <option value="Codo Derecho" >Codo Derecho</option>
                        <option value="Tobillo Izquierdo" >Tobillo Izquierdo</option>
                        <option value="Tobillo Derecho" >Tobillo Derecho</option>
                    </select>
                </div>
                <div>
                    <label>Tiempo aproximado transcurrido entre dolor y aplicacion. (Hs)</label>
                    <input name="tiempo" required class="input-xxlarge" style="height: 30px" type="number"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-danger">Aplicar</button>
            </div>
        </div>
    </form>

    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>

</html>