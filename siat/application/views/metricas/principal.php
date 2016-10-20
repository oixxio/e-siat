<html>
    
    <?php $this->load->view("commons/header"); ?>
    
	
	  
  <style type="text/css">
  header{
    width: 100%;
    height: 100px;
    margin-bottom: 10px;
  }
  .inline{
    display: inline-block;
  }
  #izquierda{
    width: 65%;       
  }
  #derecha{
    width: 34.3%;
    height: 700px;
    background-color: #F0F0F0;
    position: absolute;
  }
  #arriba{
    height: 300px;
    margin-bottom: 4px;
  }
  #numero{
    width: 50%;  
    height: 100%; 
    background-color: #F0F0F0;
    margin-right: -1px;
  }
  #torta{
    width: 49%;    
    height: 100%; 
    background-color: #F0F0F0;
  }
  #abajo{
    width: 99.4%;
    height: 396px;
    background-color: #F0F0F0;
  }
  #estrellas{
    float:  right;
  }
  #circulito{
    position: absolute;
    margin-top: 72px;
    margin-left: 13.6%;
    background-color: #44b5df;
    padding: 15px;
    border-radius: 32px;
    font-size: 13px;
    height: 38px;
    width: 38px;
  }
  #circulo{
    background-image: url(img/circulo.png);
     background-repeat: no-repeat;
     background-size: 100%;
     height: 100px;
    width: 6%;
    z-index: 1;
  }
  #nombreBarra{
    z-index: -1;
    width: 94%;
    height: 50px;
    position: absolute;
    margin-top: 25px;
    margin-left: -20px;
    background: #ffffff; /* Old browsers */
    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZmZmZmZmIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2YyZjJmMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
    background: -moz-linear-gradient(top,  #ffffff 0%, #ffffff 0%, #f2f2f2 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(0%,#ffffff), color-stop(100%,#f2f2f2)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* IE10+ */
    background: linear-gradient(to bottom,  #ffffff 0%,#ffffff 0%,#f2f2f2 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 ); /* IE6-8 */
    -webkit-box-shadow:  0px 0px 5px -2px #767575;
        
        box-shadow:  0px 0px 5px -2px #767575;
  }
  #nombre, #estrellas{
    margin-top: 15px; margin-left: 33px;
  }
  #footerTorta{
    background-image: url(img/footerTorta.png);
    background-repeat: no-repeat;
    background-size: 100%;
    height: 75px;
    width: 100%;
  }
  #footerNumero{
    background-color: #44b5df;
    height: 75px;
    width: 100%;
  }
  #headNumero{
    width: 100%;
    height: 225px;
  }
  #cuadro1{
    width: 50%;
    height: 100%;
  }
  #cuadro2{
    height: 100%;
    width: 49%
  }
  .corazonCruz{
    margin-left: 4%;
    height: 100%;
    width: 26%;
  }
  .profilaxisDemanda{
    height: 100%;
    width: 68%;
  }
  .numeros{
    width: 100%;
    height: 40px;
  }
  .letras{
    width: 100%;
    height: 35px;
  }
  @media screen and (max-width:1400px){  
    #circulo{   
     width: 7%;        
    }
    #nombreBarra{
      width: 93%;
    }
  }
  @media screen and (max-width:1200px){  
    #circulo{   
     width: 8%;   
    }
    #nombreBarra{
      width: 92%;
    }
  }
  @media screen and (max-width:1050px){  
    #circulo{   
     width: 9%;   
    }
    #nombreBarra{
      width: 91%;
    }
  }
  @media screen and (max-width:940px){  
    #circulo{   
     width: 11%;   
    }
    #nombreBarra{
      width: 89%;
    }
  }
  @media screen and (max-width:820px){  
    #circulo{   
     width: 11%;   
    }
    #nombreBarra{
      width: 89%;
    }
  }
  @media screen and (max-width:720px){  
    #circulo{   
     width: 12%;   
    }
    #nombreBarra{
      width: 88%;
    }
  }
  @media screen and (max-width:680px){  
    #circulo{   
     width: 15%;   
    }
    #nombreBarra{
      width: 85%;
    }
  }
  @media screen and (max-width:500px){  
    #circulo{   
     width: 19%;   
    }
    #nombreBarra{
      width: 80%;
    }
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
			<div class="span9" style="margin-top:5%">
				<h2>Metricas</h2>
				<div class="header" ></div>
				
				<div class="row-fluid" >
					<div class="span6" >
						<span>
							<h1 style='font-size:80px; margin:0px' >102</h1>
						<span>
						<span>	
							<h4>APLICACIONES</h4>
						</span>						
					</div>
					<div class="span6" >
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
    <style>
        th {
            text-align: left; padding:15px
        }
    </style>
</html>