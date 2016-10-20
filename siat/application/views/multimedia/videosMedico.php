<html>
    <style>
        iframe {
            width:100%;
            height:30%;
        }
    </style>   
    <?php $this->load->view("commons/header"); ?>    
    <body>
        <?php $this->load->view("commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <h1>Videos</h1>
                    <div class="page-header"></div>
                    <?php
                        $cont = 0;
                        foreach ($videos as $video) {
                            $nro = $cont % 4;
                            if ($nro == 0) {
                                ?> <div class="row-fluid"> <?php } ?>
                                <div class="span3">
                                    <h3><?php echo $video->nombre ?></h3>
                                    <?php echo $video->code ?>
                                </div>
                                <?php
                                $cont++;
                                $nro = $cont % 4;
                                if ($nro == 0 || $cont==sizeof($videos)) {
                                    ?></div> <?php } ?>
                        <?php } ?>
                        <div class="page-header"></div>
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">Agregar Video</a>
                </div>
                
            </div>
        </div>
    </body>
    
    <form action="<?= base_url() ?>index.php/multimediaMedico/addVideo" method="POST">
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Agregar Video</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" style="padding:20px" class="input-xxlarge" name="nombre" placeholder="Nombre"/>
                </div>
                <div >
                    <input type="text" style="padding:20px" class="input-xxlarge" name="url" placeholder="URL YOUTUBE"/>
                </div>                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
    
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

</html>