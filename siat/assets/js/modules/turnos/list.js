var table_turnos;

$(function(){
    
    table_turnos = $("#clients_table").dataTable({
        "bProcessing" : true,
        "bServerSide" : true,
        "bLengthChange" : true,
        "oLanguage" : { 
            "sSearch" : ""
        },
        "sServerMethod" : "POST",
        "sAjaxSource" : BASE_URL+"index.php/turnos/getJson",
        "aoColumnDefs" : [
            {
                "sName" : "fecha",
                "mDataProp" : "fecha",
                "sTitle" : "Fecha",
                "aTargets" : [0]
            },
            {
                "sName" : "hora2",
                "mDataProp" : "hora2",
                "sTitle" : "Hora",
                "aTargets" : [1]
            },
            {
                "sName" : "nombre",
                "mDataProp" : "nombre",
                "sTitle" : "Nombre",
                "aTargets" : [2]
            },
            {
                "sName" : "apellido",
                "mDataProp" : "apellido",
                "sTitle" : "Apellido",
                "aTargets" : [3]
            },
            {
                "sName" : "documento",
                "mDataProp" : "documento",
                "sTitle" : "Documento",
                "sWidth": "110px",
                "aTargets" : [4]
            },
            {
                "sName" : "idTurno",
                "mDataProp" : "idTurno",
                "sTitle" : "Editar",
                "sClass" : "center",
                "sWidth": "48px",
                "aTargets" : [5],
                "bSortable" : false,
                "mRender" : function(data, full, e){
                    return "<a href='#editModal' id='"+data+"' class='editar' role='button' data-toggle='modal' ><i class='icon-pencil'></i></a>";
                }
            },
            {
                "sName" : "idTurno",
                "mDataProp" : "idTurno",
                "sTitle" : "Eliminar",
                "sClass" : "center",
                "sWidth": "68px",
                "aTargets" : [6],
                "bSortable" : false,
                "mRender" : function(data, full, e){
                    return "<a href='#eliminarModal' id='"+data+"' class='eliminar' role='button' data-toggle='modal' >\n\
                                <i class='icon-trash'></i></a>";
                }
            }
        ]
        
    });
});
