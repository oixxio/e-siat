<?php
class productos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getProductos($idMarca){
       return  $this->db->select("id,desc,pic,prec")->from("producto")->where("idMarca",$idMarca)->get()->result();
    }
}
?>