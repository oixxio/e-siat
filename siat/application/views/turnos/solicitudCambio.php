<html>
    
    <?php $this->load->view("commons/header"); ?>
    
    <body>
        <?php $this->load->view("commons/navbar"); ?>
        <div class='container-fluid' style='padding:0px'>
            <a id="menu-toggler" href="#">
                    <span></span>
            </a>
            <?php $this->load->view("commons/lateral"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                </div>
            </div>
        </div>
    </body>
    
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

</html>