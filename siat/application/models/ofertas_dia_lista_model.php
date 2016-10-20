<?php
class ofertas_dia_lista_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getOfertasDia($idMayorista){
    	return $this->db->select("*")->from("ofertas_dia")->where("idMayorista",$idMayorista)->get()->result();   
    }
}
?>