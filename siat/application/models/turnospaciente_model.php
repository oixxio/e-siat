<?php


class turnospaciente_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getTurnos($id){
        return $this->db->query("SELECT DATE_FORMAT(hora, '%d-%m-%Y') AS fecha,
                                        DATE_FORMAT(hora, '%Y-%m-%d') AS fechaField,
                                        DATE_FORMAT(hora, '%H:%i') AS hora,
                                        lugar, observaciones, idTurno, asistenciaPaciente
                                    FROM turno WHERE idPaciente='$id'")->result();   
    }
    
    public function solicitudCambio($id, $fecha, $hora){
        $this->db->query("INSERT INTO solicitudes_turnos (`id_turno`, `fecha`) VALUES ('$id', '$fecha $hora')");
    }
    
    public function solicitudCancelacion($id){
        $this->db->query("UPDATE turno SET asistenciaPaciente='0' WHERE idTurno='$id' ");
    }
    
    public function resolicitud($id){
        $this->db->query("UPDATE turno SET asistenciaPaciente='1' WHERE idTurno='$id' ");
    }
    
}


?>
