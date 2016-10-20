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
                        <h1>Mis Notificaciones</h1>
                    </div>
                    <div class="page-header header-re-loco"></div>
                    <div >
                        <?php foreach ($allNotificaciones as $not) { ?>
                            <a style="color:#333" href="<?= base_url() . $not->url ?>">
                                <div style="padding-top: 13px" class="containerWrapper">
                                    <div class="row-fluid" >
                                        <div class="span2">
                                            <div class="center">
                                                <img class="img-polaroid" style="max-width: 30px" src="<?=base_url()."profilepicture/".$not->imagen_perfil ?>"/>
                                            </div>
                                            <div class="center">
                                                <h5><?= $not->nombre . " " . $not->apellido ?></h5>
                                            </div>
                                            <div class="center">
                                                <p><?= $not->fechaCreada ?></p>
                                            </div>
                                        </div>
                                        <div class="span4" style="margin-top:1%">
                                            <h4><i class="<?= $not->icon ?>">&nbsp;&nbsp;</i> <?= $not->descripcion ?></h4>
                                        </div>
                                        <div class="span1 pull-right" style="margin-top:2%">
                                            <i style="color: <?= $not->active == 0 ? '#01DF3A' : '#FFFF00' ?>" 
                                               class="icon-2x <?= $not->active == 0 ? 'icon-ok-sign' : 'icon-warning-sign' ?>"></i>
                                        </div>
                                    </div>
                                    <hr style="margin:0px 0xp!important">
                                </div>
                            </a>
                        <?php } ?>
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
    <style>
        hr {
            margin:0px 0px!important
        }
        .containerWrapper:hover{
            background: #f8f8f8
        }
        .header-re-loco {
            margin-bottom: 0px!important
        }
    </style>
</html>