<?php
class footer_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getCarrito($idUsuario){
       $idSupermercado = $this->db->select("id")->from("supermercado")->where("idUsuario",$idUsuario)->get()->row();
       $idSupermercado = $idSupermercado->id;
       return  $this->db->query("SELECT idProducto, SUM( cantidad ) AS total_cant, prec
									FROM  `carro` 
									LEFT JOIN producto ON producto.id = carro.idProducto
									WHERE idSupermercado = $idSupermercado
									GROUP BY idProducto")->result();
    }
    
}
?>