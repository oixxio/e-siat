
         <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li <?php echo ($this->uri->segment(1) == "principal" ) ? "class='active'" : ""; ?> ><a href="<?=base_url()?>index.php/principal/index">Videos</a></li>
                <li <?php echo ($this->uri->segment(1) == "principalPdf" ) ? "class='active'" : ""; ?> ><a href="<?=base_url()?>index.php/principalPdf/index">Manuales de Paciente</a></li>
                <li <?php echo ($this->uri->segment(1) == "principalTest" ) ? "class='active'" : ""; ?> ><a href="<?=base_url()?>index.php/principalTest/index">Auto test de Evaluación</a></li>
                <li id="foro"><a href="#">Foro</a></li>
             </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
        
