<?php


class prescripciones_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getPrescripciones($id){
        return $this->db->query("SELECT * FROM prescripciones WHERE idPaciente='$id'")->result();
    }
    
    public function setRecibida($idPresc, $cant, $fecha, $hora){
        
        $this->db->query("UPDATE prescripciones SET recibido='1', cantidadRecibida='$cant', fechaRecibido=DATE_FORMAT('$fecha $hora', '%Y-%m-%d %H:%i:%s')
                WHERE id='$idPresc'
                ");
        
    }
    
    public function getPrescripcionesObraSocial($id){
        return $this->db->query("SELECT * FROM prescripciones pr LEFT JOIN paciente pa ON
                                    pr.idPaciente=pa.idPaciente WHERE pa.idObraSocial=$id")->result();
    }
    
    public function setEntregada($id, $cant, $fecha, $hora, $lote){
        $this->db->query("UPDATE prescripciones SET entregada=1, cantidadEntregada='$cant', fechaEntregada=DATE_FORMAT('$fecha $hora', '%Y-%m-%d %H:%i:%s'), lote='$lote' WHERE id='$id' ");
    }
    
    
}


?>
