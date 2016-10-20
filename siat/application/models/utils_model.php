<?php


class utils_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function checkUserNameExist($userName){
        
        $result = $this->db->query("SELECT * FROM usuario WHERE nombreUsuario='$userName'");
        
        return $result->num_rows();
        
    }
    
    public function setViewed(){
        $cont=0;
        foreach($_POST as $item){
            $this->db->query("UPDATE notificaciones SET active=0, 
                fechaVista = DATE_FORMAT(NOW(), '%Y-%m-%d %H-%i-%s') WHERE id='".$_POST['id_'.$cont++]."'");
        }
        
    }
    
    
}


?>
