<?php
class producto_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getProducto($idProducto){
       return  $this->db->select("*")->from("producto")->where("id",$idProducto)->get()->row();
    }
     public function carrito($idProducto, $cantidad, $idUsuario){
     	$idSuper = $this->db->select('id')->from("supermercado")->where("idUsuario",$idUsuario)->get()->row();
     	$this->db->insert('carro',Array('idSupermercado'=>$idSuper->id,'idProducto'=>$idProducto,'cantidad'=>$cantidad, 'type'=>'2'));
     }
}
?>