<?php


class notificaciones_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getNotificaciones($idUsuario){
        return $this->db->query("SELECT * FROM notificaciones n LEFT JOIN usuario u 
            ON n.involvedA_idUsuario = u.idUsuario WHERE n.involvedB_idUsuario = '$idUsuario' AND n.active=1 ")->result();
    }
    
    public function notificationWithIdPaciente($idUsuario, $idPaciente, $descripcion, $url, $ico){
        
        $paciente = $this->db->query("SELECT * FROM paciente WHERE idPaciente=$idPaciente LIMIT 1")->row();
        
        $this->db->query("INSERT INTO `notificaciones` (`involvedA_idUsuario`, `involvedB_idUsuario`,
                                  `descripcion`, `url`, `icon`) VALUES 
                                  ('$idUsuario', '$paciente->idUsuario', '$descripcion', '$url', '$ico' )");
    }
    
    public function notificationWithIdEspecialista($idUsuario, $idEspecialista, $descripcion, $url, $ico){
        
        $especialista = $this->db->query("SELECT * FROM especialista WHERE idEspecialista=$idEspecialista LIMIT 1")->row();
        
        $this->db->query("INSERT INTO `notificaciones` (`involvedA_idUsuario`, `involvedB_idUsuario`,
                                  `descripcion`, `url`, `icon`) VALUES 
                                  ('$idUsuario', '$especialista->idUsuario', '$descripcion', '$url', '$ico' )");
    }
    
    
    public function getAllNotificaciones($idUsuario){
        return $this->db->query("SELECT *, DATE_FORMAT(fechaCreada, '%H:%iHs %d/%m') as fechaCreada, n.active as active  FROM notificaciones n LEFT JOIN usuario u 
            ON n.involvedA_idUsuario = u.idUsuario 
            LEFT JOIN perfiles p ON u.idUsuario = p.id_usuario
            WHERE n.involvedB_idUsuario = '$idUsuario' ORDER BY fechaCreada DESC LIMIT 15")->result();
    }
    
    function notificationWithIdPacienteAll($idUsuario, $descripcion, $url, $ico){
        $this->db->query("CALL insertNotification($idUsuario, '$descripcion', '$url', '$ico')");
    }
    
}


?>
