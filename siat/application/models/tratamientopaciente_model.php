<?php

class tratamientopaciente_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getTratamiento($id){
        
        $resultado = Array();
        
        $tratamiento = $this->db->query("
                SELECT *, DATE_FORMAT(detalletratamiento.fechaInicio, '%d-%m-%Y') AS fechaInicio FROM tratamiento LEFT JOIN detalletratamiento ON 
                    tratamiento.idTratamiento = detalletratamiento.idTratamiento
                    WHERE tratamiento.idPaciente = $id
            ")->row();
        
        $dosis = $this->db->query("SELECT *, DATE_FORMAT(fechaHoraPrevisto, '%H:%iHs el dia %d-%m-%Y' ) AS fechaHoraPrevistoFormated, fechaHoraPrevisto as fecha FROM dosis WHERE activa = 1 AND aplicada = 0 AND
            idTratamiento = $tratamiento->idTratamiento ORDER BY fecha ASC ")->result();
        
        foreach ($tratamiento as $key => $value) {
            $resultado[$key] = $value;
        }
        
        $resultado['dosis'] = $dosis;
        
        return $resultado;
    }

    public function getTipoPatologia($idPaciente){
            $idPatologia = $this->db->query("SELECT idPatologia FROM paciente WHERE idPaciente = $idPaciente")->row();
            return $idPatologia->idPatologia;
    }
    
    public function aplicar($idDosis){
        $this->db->query("UPDATE dosis SET aplicada=1, fechaHoraReal=NOW() WHERE idDosis='$idDosis' ");
    }
    
    public function aDemanda($idPaciente, $cant, $art, $tiem){
        
        $tratamiento = $this->db->query("
           SELECT * FROM paciente p
               LEFT JOIN tratamiento t ON t.idPaciente = p.idPaciente
			   LEFT JOIN detalletratamiento dt ON dt.idTratamiento = t.idTratamiento 
			   LEFT JOIN perfiles pr ON pr.id_usuario = p.idUsuario
               WHERE p.idPaciente = '$idPaciente'
        ")->row();
        
        $this->db->query("INSERT INTO dosis (`idTratamiento`, `fechaHoraPrevisto`, `fechaHoraReal`, `aplicada`, `activa`, `tipo`) VALUES 
            ('$tratamiento->idTratamiento', DATE_FORMAT(NOW(), '%Y-%m-%d %H-%i-%s'), DATE_FORMAT(NOW(), '%Y-%m-%d %H-%i-%s'), '1', '1', '2')");
        $this->db->query("INSERT INTO detalledosis (`tiempo`, `idPaciente`, `articulacion`, `cantidad`, `fecha`) VALUES 
            ('$tiem', '$idPaciente', '$art', '$cant', DATE_FORMAT(NOW(), '%Y-%m-%d %H-%i-%s'))");
    }
    
}

?>
