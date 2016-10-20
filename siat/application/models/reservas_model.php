<?php
class reservas_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getCarrito($idUsuario){
       $idSupermercado = $this->db->select("id")->from("supermercado")->where("idUsuario",$idUsuario)->get()->row();
       $idSupermercado = $idSupermercado->id;
       return  $this->db->query("SELECT carro.id as idCarro, idProducto, producto.desc, SUM( cantidad ) AS total_cant, prec
									FROM  `carro` 
									LEFT JOIN producto ON producto.id = carro.idProducto
									WHERE idSupermercado = $idSupermercado
									GROUP BY carro.id")->result();
    }

    public function updateReserva($id, $cant){
      $this->db->where("id", $id);
      $this->db->update('carro', Array(
        "cantidad" => $cant
      ));
    }

    public function deleteReserva($id){
      $this->db->delete('carro', Array(
        "id" => $id
      ));
    }

    public function getCarritoPendiente($idUsuario){
       $idSupermercado = $this->db->select("id")->from("supermercado")->where("idUsuario",$idUsuario)->get()->row();
       $idSupermercado = $idSupermercado->id;
       return  $this->db->query("SELECT *, cp.cant as total_cant FROM compra c
        LEFT JOIN compra_producto cp ON cp.compraId = c.id 
        LEFT JOIN producto p ON p.id = cp.idProducto
        WHERE c.idSupermercado = $idSupermercado AND c.state=2
        ")->result(); 
    }

    public function getCarritoConfirmado($idUsuario){
       $idSupermercado = $this->db->select("id")->from("supermercado")->where("idUsuario",$idUsuario)->get()->row();
       $idSupermercado = $idSupermercado->id;
       return  $this->db->query("SELECT *, cp.cant as total_cant FROM compra c
        LEFT JOIN compra_producto cp ON cp.compraId = c.id 
        LEFT JOIN producto p ON p.id = cp.idProducto
        WHERE c.idSupermercado = $idSupermercado AND c.state=3
      ")->result(); 
    }

    public function createCompras($idSupermercado){

      $_C = $this->db->query("
        SELECT *, carro.id as idCarro FROM carro LEFT JOIN producto ON idProducto = producto.id WHERE type=2 AND idSupermercado=$idSupermercado
      ")->result();

      foreach ($_C as $k => $v) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO `compra`(`idSupermercado`, `alta`, `state`, `type`) VALUES ('$idSupermercado', NOW(), 2, 2);");
        $this->db->query("INSERT INTO `compra_producto`(`idProducto`, `compraId`, `alta`, `prec`, `cant`) VALUES ('$v->idProducto', LAST_INSERT_ID(), NOW(), '". $v->cantidad * $v->prec ."', '". $v->cantidad ."')");
        $this->db->query("DELETE FROM carro WHERE id=$v->idCarro");
        $this->db->trans_complete(); 
      }

    }
    
}
?>