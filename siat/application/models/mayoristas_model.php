<?php
class mayoristas_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getMayoristas(){
        return $this->db->select("*")->from("mayorista")->get()->result(); 
    }
}
?>