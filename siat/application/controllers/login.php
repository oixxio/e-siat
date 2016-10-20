<?php

class login extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("login_model");
        
        $this->load->library("session");
        
        $this->data['data'] = $this->session->all_userdata();
        
        $this->data['scripts'] = array(
            "jquery" => base_url()."assets/js/jquery-1.9.1.min.js",
            "jqueryui" => base_url()."assets/js/jquery-ui-1.10.3.custom.min.js",
            "bootstrap" => base_url()."assets/js/bootstrap.js",
            "datatable" => base_url()."assets/js/jquery.dataTables.min.js",
            "choosen" => base_url()."assets/js/chosen.jquery.min.js",
            "fuelux" => base_url()."assets/js/fuelux/fuelux.spinner.min.js",
            "date-time" => base_url()."assets/js/date-time/bootstrap-datepicker.min.js",
            "timepicker" => base_url()."assets/js/date-time/bootstrap-timepicker.min.js",
            "dateranger" => base_url()."assets/js/date-time/daterangepicker.min.js",
            "color" => base_url()."assets/js/bootstrap-colorpicker.min.js",
            "knob" => base_url()."assets/js/jquery.knob.min.js",
            "autosize" => base_url()."assets/js/jquery.autosize-min.js",
            "inputlimiter" => base_url()."assets/js/jquery.inputlimiter.1.3.1.min.js",
            "maskedinput" => base_url()."assets/js/jquery.maskedinput.min.js",
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'especialista')
            redirect(base_url()."index.php/principal/index");
        
    }
     
    public function index($error = ""){
       $this->load->view("login/loginIndex", array(
          "error" => $error
       ));
    }
    
    public function cheUserData(){
        //$this->session->sess_destroy();
        $state = $this->login_model->login();
        switch ($state){
            case 0:
                redirect (base_url()."index.php/login/");
                break;
            case 1 :
                redirect (base_url()."index.php/principal/index");
                break;
            case 2: 
                redirect (base_url()."index.php/principalPaciente/index");
                break;
            case 3: 
                redirect (base_url()."index.php/pacientesObrasocial/index");
                break;
            case 4: 
                redirect (base_url()."index.php/principalSuperAdmin/listarPacientes");
                break;
        }
    }
    
    public function addEspecialista(){
        
        $email = $this->input->post("email");
        $usuario = $this->input->post("usuario");
        $contrasenia = $this->input->post("contrasenia");
        
        if($this->login_model->createUser($email, $usuario, $contrasenia))
            redirect (base_url()."index.php/principal/index");
        else
            redirect (base_url()."index.php/login/index");
        
    }

    public function loginApp($id){
        $state = $this->login_model->loginApp($id);
        switch ($state){
            case 0 :
                redirect (base_url()."index.php/principal/index");
                break;
            case 1: 
                redirect (base_url()."index.php/principalPaciente/index");
                break;
            case 2: 
                redirect (base_url()."index.php/principalObrasocial/index");
                break;
            case 3: 
                redirect (base_url()."index.php/login/");
                break;
        }
    }
    
}


?>