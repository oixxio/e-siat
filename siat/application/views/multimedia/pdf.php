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
                    <div class="row-fluid" >
                        <h1 class="pull-left" >Pdfs</h1>
                    </div>
                    <div class="row-fluid" >
                    <?php $c = 0; foreach ($pdf as $p) { ?>
                        <div class="span6">
                        <h2><?= $p->desc ?></h2>
                            <iframe src="<?= base_url() ?>archivos/pdf/<?=$p->url?>" style="width:100%; height:70%;" frameborder="0"></iframe>   
                        </div>
                        <?php if($c == 1 ){ $c= 0; echo "</div><div class='page-header'></div></div class='row-fluid'>";} else {$c++;} ?>
                    <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <form action="<?= base_url() ?>index.php/multimedia/addVideo" method="POST">
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