
<html>

    <?php $this->load->view("commons/header"); ?>

    <style type="text/css">
        *{
            font-family: "VAGRoundedStdThin";
        }
        @font-face{
            font-family: "VAGRoundedStdThin";
            src: url('font/VAGRoundedStdThin.otf'), url('font/VAGRoundedStdThin.ttf'); /* IE9 */
        }
        p{
            margin: 0;
        }
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
            width: 99.4%;
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
            float: right;
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
            color: white;
        }
        #circulo{
            background-image: url(<?= base_url() ?>assets/img/circulo.png);
            background-repeat: no-repeat;
            background-size: 100%;
            height: 100px;
            line-height: 100px;
            width: 100px;
            z-index: 1;
            text-align: center;
            color: white;
            font-size: 2.5em;
        }
        #nombreBarra{
            z-index: -1;
            width: 93%;
            height: 50px;
            line-height: 50px;
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
            margin-left: 33px;
            font-size: 1.6em;
        }
        #footerTorta{
            background-color: #44b5df;
            background-image: url(<?= base_url() ?>assets/img/footerTorta.png);
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
            text-align: center;
        }
        #cuadro1{
            width: 50%;
            height: 100%;
        }
        #cuadro2{
            height: 100%;
            width: 49%;
            float: right;
        }
        .corazonCruz{
            margin-left: 4%;
            height: 100%;
            width: 26%;
        }
        .profilaxisDemanda{
            height: 100%;
            width: 68%;
            float: right;
        }
        .numeros{
            width: 100%;
            height: 45px;
            text-align: center;
            line-height: 45px;
            font-size: 2em;
        }
        .letras{
            width: 100%;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: white;
            font-size: 1.5em;
        }
        #nroApp{
            height: 140px;
            font-size: 8em;
            padding-top: 20px;
        }
        #letrasApp{
            height: 40px;
            sfont-size: 2em;
        }

        @media screen and (max-width:1400px){  
            #nombreBarra{
                width: 92%;
            }
        }
        @media screen and (max-width:1200px){  
            #nombreBarra{
                width: 91%;
            }
        }
        @media screen and (max-width:1050px){  
            #nombreBarra{
                width: 90%;
            }
        }
        @media screen and (max-width:940px){  
            #nombreBarra{
                width: 88%;
            }
        }
        @media screen and (max-width:820px){  
            #nombreBarra{
                width: 87%;
            }
        }
        @media screen and (max-width:720px){  
            #nombreBarra{
                width: 86%;
            }
        }
        @media screen and (max-width:680px){  
            #nombreBarra{
                width: 84%;
            }
        }
        @media screen and (max-width:550px){  
            #nombreBarra{
                width: 82%;
            }
        }
    </style>

    <body>
        <?php $this->load->view("commons/navbarPaciente"); ?>
        <div class='container-fluid' id="main-container" style='padding:0px'>
            <a id="menu-toggler" href="#">
                <span></span>
            </a>
            <?php $this->load->view("commons/lateralPaciente"); ?>
            <div  id='main-content' class='clearfix'>
                <div id='page-content' class='clearfix'>
                    <div class="row-fluid">
                        <div class="span2">
                            <div style="width:100%;">
                             <ul class="ace-thumbnails" style="width:100%;">
                               <li style="width:100%;">
                                 <div style="width:100%;">
                                    <img class="img-polaroid" src="<?= base_url() . "profilepicture/" . $info->imagen_perfil ?>" />
                                    <div class="text">
                                     <div class="inner">
                                        <span>Cambiar imagen</span>
                                        <br>
                                        <a href="#cambiarImagen" data-toggle="modal">
                                           <i class="icon-picture"></i>
                                       </a>
                                   </div>
                               </div>
                           </div> </li></ul></div>
                            
                        </div>
                        <div class="span4">
                            <h1><?= $info->nombre . " " . $info->apellido ?></h1>
                            <h4><?= $info->direccion . ", " . $info->ciudad . ", " . $info->estado ?></h4>
                            <h4><?= $info->telefono ?></h4>
                        </div>
                    </div>
                    <div class="page-header"> </div>
                    <?php if ($state == "2") { ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Error: </strong>Ha ocurrido un error al ejecutar la consulta. Intente nuevamente.
                        </div>
                    <?php } else if ($state == "1") { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Completado: </strong>Operacion completada correctamente.
                        </div>
                    <?php } ?>
                    <div class="tabbable tabs-stacked">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#A" data-toggle="tab">Perfil</a></li>
                            <li class=""><a href="#B" data-toggle="tab">Historia Clinica</a></li>
                            <li class=""><a href="#C" data-toggle="tab">Tratamiento</a></li>
                            <li class=""><a href="#D" data-toggle="tab">Receta</a></li>
                            <li class=""><a href="#E" data-toggle="tab">Foja</a></li>
                            <li class=""><a href="#F" data-toggle="tab">Test Adherencia</a></li>
                            <li class=""><a href="#G" data-toggle="tab">Score Clinico</a></li>
                            <li class=""><a href="#H" data-toggle="tab">Metricas</a></li>
                        </ul>
                        <div class="tab-content" style="margin-bottom: 50px">
                            <div class="tab-pane active" id="A">
                                <div class="row-fluid">
                                    <div class="span14">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Telefono personal: " . $info->telefono_personal ?></h4>
                                            </div>
                                            <div class="span6">
                                                <h4><?= "Telefono hogar: " . $info->telefono_casa ?></h4>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Telefono oficina: " . $info->telefono_oficina ?></h4>
                                            </div>
                                            <div class="span6">
                                                <h4><?= "Genero: " . $info->genero ?></h4>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Lugar nacimiento: " . $info->lugar_nacimiento ?></h4>
                                            </div>
                                            <div class="span6">
                                                <h4><?= "Fecha nacimiento: " . $info->fecha_nacimiento ?></h4>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Titulo: " . $info->titulo ?></h4>
                                            </div>
                                            <div class="span6">
                                                <h4><?= "Codigo postal: " . $info->codigo_postal ?></h4>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Nro. seguridad social: " . $info->nro_seguridad_social ?></h4>
                                            </div>
                                            <div class="span6">
                                                <h4><?= "Edad: " . $info->edad ?></h4>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4><?= "Correo electronico: " . $info->correo_electronico ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="B">
                                <?php if (sizeof($files) > 0) { ?>
                                    <div class="row-fluid" >
                                        <div class="tabbable tabs-left">
                                            <ul class="nav nav-tabs">
                                                <?php for ($i = 1; $i < sizeof($files) + 1; $i++) { ?>
                                                    <li <?= ($i == 1) ? "class='active'" : "" ?> ><a href="#A<?= $i ?>" data-toggle="tab">Archivo <?= $i ?></a></li>
                                                <?php } ?>
                                            </ul>
                                            <div class="tab-content">
                                                <?php for ($i = 1; $i < sizeof($files) + 1; $i++) { ?>
                                                    <div  class="<?= ($i == 1) ? "active " : "" ?> tab-pane" id="A<?= $i ?>">
                                                        <div class="row-fluid">
                                                            <div class="span10 offset1" >
                                                                <a class="btn btn-primary pull-right" role="button" data-toggle="modal">
                                                                    <i class="icon-arrow-down  bigger-110 icon-only"></i>
                                                                </a>
                                                                <a class="btn btn-warning pull-right" role="button" data-toggle="modal">
                                                                    <i class="icon-refresh  bigger-110 icon-only"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="page-header" ></div>
                                                        <div class="row-fluid span10 offset1">
                                                            <div class="span12">
                                                                <iframe src="<?= base_url() . "uploads/" . $files[$i - 1]->url ?>" style="width:100%; height: 800px" frameborder="0" ></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-header" ></div>
                                <?php } ?>
                                <div class="page-header"></div>
                                <?php foreach ($historial as $h) { ?>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <h3><?= $h->fecha ?></h3>
                                        </div>
                                        <div class="span10">
                                            <h5><?= $h->observacion ?></h5>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="C">
                                <div class="row-fluid">
                                    <div class="span11">
                                        <h4><?= $tratamiento['detalle'] ?> - Desde: <?= $tratamiento['fechaInicio'] ?></h4>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <h4>Dosis aplicadas cada <?= $tratamiento['intervalo'] ?> Hs</h4>
                                    </div>
                                </div>
                                <div class="page-header"> </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <table style="width:100%" id="table_dosis">
                                            <thead>
                                            <th>Fecha Prevista</th>
                                            <th>Fecha Real</th>
                                            <th>Cantidad</th>
                                            <th>Tipo</th>
                                            <th>Aplicada</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tratamiento['dosis'] as $dosis) { ?>
                                                    <tr>
                                                        <td>
                                                            <?= $dosis->fechaHoraPrevisto ?>
                                                        </td>
                                                        <td>
                                                            <?= $dosis->aplicada != 0 ? $dosis->fechaHoraReal : "" ?>
                                                        </td>
                                                        <td>
                                                            <?= $dosis->cantidad ?>
                                                        </td>
                                                        <td>
                                                            <?= $dosis->tipo == 1 ? "profilaxis" : "demanda" ?>
                                                        </td>
                                                        <td>
                                                            <?= $dosis->aplicada != 0 ? "Aplicada" : "Sin aplicar" ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="D">
                                <div class="row-fluid">
                                    <table class="table-striped span12">
                                        <thead>
                                        <th>
                                            Descripcion
                                        </th>
                                        <th>
                                            Cantidad Solicitada
                                        </th>
                                        <th>
                                            Fecha Solicitud
                                        </th>
                                        <th>
                                            Entregada
                                        </th>
                                        <th>
                                            Fecha Entregada
                                        </th>
                                        <th>
                                            Cantidad Entregada
                                        </th>
                                        <th>
                                            Recibida
                                        </th>
                                        <th>
                                            Fecha recibida
                                        </th>
                                        <th>
                                            Cantidad recibida
                                        </th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($prescripciones as $p) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $p->descripcion ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->cantidad ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->fechaRecetada ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->entregada == 1 ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>" ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->fechaEntregada == 0 ? "-" : $p->fechaEntregada ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->cantidadEntregada == 0 ? "-" : $p->cantidadEntregada ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->recibido == 1 ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>" ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->fechaRecibido == 0 ? "-" : $p->fechaRecibido ?>
                                                    </td>
                                                    <td>
                                                        <?= $p->cantidadRecibida == 0 ? "-" : $p->cantidadRecibida ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-header"></div>
                            </div>
                            <div class="tab-pane printable" id="E" style='overflow:hidden' >
                                <div class="row-fluid">
                                    <div style='cursor:pointer; position:absolute; margin-left: 94%' id='print'>
                                        <i class='icon-print icon-3x'> </i>
                                    </div>
                                    <div class="span12">
                                        <h2 style="text-align: center">JUSTIFICACION USO FACTOR ANTIHEMOFILICO</h2>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <h4>Paciente: <?= $info->nombre . ", " . $info->apellido ?></h4>
                                    </div>
                                    <div class="span5">
                                        <h4>OS: Union Trabajadora</h4>
                                    </div>
                                    <div class="span3">
                                        <h4>Nº: 7-511515/5</h4>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span9">
                                        <h4>Diagnostico: <?= $tratamiento['detalle'] ?></h4>
                                    </div>
                                    <div class="span3">
                                        <h4>Mes tratamiento: <?php ?> 5</h4>
                                    </div>
                                </div>
                                <div class="page-header"></div>
                                <div class="row-fluid">
                                    <table class="span12 table">
                                        <thead >
                                        <th >
                                            Fecha
                                        </th>
                                        <th >
                                            Cantidad
                                        </th>
                                        <th >
                                            Marca
                                        </th>
                                        <th >
                                            Lote
                                        </th>
                                        <th >
                                            Motivo de Uso
                                        </th>
                                        <th >
                                            Firma
                                        </th>
                                        </thead>

                                        <?php
                                        foreach ($tratamiento['dosis'] as $dosis) {
                                            if ($dosis->aplicada == 1) {
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?= $dosis->fechaHoraReal ?>
                                                    </td>
                                                    <td>
                                                        <?= $dosis->cantidad ?>
                                                    </td>
                                                    <td>
                                                        Marca
                                                    </td>
                                                    <td>
                                                        Lote
                                                    </td>
                                                    <td>
                                                        <?= $dosis->tipo == 1 ? "profilaxis" : "demanda" ?>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane printable" id="F" style='overflow:hidden' > 
                                    <div>
                                        <div >
                                            <h3 id="myModalLabel">CUESTIONARIO ADHERENCIA SMAQ
                                                <?php if(isset($adherencia->id)){ ?>
                                                &nbsp;(<?=$adherencia->fecha ?>)
                                                <?php } ?>
                                            </h3>
                                        </div>
                                        <div class="page-header"></div>
                                        <?php if(!isset($adherencia->id)){ ?>
                                        <div > 
                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta1">Alguna vez ¿Olvida administrase la medicación?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input type="radio"  name="respuesta1" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input type="radio" name="respuesta1" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta2">Se administra siempre la medicación a la hora indicada?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta2" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta2" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta3">Alguna vez ¿deja de administrase la medicación si se siente mal?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta3" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta3" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta4">En el último mes ¿cuántas veces no se administró alguna dosis?</label>
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <input  type="radio" name="respuesta4" value="1">Ninguna 
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta4" value="2">1-2 
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta4" value="3">3-5
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta4" value="4">6-10
                                                    </div>
                                                    <div class="span2">
                                                        <input  type="radio" name="respuesta4" value="5">más de 10
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta5">En los últimos 3 meses ¿cuántos días no se administrase la medicación?</label>
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <input  type="radio" name="respuesta5" value="1">Ninguna 
                                                    </div>
                                                    <div class="span1">
                                                        <input type="radio" name="respuesta5" value="2">1-4
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta5" value="3">5-8
                                                    </div>
                                                    <div class="span1">
                                                        <input  type="radio" name="respuesta5" value="4">9-15
                                                    </div>
                                                    <div class="span2">
                                                        <input  type="radio" name="respuesta5" value="5">más de 15
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <div > 
                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta1">Alguna vez ¿Olvida administrase la medicación?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_1 == 1 ? "checked" : "" ?> type="radio"  name="respuesta1" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_1 == 2 ? "checked" : "" ?> type="radio" name="respuesta1" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta2">Se administra siempre la medicación a la hora indicada?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_2 == 1 ? "checked" : "" ?> type="radio" name="respuesta2" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_2 == 2 ? "checked" : "" ?> type="radio" name="respuesta2" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta3">Alguna vez ¿deja de administrase la medicación si se siente mal?</label>
                                                <div class="row-fluid">
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_3 == 1 ? "checked" : "" ?> type="radio" name="respuesta3" value="1">Si <br>
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_3 == 2 ? "checked" : "" ?> type="radio" name="respuesta3" value="2">No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta4">En el último mes ¿cuántas veces no se administró alguna dosis?</label>
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <input <?=$adherencia->pregunta_4 == 1 ? "checked" : "" ?> type="radio" name="respuesta4" value="1">Ninguna 
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_4 == 2 ? "checked" : "" ?> type="radio" name="respuesta4" value="2">1-2 
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_4 == 3 ? "checked" : "" ?> type="radio" name="respuesta4" value="3">3-5
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_4 == 4 ? "checked" : "" ?> type="radio" name="respuesta4" value="4">6-10
                                                    </div>
                                                    <div class="span2">
                                                        <input <?=$adherencia->pregunta_4 == 5 ? "checked" : "" ?> type="radio" name="respuesta4" value="5">más de 10
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page-header"></div>

                                            <div class="pregunta">
                                                <label class="control-label" for="respuesta5">En los últimos 3 meses ¿cuántos días no se administrase la medicación?</label>
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <input <?=$adherencia->pregunta_5 == 1 ? "checked" : "" ?> type="radio" name="respuesta5" value="1">Ninguna 
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_5 == 2 ? "checked" : "" ?> type="radio" name="respuesta5" value="2">1-4
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_5 == 3 ? "checked" : "" ?> type="radio" name="respuesta5" value="3">5-8
                                                    </div>
                                                    <div class="span1">
                                                        <input <?=$adherencia->pregunta_5 == 4 ? "checked" : "" ?> type="radio" name="respuesta5" value="4">9-15
                                                    </div>
                                                    <div class="span2">
                                                        <input <?=$adherencia->pregunta_5 == 5 ? "checked" : "" ?> type="radio" name="respuesta5" value="5">más de 15
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="page-header"></div>
                                    </div>
                            </div>
                            <div class="tab-pane" id="G">
                                <form action="<?=base_url()?>index.php/pacientes/cargarScoreClinico/<?=$idPaciente?>" method="POST" >
                                    <div >
                                        <div class="row-fluid">

                                            <h3 class="span10">Puntuacion de salud articular en hemofilia 2.0 &nbsp; <?=$scoreResult != false ? "(".$scoreResult['score']->fecha.")" : ""?> </h3>
                                            <h5 class="pull-right span2" id="promedio" >Puntuacion Promedio: </h5>
                                        </div>
                                        <div class="page-header" ></div>
                                        
                                            <table id="test1" class="table">
                                                <thead>
                                                    <th>

                                                    </th>
                                                    <th>
                                                        Codo Izquierdo
                                                    </th>
                                                    <th>
                                                        Codo Derecho
                                                    </th>
                                                    <th>
                                                        Rodilla Izquierda
                                                    </th>
                                                    <th>
                                                        Rodilla Derecha
                                                    </th>
                                                    <th>
                                                        Tobillo Izquierdo
                                                    </th>
                                                    <th>
                                                        Tobillo Derecho
                                                    </th>
                                                </thead>

                                                <tbody>
                                                <?php 

                                                $row = Array();

                                                foreach($score as $s){ ?>
                                                    <tr>
                                                         <td>
                                                             <?=$s['descripcion']?>
                                                         </td>
                                                         <?php for($i=0 ; $i < 6; $i++) {
                                                            $ne = true;
                                                            $options = "";
                                                          ?>
                                                         <td>
                                                            <div style="width:100%">
                                                                <div style="width:50%; float:left; margin-right:5%">
                                                                    <?php   foreach($s['parametros'] as $k => $p) {
                                                                                if($scoreResult != false && $scoreResult[$i+1][$s['id']]->valor==$p->value) $ne = false; 
                                                                                
                                                                                if($scoreResult != false && $scoreResult[$i+1][$s['id']]->valor==$p->value){
                                                                                    $row[$i] = (isset($row[$i]) ? $row[$i] : 0) + $p->value;
                                                                                    $options .= "<h5 ". ($scoreResult != false ? ($scoreResult[$i+1][$s['id']]->valor==$p->value ? " selected " : '') : '')." value='".($p->value)."'>".$p->descripcion." </h5>";
                                                                                }
                                                                                
                                                                            }
                                                                    ?>
                                                                
                                                                    <?=$options?>
                                                                    <?=$scoreResult != false && $ne ? "<option value='NE' selected>NE</select>" : "" ?>
                                                                
                                                                </div>
                                                                <div style="width:45%; float: left">
                                                                    <input disabled="" class="checkNE" <?= $scoreResult != false && $ne ? "checked" : "" ?> type="checkbox" style="float:left"/>
                                                                    <h5 style="float:left">NE</h5>
                                                                </div>
                                                                <div style="clear:both">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td>
                                                        Total de articulaciones
                                                    </td>
                                                    <td class="total" id="row-1">
                                                        <?= isset($row[0]) ? $row[0] : 0 ?>
                                                    </td>
                                                    <td class="total" id=""row-2>
                                                        <?= isset($row[1]) ? $row[1] : 0 ?>
                                                    </td>
                                                    <td class="total" id="row-3">
                                                        <?= isset($row[2]) ? $row[2] : 0 ?>
                                                    </td>
                                                    <td class="total" id="row-4">
                                                        <?= isset($row[3]) ? $row[3] : 0 ?>
                                                    </td>
                                                    <td class="total" id="row-5">
                                                        <?= isset($row[4]) ? $row[4] : 0 ?>
                                                    </td>
                                                    <td class="total" id="row-6">
                                                        <?= isset($row[5]) ? $row[5] : 0 ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <div class="page-header" ></div>
                                </div>
                            </form>
							</div>
                            <div class="tab-pane" id="H" style='overflow:hidden'>
                                <script>
                                    <?php
                                    echo "var datosVisit= [";

                                    $cont = 0;

                                    foreach ($metricas['dosis'] as $metrica) {
                                        echo (($cont != 0) ? "," : "" ) . "{ x : new Date('" . $metrica->fechaHoraReal . "') , y : " . abs($metrica->diff) . " }";
                                        $cont++;
                                    }

                                    echo "];";
                                    ?>
                                </script>

                                <script>
                                    <?php
                                    echo "var datosVisit2= [";

                                    $cont = 0;

                                    foreach ($metricas['dosis'] as $metrica) {
                                        echo (($cont != 0) ? "," : "" ) . "{ x : new Date('" . $metrica->fechaHoraReal . "') , y : " . abs($metrica->diff2) . " }";
                                        $cont++;
                                    }

                                    echo "];";
                                    ?>

                                </script>
                                <div id="loader-screen" style="width:98%; height:98%; position: absolute; background: white; z-index: 100">
                                        <div style="width: 200px; height: 60px; margin: 25% auto">
                                            <img src="<?=base_url()?>assets/images/ajax-loader.gif"  style="width:40px; height:40px; margin-left: 79px; margin-bottom: 5px" />
                                            <h5 style="text-align:center; font-size: 10px; color: #777" >Cargando</h5>
                                        </div>
                                </div>
                                <div class="row-fluid" style="width:98%">
                                    <h1 class="span5 pull-left" >Dashboard de Metricas</h1>
                                    <button class="span1 btn btn-default pull-right" id="printButton" ><i class="icon-print"></i></button>
                                </div>
                                <div class="page-header"></div>
                                <div class="row-fluid" id="model-vertical-rectangle">
                                    <div class="span7" id="dashboard">
                                        <div class="row-fluid" >
                                            <div class="span6 square model" style="background:#e4e4e4">
                                                <div style="padding-top: 35%; width:100%; height:45%">
                                                    <h1 style="text-align:center; font-size:15em" ><?=$metricas['total']?></h1>
                                                </div>
                                                <div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
                                                    <div class="span6" style="text-align:center" >
                                                        <h3 style="color:white" > &nbsp;&nbsp;&nbsp; Profilaxis - <?=$metricas['profilaxis']?></h3>
                                                    </div>
                                                    <div class="span6" >
                                                        <h3 style="color:white" > &nbsp;&nbsp;&nbsp; Demanda - <?=$metricas['demanda']?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6 square" style="background:#e4e4e4">
                                                <div style="width:100%; height:80%">
                                                    <div id="chartContainerTorta" style='height: 100%; width:100%'>
                                                    </div>
                                                </div>
                                                <div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
                                                    <h1 style="text-align:center; color:white;">Metricas</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="span4 square" style="background:#e4e4e4; display:none">
                                            <div style="padding-top: 35%; width:100%; height:45%">
                                                <h1 style="text-align:center; font-size:15em" ><?=$metricas['profilaxis']?></h1>
                                            </div>
                                            <div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
                                                <h1 style="text-align:center; color:white; font-size:2em">A demanda</h1>
                                            </div>
                                        </div>
                                        <div class="span4 square" style="background:#e4e4e4; display: none">
                                            <div style="padding-top: 35%; width:100%; height:45%">
                                                <h1 style="text-align:center; font-size:15em" ><?=$metricas['demanda']?></h1>
                                            </div>
                                            <div style="width:100%; height:15%; padding-top:5%; background: #44b5df">
                                                <h1 style="text-align:center; color:white; font-size:2em">Profilaxis</h1>
                                            </div>
                                        </div>-->
                                        <div class="row-fluid" style="margin-top:2%">
                                            <div class="span6 square model" style="background:#e4e4e4">
                                                <div style="padding-top: 35%; width:100%; height:45%">
                                                    <h1 style="text-align:center; font-size:15em" >0</h1>
                                                </div>
                                                <div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
                                                    <div class="span12" style="text-align:center" >
                                                        <h3 style="color:white" > Dosis Omitidas en Profilaxis</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6 square model" style="background:#e4e4e4">
                                                <div style="padding-top: 35%; width:100%; height:45%">
                                                    <h1 style="text-align:center; font-size:15em" ><?=$metricas['maxDesvio']    ?> <small>Hs</small></h1>
                                                </div>
                                                <div style="width:100%; height:15%; padding-top:5%; background: #44b5df;" class="row-fluid">
                                                    <div class="span12" style="text-align:center" >
                                                        <h3 style="color:white" > Desvio Maximo Mensual</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="articulaciones" class="row-fluid span5 vertical-rectangle" style="height:100%">
                                        <div style="height:100%; border-radius: 10px 10px 0px 0px; background: #42a5cb" >
                                            <div class="row-fluid" style="height:9%">
                                                <div class="span6" style="border-radius: 10px 0px 0px 0px; background: #52b4d8; height:100%" ></div>
                                                <div class="span6" style="border-radius: 0px 10px 0px 0px; height:100%" >
                                                    <h2 style="color:white; margin-top: 10%; text-align: center; font-family: thinfont">ARTICULACIONES</h2>
                                                </div>
                                            </div>
                                            <div style="height:91%" >
                                                <canvas width="534" height="682" id="canvas-man" style="width:100%; height:100%">
                                                </canvas>
                                            </div>
                                        </div>
                                        <!--<div style="height:35%">
                                        </div>-->
                                    </div>
                                </div>
                                <div class="row-fluid" style="margin-top:2%">
                                    <div class=" span12 rectangle" style="background:#e4e4e4" >
                                        <div style="width:100%; height:80%">
                                            <div id="chartContainerSpline" style='height: 100%; width: 100%'>
                                            </div>
                                        </div>
                                        <div style="width:100%; height:20%; background: #44b5df">
                                            <h1 style="text-align:center; color:white; font-size:2em">Metricas</h1>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  


    <form action="<?= base_url() ?>index.php/pacientes/nuevaReceta/<?= $idPaciente ?>" method="POST">
        <div id="nuevaReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Nueva Receta</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input class="input-xxlarge" type="text" name="cantidadUI" placeholder="Cantidad UI Ej: 5000" /> 
                </div>           
                <div>
                    <textarea style="height: 200px; resize: none" class="input-xxlarge" name="descripcion" placeholder="Descripcion"></textarea> 
                </div>
                <div >
                    <?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
                    <input style="width:50%" type="date" name="fecha"  value="<?= date('Y-m-d') ?>" />
                    <input style="width:49%" type="time" name="hora" value="<?= date('H:i') ?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-success">Crear</button>
            </div>
        </div>
    </form>

    <form action="<?= base_url() ?>index.php/turnosPaciente/eliminar" id="borrar" method="POST">
        <div id="borrado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Borrar archivo de Historial</h3>
            </div>
            <div class="modal-body">
                <div>
                    <h5>¿Esta segudo desea borrar el archivo? Se perderan sus datos para siempre.</h5>
                </div>               
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button>
                <button class="btn btn-danger">Si</button>
            </div>
        </div>
    </form>

    <form action="<?= base_url() ?>index.php/pacientes/reformularTratamiento/<?= $tratamiento['idTratamiento'] ?>/<?= $idPaciente ?>" id="reformular" method="POST">
        <div id="reformulado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Reformulado de Tratamiento</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid" >
                    <div class="span6">
                        <label>
                            <input value="horas" checked class="tipo_intervalo" id="horas" name="form-field-radio" type="radio">
                            Intervalo de horas
                        </label>
                    </div>
                    <div class="span6">
                        <label>
                            <input value="dias" class="tipo_intervalo" id="dias" name="form-field-radio" type="radio">
                            Dias
                        </label>
                    </div>
                </div>
                <div class="row-fluid containerr" id="horas_container">
                    <div class="span12">
                        <input placeholder="Intervalo en horas Ej: 16" type="input" name="horas" />
                    </div>
                </div>
                <div id="dias_container" class="containerr" style="display:none">
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="lunes" />
                            Lunes
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="martes" />
                            Martes
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="miercoles" />
                            Miercoles
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="jueves" />
                            Jueves
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="viernes" />
                            Viernes
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="sabado" />
                            Sabado
                        </div>
                    </div>
                    <div class="row-fluid" id="horas_containter">
                        <div >
                            <input type="checkbox" name="domingo" />
                            Domingo
                        </div>
                    </div>
                </div>
                <div >
                    <?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>
                    <input type="date" name="startingDay"  value="<?= date('Y-m-d') ?>" />
                    <input type="time" name="startingHour" value="<?= date('H:i') ?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <input type="submit" class="btn btn-success" value="aceptar">
            </div>
        </div>
    </form>

    <form id='recibida' action="<?= base_url() ?>index.php/perfilMedico/cambiarImagenPerfil/<?= $idPaciente; ?>" method="POST" enctype="multipart/form-data" >
            <div id="cambiarImagen" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Cambiar Imagen de Perfil</h3>
                </div>
                <div class="modal-body">
                    <input name="userfile" type="file" id="id-input-file-1" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </form>

    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>

    <script>
        $("#promedio").text("<?php echo 'Puntuacion Promedio: ' . (($row[1] + $row[2] + $row[3] + $row[4] +$row[5] +$row[0]) / 6) ?>");
    </script>

    <script>
        $(document).ready(function() {



            $(".tipo_intervalo").click(function() {
                $(".containerr").css("display", "none");
                $("#" + $(this).attr("id") + "_container").css("display", "block");
            });

            $(".borrar_button").click(function() {
                $("#borrar").attr("action", "<?= base_url() ?>index.php/pacientes/borrarArchivo/<?= $idPaciente ?>/" + $(this).data("id"));
            });

            $('#menu-toggler').on('click', function(e) {
                e.preventDefault();

                if (!$(this).hasClass("active")) {
                    console.log("click");
                    $("#sidebar").animate({"left": "0px"});
                    $(this).addClass("active");
                } else {
                    $("#sidebar").animate({"left": "-200px"});
                    $(this).removeClass("active");
                }

            });

            $("#table_dosis").dataTable({
            });

            $("#print").click(function() {
                $(this).css("display", "none");
                var mywindow = window.open('', 'my div', 'height=500,width=1000');
                mywindow.document.write('<html><head><title>my div</title>');
                mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css" />');
                mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace.min.css" type="text/css" />');
                mywindow.document.write('</head><body>');
                mywindow.document.write("<div style='width:80%; margin:2% auto'>" + $(".printable").html() + "</div>");
                mywindow.document.write('</body></html>');
                $(this).css("display", "block");
                mywindow.print();
                //mywindow.close();
            });

        });


        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainerSpline",
                    {
                        title: {
                            text: ""
                        },
                        axisY: {
                            title: "Dosis",
                            includeZero: false
                        },
                        toolTip: {
                            shared: "true"
                        },
                        data: [
                            {
                                type: "spline",
                                showInLegend: false,
                                name: "dosis",
                                markerSize: 0,
                                dataPoints: datosVisit
                            }
                        ]
                    });

            chart.render();

            var chart = new CanvasJS.Chart("chartContainerTorta",
                    {
                        title: {
                            text: ""
                        },
                        theme: "theme2",
                        data: [
                            {
                                type: "doughnut",
                                indexLabelFontFamily: "Garamond",
                                indexLabelFontSize: 20,
                                startAngle: 0,
                                indexLabelFontColor: "dimgrey",
                                indexLabelLineColor: "darkgrey",
                                toolTipContent: "{y} %",
                                dataPoints: [
                                    {y: <?= $metricas['retrasada'] > 0 ? ($metricas['retrasada']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : "0" ?>, label: "{y}%"},
                                    {y: <?= $metricas['atiempo'] > 0 ? ($metricas['atiempo']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : $metricas['atiempo'] ?>, label: "{y}%"}

                                ]
                            }
                        ]
                    });

            chart.render();

            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'icon-cloud-upload',
                droppable: true,
                thumbnail: 'small',
                before_change: function(files, dropped) {
                    /**
                     if(files instanceof Array || (!!window.FileList && files instanceof FileList)) {
                     //check each file and see if it is valid, if not return false or make a new array, add the valid files to it and return the array
                     //note: if files have not been dropped, this does not change the internal value of the file input element, as it is set by the browser, and further file uploading and handling should be done via ajax, etc, otherwise all selected files will be sent to server
                     //example:
                     var result = []
                     for(var i = 0; i < files.length; i++) {
                     var file = files[i];
                     if((/^image\//i).test(file.type) && file.size < 102400)
                     result.push(file);
                     }
                     return result;
                     }
                     */
                    return true;
                }
                ,
                before_remove: function() {
                    return true;
                }

            }).on('change', function() {
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });
        }


    </script>

<script>

    $(document).ready(function(){

        CanvasJS.addColorSet("modo",
                    [//colorSet Array

                    "red",
                    "green"
                    ]);

        $("a[href='#H']").click(function(){

            

            $("#articulaciones").css("height", $("#dashboard").css("height"));

            $("#loader-screen").css("display", "block");

            setTimeout(function(){


                function drawTextBox(x, y, ctx, color, cWidth, cHeight, cant){
                    ctx.fillStyle = color;
                      var pH = cHeight / 100 * 0.5;
                      var pW = cWidth / 100 * 0.6;
                      ctx.beginPath();
                      ctx.moveTo(x + 2 * pW, y);
                      ctx.lineTo(x + 12 * pW, y);
                      ctx.arc(x + 12 * pW, y + 5 * pH, 5 * pH, Math.PI * 1.5, Math.PI); 
                      ctx.lineTo(x + 12 * pW + 5 * pH, y + 5 * pH);
                      ctx.arc(x + 12 * pW, y + 10 * pH, 5 * pH, 0, Math.PI * 0.5); 
                      ctx.lineTo(x + 2 * pW , y + 15 * pH);
                      ctx.arc(x + 2 * pW, y + 10 * pH, 5 * pH, Math.PI * 0.5, Math.PI); 
                      ctx.lineTo(x - 10, y + 5 * pH);
                      ctx.arc(x + 2 * pW, y + 5 * pH, 5 * pH, Math.PI, Math.PI * 1.5); 
                      ctx.fill();
                      ctx.fillStyle = "white";
                      ctx.font="40px thinfont";
                      ctx.fillText(cant,x + 10,y + 38);
                }

                var c = document.getElementById("canvas-man");
                var cContext = c.getContext('2d');
                var source = new Image();
                source.src = "<?=base_url()?>assets/images/unhombrecito.png";
                console.log(c.width+" "+c.height);
                source.onload = function(){
                    console.log(c.width);
                    cContext.drawImage(source, 0.5, 0.5, c.width, c.height);
                    drawTextBox(c.width * 15 / 100, c.height * 25 / 100, cContext, "#e86a52", c.width, c.height, "0");
                    drawTextBox(c.width * 76 / 100, c.height * 25 / 100, cContext, "#e86a52", c.width, c.height, "0");
                    drawTextBox(c.width * 13 / 100, c.height * 40 / 100, cContext, "#e86a52", c.width, c.height, "0");
                    drawTextBox(c.width * 78 / 100, c.height * 40 / 100, cContext, "#e86a52", c.width, c.height, "0");
                    drawTextBox(c.width * 24 / 100, c.height * 70 / 100, cContext, "#e86a52", c.width, c.height, "0");
                    drawTextBox(c.width * 68 / 100, c.height * 70 / 100, cContext, "#e86a52", c.width, c.height, "0");
                }

                $(".square").each(function(){
                    $(this).css("height", $(this).css("width"));
                });
                $(".rectangle").each(function(){
                    $(this).css("height", (parseInt($(".model").width())) + "px" );
                });
                $(".vertical-rectangle").css({
                    "height" : $("#model-vertical-rectangle").css("height")
                });
                $("#chartContainerSpline").html("");
            $("#chartContainerTorta").html("");

            var chart = new CanvasJS.Chart("chartContainerSpline",
            {
                title: {
                    text: ""
                },
                axisY: {
                    title: "Minutos de Retraso",
                    includeZero: false
                },
                toolTip: {
                    shared: "true"
                },
                data: [
                {
                    type : "line",
                    lineThickness: 2,
                    showInLegend: true,
                    markerType: "square",
                    name: "Real",
                    markerSize: 0,
                    dataPoints: datosVisit
                },
                {
                    type : "line",
                    lineThickness: 2,
                    showInLegend: true,
                    markerType: "square",
                    name: "Previsto",
                    color: "red",
                    dataPoints: datosVisit2
                }]
            });

            chart.render();

            var chart = new CanvasJS.Chart("chartContainerTorta",
    {
        title: {
            text: ""
        },
        theme: "theme2",
        data: [
        {
            type: "doughnut",
            indexLabelFontFamily: "Garamond",
            indexLabelFontSize: 20,
            startAngle: 0,
            colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            indexLabelFontColor: "dimgrey",
            indexLabelLineColor: "darkgrey",
            toolTipContent: "{nombre}:&nbsp;{valor}",
            dataPoints: [
            {y: <?= $metricas['atiempo'] > 0 ? ($metricas['atiempo']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : $metricas['atiempo'] ?>, label: "", nombre: "A tiempo", valor: <?= $metricas['atiempo'] ?>},
            {y: <?= $metricas['retrasada'] > 0 ? ($metricas['retrasada']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : "0" ?>, label: "", nombre : "Retrasadas", valor: <?= $metricas['retrasada'] ?>}
            ]
        }
        ]
    });

    chart.render();

                $("#loader-screen").css("display", "none");
            }, 1500);

            

        });

$( window ).resize(function(){


    $("#articulaciones").css("height", $("#dashboard").css("height"));

    $("#chartContainerSpline").html("");
    $("#chartContainerTorta").html("");
    
    console.log("resize");
    
    $(".square").each(function(){
        $(this).css("height", $(this).width());
    });
    $(".rectangle").each(function(){
        $(this).css("height", (parseInt($(".model").width())) + "px" );
    });

    var chart = new CanvasJS.Chart("chartContainerTorta",
    {
        title: {
            text: ""
        },
        theme: "theme2",
        data: [
        {
            type: "doughnut",
            indexLabelFontFamily: "Garamond",
            indexLabelFontSize: 20,
            startAngle: 0,
            colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            indexLabelFontColor: "dimgrey",
            indexLabelLineColor: "darkgrey",
            toolTipContent: "{y} %",
            dataPoints: [
            {y: <?= $metricas['atiempo'] > 0 ? ($metricas['atiempo']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : $metricas['atiempo'] ?>, label: "", nombre: "A tiempo"},
            {y: <?= $metricas['retrasada'] > 0 ? ($metricas['retrasada']) * 100 / ($metricas['atiempo'] + $metricas['retrasada']) : "0" ?>, label: "", nombre : "Retrasadas"}
            ]
        }
        ]
    });

    chart.render();

    var chart = new CanvasJS.Chart("chartContainerSpline",
    {
        title: {
            text: ""
        },

         axisY: {
            title: "Minutos de Retraso",
            includeZero: false
        },
        toolTip: {
            shared: "true"
        },
        data: [
        {
            type: "spline",
            showInLegend: false,
            name: "dosis",
            markerSize: 0,
            dataPoints: datosVisit
        }
        ]
    });

    chart.render();

});

});

</script>

    <style>
        th {
            text-align: left; padding:15px
        }
    </style>
</html>