<?php
class mayorista_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getComunicado($idMayorista){
        $idComunicado = $this->db->select("idComunicado")->from("mayorista")->where("id",$idMayorista)->get()->row(); 
        return  $this->db->select("*")->from("comunicado")->where("id",$idComunicado->idComunicado)->get()->row();
    }
    public function getLogo($idMayorista){
        return $this->db->select("logo")->from("mayorista")->where("id",$idMayorista)->get()->row(); 
    }    
    public function getMayorista($idMayorista){
        //get id de usuario del mayorista
       return  $this->db->select("idUsuario")->from("mayorista")->where("id",$idMayorista)->get()->row();
    }
    public function getSucursal($idMayorista){
       return  $this->db->select("idUsuario")->from("sucursal")->where("idMayorista",$idMayorista)->get()->row();
    }
}
?>