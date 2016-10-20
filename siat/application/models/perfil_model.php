<?php


class perfil_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getEspecialistaInfo($id){ 
                
        return $this->db->query("SELECT * FROM especialista e LEFT JOIN usuario u ON
                    e.idUsuario = u.idUsuario LEFT JOIN perfiles p ON 
                    u.idUsuario = p.id_usuario WHERE e.idEspecialista = $id LIMIT 1")->row();
    }
    
    public function checkUserName($userName, $actualName){
        
        $result = $this->db->query("SELECT * FROM usuario WHERE nombreUsuario='$userName' AND nombreUsuario<>'$actualName'");
        
        return $result->num_rows();
        
    }
    
    public function actualizarData($telCasa, $telPer, $telOfi, $lguarNacimiento, $titulo, $genero, $fechaNacimiento,
            $codigoPostal, $correoElectronico, $edad, $ciudad, $estado, $nombre, $apellido, $direccion, $id){
        
        $this->db->query("UPDATE perfiles SET telefono_casa='$telCasa' , telefono_personal='$telPer', 
                        telefono_oficina='$telOfi', lugar_nacimiento='$lguarNacimiento', titulo='$titulo', genero='$genero',
                        fecha_nacimiento='$fechaNacimiento', codigo_postal='$codigoPostal', correo_electronico='$correoElectronico',
                        edad='$edad', ciudad='$ciudad', estado='$estado', nombre='$nombre', apellido='$apellido', direccion='$direccion' WHERE  id_usuario=$id");
    }
    
    public function updatePass($usuario, $oldP, $newP, $idUsuario){
        
        $newP = $newP != "" ? $newP : $oldP;
        $salt = md5(uniqid(rand(), true));
		
        $result = $this->db->query("SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'$oldP'), 512) = hash AND idUsuario='$idUsuario' LIMIT 1")->row();
		
        if(isset($result->idUsuario)){
            $this->db->query("UPDATE usuario SET nombreUsuario='$usuario', hash=SHA2(CONCAT('$salt','$newP'), 512) , salt='$salt' WHERE idUsuario='$result->idUsuario' ");
            return true;
        }
        
        return false;
        
    }
    
    public function doUpload($id, $nombre){
        $this->db->query("UPDATE perfiles SET imagen_perfil='$nombre' WHERE id_usuario='$id'");
    }
    
}


?>
