<html>
    
    <?php $this->load->view("commons/header"); ?>
    
    <body>
        <?php $this->load->view("commons/navbar"); ?>
        <div class='container-fluid' id="main-container" style="padding:0px">
            <a id="menu-toggler" href="#">
                <span></span>
            </a>
            <?php $this->load->view("commons/lateral"); ?>
            <div id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                        <h1>Mis Pacientes.</h1>
                    </div>
                    <div class="page-header"> </div>
                    <!-- <table id="clients_table" class="table-striped table" ></table> -->
                    






 <div class="row-fluid">
                            <div class="row-fluid span12 thead" >
                                <div class="span2">
                                    
                                </div>
                                <div class="span3">
                                    <h3>Informacion Personal</h3>
                                </div>
                                <div class="span5">
                                   <h3></h3>
                                </div>
                                <div class="span2" >
                                    <h3>Acciones</h3>
                                </div>
                            </div>
                            <style>
                                
                                .unseen {
                                    display:none;
                                }
                                .inactive {
                                    color: #878484;
                                }
                                .low  {
                                    background-color: #FFFFBB !important
                                }
                                .medium {
                                    background-color: #FFDEBB !important     
                                }
                                .high {
                                    background-color: #FFBBBB !important
                                }
                                td a {
                                    font-size: 20px;
                                }
                                ._checkbox {
                                    height:15px; 
                                    width:15px; 
                                    border: 1px solid #438eb9!important;
                                    margin:0 auto;
                                }
                                ._checkbox:hover {
                                    background: #e4e4e4!important;
                                }
                                ._checkbox_checked {
                                    background: #438eb9!important;
                                }
                                .wrapper .item_div:nth-of-type(even)
                                {
                                    background:rgb(238, 238, 238)
                                }
                                .wrapper .item_div:nth-of-type(even)
                                {
                                    background:#f9f9f9
                                }
                                .thead
                                {
                                    
                                    background: #438eb9!important;
                                    color: white!important;
                                }
                            </style>
                            <section class="wrapper" style="margin-bottom: 30px;" >
                                <?php foreach ($pac as $k => $p) { 
                                    ?>
                                    <div class="row-fluid item_div">
                                        <div class="actions_checkbox span2" style="width:163px" >
                                            <img style="width: 100%; padding: 4px" src="<?=base_url()?>profilepicture/<?=$p->imagen_perfil?>" class="" />
                                        </div>
                                        <div class="span7">
                                            <div class='pattern' data-id="<?=$k?>" id="last_name_<?=$k?>" style="margin-top:10px" >
                                                <h1 style="font-size: 40px;"><?=$p->nombre //." (".$p->message.")"?>&nbsp;<?=$p->apellido?></h1>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="actions span2" style="padding:10px" >
                                            
                                                    <a class="" title="Editar Paciente" style="text-decoration:none; color: #55B235; font-size: 30px;" href="<?=base_url()?>index.php/pacientes/showProfile/<?=$p->idPaciente?>">
                                                        <i class="icon-user"></i>
                                                    </a>                                               
                                                    

                                                    <a href="#eliminarPaciente" style="text-decoration:none; color: #B64444; font-size: 30px;" id="<?=$p->idPaciente?>" class="eliminar" role="button" data-toggle="modal">
                                                        <i class="icon-trash"></i>
                                                    </a>

                                                    <a href="http://e-siat.net/siat/index.php/turnos/listaTurnosPaciente/<?=$p->idPaciente?>" style="text-decoration:none; color: #B64444; font-size: 30px;" class="eliminar" role="button" data-toggle="modal">
                                                        <i class="icon-calendar"></i>
                                                    </a>
                                        </div>
                                    </div>
                                <?php } ?>
                        </section>                    
</div>









                    <div class="page-header" ></div>
                    <div style="">
                        <a href="<?=base_url()?>index.php/pacientes/crearPaciente" role="button" class="btn" data-toggle="modal">Agregar paciente</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <form id="deleteAction" action="#" method="POST">
        <div id="eliminarPaciente" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Eliminar Paciente</h3>
            </div>
            <div class="modal-body">
                <h5>¿Esta seguro que desea eliminar un paciente? Se perderan todos sus datos definitivamente.</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-danger">Eliminar</button>
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
        $(document).on("click", ".eliminar", function(){
                $("#deleteAction").attr("action", BASE_URL+"index.php/pacientes/eliminarPaciente/"+$(this).attr("id"));
        });
    });
    </script>
</html>