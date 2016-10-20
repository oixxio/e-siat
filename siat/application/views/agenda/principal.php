<html>
    
    <?php $this->load->view("commons/header"); ?>
    <body>
        <div style="height: 5%">
            <?php $this->load->view("commons/navbar"); ?>
        </div>
        <div class="row-fluid">
            <div class="span2">
                <?php $this->load->view("commons/lateral"); ?>
            </div>
            <div class="span8" style="margin-top: 5%">
                <table id="clients_table" class="table-striped table" ></table>
                <div style="margin-top:50px">
                    <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
                </div>
            </div>
        </div>
    </body>
    
    
    
 
    
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div>
    
    <?php
        foreach($scripts as $script){ ?>
            <script src="<?=$script?>"></script>    
    <?php
        }
    ?>

</html>
