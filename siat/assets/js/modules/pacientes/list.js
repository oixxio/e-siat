var table_pacients;

$(function(){
    
    table_pacients = $("#clients_table").dataTable({
        "bProcessing" : true,
        "bServerSide" : true,
        "bLengthChange" : true,
        "iDisplayLength" : 50,
        "oLanguage" : { 
            "sSearch" : ""
        },
        "sServerMethod" : "POST",
        "sAjaxSource" : BASE_URL+"index.php/pacientes/getJson",
        "aoColumnDefs" : [
            {
                "sName" : "nombre",
                "mDataProp" : "nombre",
                "sTitle" : "Nombre",
                "aTargets" : [0],
                "mRender" : function(data, full, e){
                    return "<a href='"+BASE_URL+"index.php/pacientes/showProfile/"+e.idPaciente+"' class='editar' role='button' data-toggle='modal' >"+data+"</a>";
                }
            },
            {
                "sName" : "apellido",
                "mDataProp" : "apellido",
                "sTitle" : "Apellido",
                "aTargets" : [1]
            },
            {
                "sName" : "documento",
                "mDataProp" : "documento",
                "sTitle" : "Documento",
                "aTargets" : [2]
            },
            {
                "sName" : "idPaciente",
                "mDataProp" : "idPaciente",
                "sTitle" : "Editar",
                "aTargets" : [3],
                "bSortable" : false,
                "mRender" : function(data, full, e){
                    return "<a href='#editModal' id='"+data+"' class='editar' role='button' data-toggle='modal' ><i class='icon-pencil'></i></a>";
                }
            },
            {
                "sName" : "idPaciente",
                "mDataProp" : "idPaciente",
                "sTitle" : "Eliminar",
                "aTargets" : [4],
                "bSortable" : false,
                "mRender" : function(data, full, e){
                    return "<a href='#eliminarPaciente' id='"+data+"' class='eliminar' role='button' data-toggle='modal' >\n\
                                <i class='icon-trash'></i></a>";
                }
            },
            {
                "sName" : "idPaciente",
                "mDataProp" : "idPaciente",
                "sTitle" : "Turnos",
                "aTargets" : [5],
                "bSortable" : false,
                "mRender" : function(data, full, e){
                    return "<a href='"+BASE_URL+"index.php/turnos/listaTurnosPaciente/"+data+"' class='eliminar' role='button' data-toggle='modal' >\n\
                                <i class='icon-calendar'></i></a>";
                }
            }
        ]
        
    });
});