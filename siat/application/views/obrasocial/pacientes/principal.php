<html>

    <?php $this->load->view("commons/header"); ?>    
    <body>
        <?php $this->load->view("obrasocial/commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                <span></span>
            </a>
            <?php $this->load->view("obrasocial/commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div>
                        <h1>Mis Pacientes</h1>
                    </div>
                    <div class="page-header"></div>
                    <div class="row-fluid">
                        <table class="table table-striped span12">
                            <thead>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Documento
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>
                                Ciudad
                            </th>
                            <th>
                                Pais
                            </th>
                            </thead>
                            <tbody>
                                <?php foreach ($pacientes as $p) { ?>
                                    <tr>
                                        <td>
                                            <a href="<?=base_url()?>index.php/pacientesObrasocial/particular/<?=$p->idPaciente?>"><?= $p->nombre . " " . $p->apellido ?></a>
                                        </td>
                                        <td>
                                            <?= $p->documento ?>
                                        </td>
                                        <td>
                                            <?= $p->telefono_personal ?>
                                        </td>
                                        <td>
                                            <?= $p->ciudad ?>
                                        </td>
                                        <td>
                                            <?= $p->estado ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>  
    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>

</html>
