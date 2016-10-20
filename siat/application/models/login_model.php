<?php
 

class login_model extends CI_Model {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    
    public function login(){
        $usuario = $this->input->post("user");
        $contrasenia = $this->input->post("pass");
        //El codigo de abajo es el que va si se sube de nuevo a produccion.
        /*$result = $this->db->query("SELECT * FROM usuario LEFT JOIN perfiles ON perfiles.id_usuario = usuario.idUsuario WHERE 
            SHA2(CONCAT(salt,'$contrasenia'), 512) = hash AND nombreUsuario='$usuario' LIMIT 1")->result();*/
        $result = $this->db->query("SELECT * FROM usuario LEFT JOIN perfiles ON perfiles.id_usuario = usuario.idUsuario WHERE nombreUsuario='$usuario' LIMIT 1")->result();  

        if(sizeof($result)>0){
            switch ($result[0]->tipoUsuario){
                case "especialista" : {
                    $userData = $this->db->get_where("especialista", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 1;
                        break;
                }
                case "paciente" : {
                    $userData = $this->db->get_where("paciente", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 2;
                        break;
                }
                case "obrasocial" : {
                    $userData = $this->db->get_where("obrasocial", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 3;
                        break;
                }
                case "superadmin" : {
                    $this->session->set_userdata($result[0]);
                    return 4;
                        break;
                }
               case "control_lote" : {
                    $this->session->set_userdata($result[0]);
                    return 4;
                        break;
                }
            }
        }
        return 0;
    }

    public function loginApp($id){

        $result = $this->db->query("SELECT * FROM usuario LEFT JOIN perfiles ON perfiles.id_usuario = usuario.idUsuario WHERE 
            idUsuario=$id LIMIT 1")->result(); 
        if(sizeof($result)>0){
            switch ($result[0]->tipoUsuario){
                case "especialista" : {
                    $userData = $this->db->get_where("especialista", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 0;
                        break;
                }
                case "paciente" : {
                    $userData = $this->db->get_where("paciente", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 1;
                        break;
                }
                case "obrasocial" : {
                    $userData = $this->db->get_where("obrasocial", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                    $this->session->set_userdata($result[0]);
                    $this->session->set_userdata($userData[0]);
                    return 2;
                        break;
                }
            }
        }
        return 3;
    }
    
    public function createUser($email, $usuario, $contrasenia){
        
        $salt = md5(uniqid(rand(), true));
        $hash = hash('sha512', $salt.$contrasenia);
        
        $this->db->query("INSERT INTO usuario (`nombreUsuario`,`hash`, `salt` ,`tipoUsuario`) VALUES ('$usuario', '$hash', '$salt' ,'especialista')");
        
        $resultado = $this->db->query("SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'$contrasenia'), 512) = hash AND nombreUsuario='$usuario' LIMIT 1")->row();
        
        $this->db->query("INSERT INTO perfiles (`correo_electronico`, `id_usuario`) VALUES ('$email', $resultado->idUsuario)");
        
        $this->db->query("INSERT INTO especialista (`idUsuario`) VALUES ('$resultado->idUsuario')");
        
        $result = $this->db->query("
            SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'$contrasenia'), 512) = hash AND nombreUsuario='$usuario' LIMIT 1
         ")->result(); 
        if(sizeof($result)>0){
            switch ($result[0]->tipoUsuario){
                case "especialista" : {
                    $userData = $this->db->get_where("especialista", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                        break;
                }
                case "paciente" : {
                    $userData = $this->db->get_where("paciente", array(
                        "idUsuario" => $result[0]->idUsuario
                    ), 1)->result();
                        break;
                }
            }
            $this->session->set_userdata($result[0]);
            $this->session->set_userdata($userData[0]);
            return true;
        }
        return false;
        
    }
    
}


?>