<?php
class session_model extends CI_Model {    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    	$this->load->library('session');
    } 
    public function acceso(&$data){
		$data['userData'] = $this->session->all_userdata();        
		if(isset($data['userData']['id'])){            
            return TRUE;
        }else{            
            return FALSE;
        }
    } 
}
?>