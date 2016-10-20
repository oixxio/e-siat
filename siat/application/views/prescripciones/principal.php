<html>
    <style>
        .setRecibida {
            text-decoration:  none;
            color: black;
        }
        .setRecibida:hover{
            text-decoration:  none;
            color:black
        }
        tr {
            cursor: pointer
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
                        <h1>Mis Prescipciones</h1>
                    </div>
                    <div class="page-header"></div>
                    <div class="row-fluid">
                        <div>
                            <table class="table-striped span12">
                                <thead>
                                <th>
                                    Descripcion
                                </th>
                                <th>
                                    Cantidad Solicitada
                                </th>
                                <th>
                                    Fecha Solicitud
                                </th>
                                <th>
                                    Entregada
                                </th>
                                <th>
                                    Fecha Entregada
                                </th>
                                <th>
                                    Cantidad Entregada
                                </th>
                                <th>
                                    Recibida
                                </th>
                                <th>
                                    Fecha recibida
                                </th>
                                <th>
                                    Cantidad recibida
                                </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($prescripciones as $p) { ?>

                                        <tr <?php if($p->recibido != 1) {?> class='setRecibida' href='#setRecibida' data-id='<?= $p->id ?>' data-toggle='modal' <?php } ?>>
                                            <td>
                                                <?= $p->descripcion ?>
                                            </td>
                                            <td>
                                               <?= $p->cantidad ?>
                                            </td>
                                            <td>
                                               <?= $p->fechaRecetada ?></a>
                                            </td>
                                            <td>
                                                <?= $p->entregada == 1 ? "<i style='color:#4f4' class='icon-ok-sign'></i>" : "<i style='color:red' class='icon-remove-circle'></i>" ?>
                                            </td>
                                            <td>
                                                <?= $p->fechaEntregada == 0 ? "-" : $p->fechaEntregada ?>
                                            </td>
                                            <td>
                                                <?= $p->cantidadEntregada == 0 ? "-" : $p->cantidadEntregada ?>
                                            </td>
                                            <td>
                                                <?= $p->recibido == 1 ? "<i style='color:#4f4' class='icon-ok-sign'></i>" : "<i style='color:red' class='icon-remove-circle'></i>" ?>
                                            </td>
                                            <td>
                                                <?= $p->fechaRecibido == 0 ? "-" : $p->fechaRecibido ?>
                                            </td>
                                            <td>
                                                <?= $p->cantidadRecibida == 0 ? "-" : $p->cantidadRecibida ?>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  

    <form id='recibida' action="<?= base_url() ?>index.php/prescripcionesPaciente/setRecibida" method="POST">
        <div id="setRecibida" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Confirmar Prescripcion Recibida</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input class="input-xxlarge" type="text" name="cantidadUI" placeholder="Cantidad UI Ej: 5000" /> 
                </div>
                <div >
                    <?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
                    <input style="width:50%" type="date" name="fecha"  value="<?= date('Y-m-d') ?>" />
                    <input style="width:49%" type="time" name="hora" value="<?= date('H:i') ?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </form>


    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>

    <script>
        $(document).ready(function(){
            $(".setRecibida").click(function(){
                $("#recibida").attr("action", "<?= base_url() ?>index.php/prescripcionesPaciente/setRecibida/"+$(this).data("id"));
            });
        });
    </script>


</html>