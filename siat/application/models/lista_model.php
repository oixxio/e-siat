<?php
class lista_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getProductos($idUsuario){
       $role = $this->db->select("role")->from("usuario")->where("id",$idUsuario)->get()->row();       
       $role = $role->role;      
       if($role == 2){       
        //mayorista
           $idMayorista = $this->db->select("id")->from("mayorista")->where("idUsuario",$idUsuario)->get()->row();
           $idMayorista = $idMayorista->id;
           //$productos = $this->db->select('idProducto')->from('rel_producto_propietario')->where('idRole',$role)->where('idPropietario',$idMayorista)->get()->result();
           
    			$this->db->select('*');
    			$this->db->where('idPropietario', $idMayorista);
    			$this->db->where('idRole', $role);
    			$this->db->join('producto', 'producto.id = rel_producto_propietario.idProducto', 'left');
	        return $this->db->get('rel_producto_propietario')->result();
    
       }
    }
    public function getMayorista($idUsuario){
        return $this->db->select("id")->from("mayorista")->where("idUsuario",$idUsuario)->get()->row();   
    }
}
?>