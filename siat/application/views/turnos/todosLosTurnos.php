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
                    <div class="row-fluid">
                        <h1>Mis Turnos</h1>
                    </div>
                    <div class="page-header"> </div>
                    <div class="row-fluid">
                        <div id="calendar" class="span8 center offset2"></div>
                    </div>
                    <!--
                    <table id="clients_table" class="table-striped table" >
                    </table>
                    <div class="page-header"></div>
                -->
                    <div >
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">Nuevo Turno</a>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <form action="<?= base_url() ?>index.php/turnos/addTurno" method="POST">
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Nuevo Turno</h3>
            </div>
            <div class="modal-body">
                <div>
                    <select class="input-xxlarge" name="idPaciente">
                    <?php foreach($pac as $p): ?>
                    <option value="<?=$p->idPaciente?>"><?=$p->nombre?>&nbsp;<?=$p->apellido?></option>
                    <?php endforeach; ?>

                    </select>
                    <!--<input type="text" value="" style="padding:20px" class="input-xxlarge" name="idPaciente" placeholder="Paciente"/>-->
                </div>
                <div>
                    <input type="date" style="padding:20px;width: 49.7%;"  name="fecha"/>
                    <input type="time" style="padding:20px;width: 49.6%;"  name="hora"/>
                </div>
                <div >
                    <input type="text" style="padding:20px" class="input-xxlarge" name="lugar" placeholder="Lugar"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <form id="editarForm" action="<?= base_url() ?>index.php/turnos/editTurno" method="POST">
        <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Editar Turno</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input id="idPaciente" type="text" style="padding:20px" class="input-xxlarge" name="idPaciente" placeholder="Paciente"/>
                </div>
                <div >
                    <input id="fecha" type="date" style="padding:20px;width: 49.7%;"  name="fecha"/>
                    <input id="hora" type="time" style="padding:20px;width: 49.6%;"  name="hora"/>
                </div>
                <div >
                    <input id="lugar" type="text" style="padding:20px" class="input-xxlarge" name="lugar" placeholder="Lugar"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>

    <form id="delForm" action="#" method="POST">
        <div id="eliminarModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Eliminar Turno</h3>
            </div>
            <div class="modal-body">
                <h3>Si elimina el turno sus datos se perderan permanentemente!</h3>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <input type="submit" class="btn btn-danger" value="Eliminar"/>
            </div>
        </div>
    </form>    
    <?php foreach ($scripts as $script) { ?>
        <script src="<?= $script ?>"></script>    
        <?php
    }
    ?>

    <script>
        
    </script>
        
    <script>
        $(document).ready(function() {
            $("body").on('click', '.eliminar', function() {
                $("#delForm").attr("action", "<?= base_url() ?>index.php/turnos/delTurno/" + $(this).attr("id"));
            });
            $("body").on('click', '.editar', function() {
                $("#editarForm").attr("action", "<?= base_url() ?>index.php/turnos/editTurno/" + $(this).attr("id"));
                $.ajax({
                    url: "<?= base_url() ?>index.php/turnos/getJsonFromId/" + $(this).attr("id"),
                    method: "POST",
                    success: function(response) {
                        response = $.parseJSON(response);
                        $("#idPaciente").val(response.idPaciente);
                        $("#fecha").val(response.fecha);
                        $("#hora").val(response.hora2);
                        $("#lugar").val(response.lugar);
                    }
                });
            });

        });

    </script>
    
    <script type="text/javascript">
        $(function() {

            /* initialize the external events
             * 
             * 
             -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });




            /* initialize the calendar
             -----------------------------------------------------------------*/

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();


            var calendar = $('#calendar').fullCalendar({
                buttonText: {
                    prev: '',
                    next: ''
                },
                header: {
                    left: '',
                    center: '',
                    right: ''
                },
                events: [],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    var $extraEventClass = $(this).attr('data-class');


                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    if ($extraEventClass)
                        copiedEventObject['className'] = [$extraEventClass];

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                }
                ,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                        /*
                    bootbox.prompt("New Event Title:", function(title) {
                        if (title !== null) {
                            calendar.fullCalendar('renderEvent',
                                    {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },
                            true // make the event "stick"
                                    );
                        }
                    });


                    calendar.fullCalendar('unselect');
*/
                }
                ,
                eventClick: function(calEvent, jsEvent, view) {

                    var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
                    form.append("<input autocomplete=off type=text value='" + calEvent.title + "' /> ");
                    form.append("<button type='submit' class='btn btn-small btn-success'><i class='icon-ok'></i> Save</button>");

                    var div = bootbox.dialog(form,
                            [
                                {
                                    "label": "<i class='icon-trash'></i> Delete Event",
                                    "class": "btn-small btn-danger",
                                    "callback": function() {
                                        calendar.fullCalendar('removeEvents', function(ev) {
                                            return (ev._id == calEvent._id);
                                        })
                                    }
                                }
                                ,
                                {
                                    "label": "<i class='icon-remove'></i> Close",
                                    "class": "btn-small"
                                }
                            ]
                            ,
                            {
                                // prompts need a few extra options
                                "onEscape": function() {
                                    div.modal("hide");
                                }
                            }
                    );

                    form.on('submit', function() {
                        calEvent.title = form.find("input[type=text]").val();
                        calendar.fullCalendar('updateEvent', calEvent);
                        div.modal("hide");
                        return false;
                    });


                    //console.log(calEvent.id);
                    //console.log(jsEvent);
                    //console.log(view);

                    // change the border color just for fun
                    //$(this).css('border-color', 'red');

                }

            });
            
            var turnos = <?=$turnos?>;
            
            var color = new Array('#E43D3D', '#625EBA', '#A4A3B0', '#6AC460', '#507C4C', '#6AD5E3', '#E3E36A');
            $.each(turnos ,function(key, value){
                console.log("asd");
                calendar.fullCalendar('renderEvent',
                        {
                                title: value.title,
                                start: value.start,
                                color: color[Math.floor(Math.random()*7+1)]
                        },
                        true
                );
            });

        })
    </script>
</html>