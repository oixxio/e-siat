<html>
    
    <?php $this->load->view("commons/header"); ?>
    
    <body>
        <div style="height: 50px">
            <?php $this->load->view("commons/navbar"); ?>
        </div>
        <div class="row-fluid">
            <div class="span2">
                <?php $this->load->view("commons/lateral"); ?>
            </div>
            <div style="margin-top: 5%" class="span9">
                <table id="clients_table" class="table-striped table" ></table>
                <div style="margin-top: 50px">
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
        $(document).ready(function(){
            $("body").on('click', '.eliminar', function(){
                $("#delForm").attr("action", "<?=base_url()?>index.php/pacientes/delPaciente/"+$(this).attr("id"));
            });
            $("body").on('click', '.editar', function(){
                $("#editarForm").attr("action", "<?=base_url()?>index.php/pacientes/editPaciente/"+$(this).attr("id"));
                $.ajax({
                    url : "<?=base_url()?>index.php/pacientes/getJsonFromId/"+$(this).attr("id"),
                    method : "POST",
                    success : function(response){
                        response = $.parseJSON(response);
                        $("#name").val(response.nombre);
                        $("#surname").val(response.apellido);
                        $("#dni").val(response.documento);
                    }
                });
            });
        });
    </script>

</html>
