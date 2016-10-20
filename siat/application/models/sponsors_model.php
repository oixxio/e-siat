<?php
class sponsors_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getSponsors(){
        return $this->db->select("*")->from("empresa")->where("sponsor","1")->get()->result(); 
    }
}
?>