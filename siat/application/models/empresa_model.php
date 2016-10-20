<?php
class empresa_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getEmpresa($idUsuario){
       $role = $this->db->select("role")->from("usuario")->where("id",$idUsuario)->get()->row();
       $role = $role->role;
       if($role == 1){
        //empresa
            return $this->db->select("desc,idUsuario")->from("empresa")->where("idUsuario",$idUsuario)->get()->row();
       }else if($role == 6){
        //distribuidor
            return $this->db->select("desc,idUsuario")->from("distribuidores")->where("idUsuario",$idUsuario)->get()->row();
       }else if($role == 2){
        //mayorista
           return $this->db->select("desc,idUsuario")->from("mayorista")->where("idUsuario",$idUsuario)->get()->row();
       }
       else if($role == 7){
        //sucursal
           return $this->db->select("desc,idUsuario")->from("sucursal")->where("idUsuario",$idUsuario)->get()->row();
       }
       return "";
    }
    public function getMensajes($idUsuario,$idUsuario_empresa){
    	return  $this->db->select("*")->from("mensajes")->where("id_from",$idUsuario)->where("id_to",$idUsuario_empresa)->or_where("id_from",$idUsuario_empresa)->where("id_to",$idUsuario)->get()->result();
    }
}
?>