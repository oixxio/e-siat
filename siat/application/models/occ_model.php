<?php
class occ_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getOcc(){
        return $this->db->select("id,desc,precio,pic")->from("occ")->where("cad_date >","now()", FALSE)->get()->result(); 
    }
}
?>