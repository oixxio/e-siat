<?php
class sponsor_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getComunicado($idEmpresa){
        $idComunicado = $this->db->select("idComunicado")->from("empresa")->where("id",$idEmpresa)->get()->row(); 
        return  $this->db->select("*")->from("comunicado")->where("id",$idComunicado->idComunicado)->get()->row();
    }
    public function getLogo($idEmpresa){
        return $this->db->select("logo")->from("empresa")->where("id",$idEmpresa)->get()->row(); 
    }
    public function getMarcas($idEmpresa){
        return $this->db->select("*")->from("rel_marca_propietario")->join("marca","marca.id=idProducto","LEFT")->where("idPropietario",$idEmpresa)->where("idRole","1")->get()->result(); 
    }
    public function getEmpresa($idEmpresa){
       return  $this->db->select("idUsuario")->from("empresa")->where("id",$idEmpresa)->get()->row();
    }
    public function getDistribuidor($idEmpresa){
       return  $this->db->select("idUsuario")->from("distribuidores")->where("idEmpresa",$idEmpresa)->get()->row();
    }
}
?>