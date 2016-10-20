<html>

    <?php $this->load->view("commons/header"); ?>
    <style>
        h2{
            font-size: 18px;
        }
        li {
            line-height: 25px;
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
            <div style="margin-top: 10px; margin-bottom: 20px;" class="span9">
                <?php $this->load->view("commons/headerPlataforma"); ?>
                <div class="row-fluid">
                    <div class="span6">
                        <h2>Hemophilia Joint Health Score 2.1</h2>
                        <iframe src="<?= base_url() ?>/archivos/pdf/hjhs_2.1_addendums_2013.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>   
                    </div>
                    <div class="span6">
                        <h2>Manual de instrucciones</h2>
                        <iframe src="<?= base_url() ?>/archivos/pdf/european_spanish_-_hjhs_2.1_instruction_manual_rev.2013.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>   

                    </div>

                </div>
                <div class="row-fluid">
                    <div class="span10">
                        <h2>Puntuación Salud Articular</h2>
                        <iframe src="<?= base_url() ?>/archivos/pdf/european_spanish_-_hjhs_2.1_score_sheet_rev.feb2013.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>   
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span10">
                        <h2>Puntuación Salud Articular</h2>
                        <iframe src="<?= base_url() ?>/archivos/pdf/european_spanish_-_hjhs_2.1_worksheets_rev.feb2013.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>   

                    </div>

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
    <script>
        $("#manual").addClass("active");
        $("#video").removeClass("active");
        $("#autotest").removeClass("active");
        $("#foro").removeClass("active");
      
     
    </script>
</html>