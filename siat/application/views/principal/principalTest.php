<html>

    <?php $this->load->view("commons/header"); ?>
    <style>
        h2{
            font-size: 18px;
        }
        li {
            line-height: 25px;
        }       
        .pregunta{
            margin-bottom: 20px;
        }
        .input-mini {
            width: 38px;
        }
    </style>

    <body>
        <div style="height: 50px">
            <?php $this->load->view("commons/navbar"); ?>
        </div>
        <div class="row-fluid">
            <div class="span2">
                <?php $this->load->view("commons/lateral"); ?>
            </div>
            <div style="margin-top: 10px" class="span9">
                <?php $this->load->view("commons/headerPlataforma"); ?>
            </div>

        </div>


    </body> 
    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>
    <script>
        $("#manual").removeClass("active");
        $("#video").removeClass("active");
        $("#autotest").addClass("active");
        $("#foro").removeClass("active");


    </script>

</html>