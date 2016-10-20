<?php


class tratamiento_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getTratamiento($id){
        return $this->db->query("
            SELECT * FROM tratamiento
            ")->row();
    }
	
	public function getDosis($id){
	
		$resultados = Array();
	
		$asd = $this->db->query("SELECT * FROM tratamiento WHERE idPaciente=$id")->row();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$resultados['total'] = $dosis->num_rows();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND tipo=1  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$resultados['profilaxis'] = $dosis->num_rows();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND tipo=2  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$resultados['demanda'] = $dosis->num_rows();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND tipo=1  AND activa=1 AND
								DATE_ADD(fechaHoraPrevisto, INTERVAL 30 MINUTE) > fechaHoraReal
									ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$resultados['atiempo'] = $dosis->num_rows();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND tipo=1  AND activa=1 AND
								DATE_ADD(fechaHoraPrevisto, INTERVAL 30 MINUTE) < fechaHoraReal ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$resultados['retrasada'] = $dosis->num_rows();

		$dosis = $this->db->query("SELECT MAX(TIMESTAMPDIFF(HOUR, fechaHoraPrevisto, fechaHoraReal)) as max FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=1 AND tipo=1 AND activa=1 LIMIT 1");
		$max = $dosis->row();

		$resultados['maxDesvio'] = $max->max;

		$omitidas = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$asd->idTratamiento." AND aplicada=2 AND activa=1 ");

		$resultados['omitidas'] = $omitidas->num_rows();
		
		$dosis = $this->db->query("SELECT *, DATE_FORMAT(fechaHoraReal, '%H') as diff, DATE_FORMAT(fechaHoraPrevisto, '%H') as diff2 FROM dosis WHERE idTratamiento=".$asd->idTratamiento." 
		AND aplicada=1 AND activa=1 GROUP BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC")->result();
		
		$resultados['dosis'] = $dosis;
		return $resultados;
	}
    
}

?>
