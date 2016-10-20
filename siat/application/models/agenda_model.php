<?php


class agenda_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    
    function getJson($sSearch, $iDisplayBy, $iDisplayDir, $iDisplayOffset, $iDisplayLength ){
        
        $_USER_DATA = $this->session->all_userdata();
       $query = "SELECT *,DATE_FORMAT(horaDesde, '%H:%i') AS hora1,DATE_FORMAT(horaHasta, '%H:%i') AS hora2 FROM especialista e, agenda a 
            WHERE e.idEspecialista = ".$_USER_DATA['idEspecialista'].
                " AND e.idAgenda=a.idAgenda AND (a.dia LIKE '%$sSearch%' OR a.lugar LIKE '%$sSearch%')";
        $result = $this->db->query($query);
        $total = $result->num_rows();
        
        if($iDisplayLength > 0 || $iDisplayLength > 0){
            $_USER_DATA = $this->session->all_userdata();
            $query = "SELECT *,DATE_FORMAT(horaDesde, '%H:%i') AS hora1,DATE_FORMAT(horaHasta, '%H:%i') AS hora2 FROM especialista e, agenda a 
            WHERE e.idEspecialista = ".$_USER_DATA['idEspecialista'].
            " AND e.idAgenda=a.idAgenda AND (a.dia LIKE '%$sSearch%' OR a.lugar LIKE '%$sSearch%')
                ORDER BY '$iDisplayBy' DESC LIMIT $iDisplayOffset, $iDisplayLength";
            $result = $this->db->query($query);            
        }
        
        
        
        return array(
            "data" => $result->result(),
            "total" => $total,
            "total_filter" => $result->num_rows()
        );
        
    }
    
    
}



?>