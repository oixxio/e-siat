 <html>
    <style>
        h2{
            font-size: 18px;
        }
        li {
            line-height: 25px;
        }
        .videoResponsive{
            margin:0 auto;
            height:0px;
            width:100%; /*tomará el tamaño al 100% del #contenedor*/
            padding-top:56.25%; /*nos ayudara a la proporción del video*/
            position:relative;
        }

        .videoResponsive iframe{
            position:absolute;
            height:100%;
            width:100%;
            top:0px;
            left:0px;
        }
        .videoResponsive video{
            position:absolute;
            height:100%;
            width:100%;
            top:0px;
            left:0px;
        }
    </style>
    <?php $this->load->view("superusuario/commons/header"); ?>    
    <body>
        <?php $this->load->view("superusuario/commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("superusuario/commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
				
				<h1>Videos</h1>
				<div class="page-header"></div>
					
                <div id='page-content' class='clearfix'>
				
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
					<div class="page-header" ></div>
                    <?php if($permiso->perm == 4 || $permiso->perm == 2){ ?>
                        <a class="btn btn-success" href="#myModal" data-toggle="modal" > Agregar Video </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>  
    
    <form action="<?= base_url() ?>index.php/principal/addVideo" method="POST">
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

    
     
    
    