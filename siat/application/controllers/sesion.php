<?php

class sesion extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper("url");
        $this->load->model("login_model");
        
        $this->load->library("session");
        
        $this->data['data'] = $this->session->all_userdata();
        
        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login");
        
    }
    
    public function cerrarSesion(){
        $this->session->sess_destroy();
        redirect(base_url()."index.php/login/index");
    }
    
}

?>
