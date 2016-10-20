<?php
class adheridas_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getAdheridas(){
        return $this->db->select("*")->from("empresa")->where("sponsor","0")->get()->result(); 
    }
}
?>