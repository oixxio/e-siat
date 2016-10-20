var table_agenda;

$(function(){
    
    table_agenda = $("#clients_table").dataTable({
        "bProcessing" : true,
        "bServerSide" : true,
        "bLengthChange" : true,
        "oLanguage" : { 
            "sSearch" : ""
        },
        "sServerMethod" : "POST",
        "sAjaxSource" : BASE_URL+"index.php/agenda/getJson",
        "aoColumnDefs" : [
            {
                "sName" : "dia",
                "mDataProp" : "dia",
                "sTitle" : "Día",
                "aTargets" : [0]
            },
            {
                "sName" : "hora1",
                "mDataProp" : "hora1",
                "sTitle" : "Desde",
                "aTargets" : [1]
            },
            {
                "sName" : "hora2",
                "mDataProp" : "hora2",
                "sTitle" : "Hasta",
                "aTargets" : [2]
            },
            {
                "sName" : "lugar",
                "mDataProp" : "lugar",
                "sTitle" : "Lugar",
                "aTargets" : [3]
            }
        ]
        
    });
});