<?php


class multimediaObrasocial extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("multimedia_model");
        $this->data['data'] = $this->session->all_userdata();
        $this->load->helper('form');
        
        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'paciente')
            redirect(base_url()."index.php/principalPaciente/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'especialista')
            redirect(base_url()."index.php/principalEspecialista/index");
        
        $this->load->model("notificaciones_model");
        $this->data['notificaciones'] = $this->notificaciones_model->getNotificaciones($this->data['data']['idUsuario']);
        
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
        
    }
    
    public function videos(){
        $this->data["videos"] = $this->multimedia_model->getVideos();
        $this->load->view("obrasocial/multimedia/videos", $this->data);
    }
    
    public function pdf(){
       $this->data["pdf"] = $this->multimedia_model->getPdf();
        $this->load->view("obrasocial/multimedia/pdf", $this->data);
    }
    
}


?>
