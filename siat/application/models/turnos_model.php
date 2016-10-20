<?php


class turnos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    function addTurno(){
        
        $_USER_DATA = $this->session->all_userdata();
        
        $this->db->insert('turno', array(
            "idPaciente" => $this->input->post("idPaciente"),
            "hora" => $this->input->post("fecha")." ".$this->input->post("hora"),
            "lugar" => $this->input->post("lugar"),
            "idEspecialista" => $_USER_DATA['idEspecialista']
        ));
        
    }
    
    function delTurno($id){
        $this->db->delete("turno", array(
            "idTurno" => $id
        )); 
    }
    function getJson($sSearch, $iDisplayBy, $iDisplayDir, $iDisplayOffset, $iDisplayLength ){
        
        $_USER_DATA = $this->session->all_userdata();
        $query = "SELECT *,DATE_FORMAT(hora, '%d %M %Y') AS fecha,DATE_FORMAT(hora, '%h:%i %p') AS hora2 FROM turno t 
            LEFT JOIN paciente p ON p.idPaciente=t.idPaciente WHERE t.idEspecialista=".$_USER_DATA['idEspecialista']."
            AND (nombre LIKE '%$sSearch%' OR apellido LIKE '%$sSearch%')";
        $result = $this->db->query($query);
        $total = $result->num_rows();
        
        if($iDisplayLength > 0 || $iDisplayLength > 0){
            $_USER_DATA = $this->session->all_userdata();
            $query = "SELECT *,DATE_FORMAT(hora, '%d %M %Y') AS fecha,DATE_FORMAT(hora, '%h:%i %p') AS hora2 FROM turno t 
            LEFT JOIN paciente p ON p.idPaciente=t.idPaciente WHERE t.idEspecialista=".$_USER_DATA['idEspecialista']."
            AND (nombre LIKE '%$sSearch%' OR apellido LIKE '%$sSearch%')
                ORDER BY '$iDisplayBy' DESC LIMIT $iDisplayOffset, $iDisplayLength";
            $result = $this->db->query($query);            
        }
        
        
        
        return array(
            "data" => $result->result(),
            "total" => $total,
            "total_filter" => $result->num_rows()
        );
        
    }
    function getJsonFrom_Id($id){
        $result = $this->db->query("SELECT *,DATE_FORMAT(hora, '%Y-%m-%d') AS fecha,DATE_FORMAT(hora, '%H:%i') AS hora2 FROM turno
            WHERE turno.idTurno = $id")->result();
        return $result[0];
    }
    
    function editTurno($id){
        $this->db->update("turno", array(
            "idPaciente" => $this->input->post("idPaciente"),
            "hora" => $this->input->post("fecha")." ".$this->input->post("hora"),
            "lugar" => $this->input->post("lugar")
        ), array(
            "idTurno" => $id
        ));
    }
    
    function getTurnos(){
        $_USER_DATA = $this->session->all_userdata();
        return $this->db->query("SELECT hora as start, 
            CONCAT(perfiles.nombre, ' ', perfiles.apellido, ' ', DATE_FORMAT(hora, '%H:%iHs')) as title 
            FROM turno LEFT JOIN paciente ON paciente.idPaciente=turno.idPaciente 
            LEFT JOIN perfiles ON paciente.idUsuario = perfiles.id_usuario
            WHERE turno.idEspecialista="
                .$_USER_DATA['idEspecialista'])->result();
    }
    
    
    function getTurnosPaciente($id){
        $_USER_DATA = $this->session->all_userdata();
        return $this->db->query("SELECT * FROM turno LEFT JOIN paciente ON paciente.idPaciente=turno.idPaciente 
            WHERE turno.idPaciente=$id AND turno.idEspecialista="
                .$_USER_DATA['idEspecialista'])->result();
    }
    
}



?>