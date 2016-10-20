<?php


class perfilMedico extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model("pacientes_model");
        $this->load->helper("url");
        $this->load->library("session");
        $this->data['data'] = $this->session->all_userdata();
        $this->load->helper('form');
        
        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'especialista')
            redirect(base_url()."index.php/pricinpal/index");
        
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
            "calendar" => base_url()."assets/js/fullcalendar.min.js",
            "bootbox" => base_url()."assets/js/bootbox.min.js",
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        $this->data['scripts']['CanvasJs'] = base_url()."assets/js/canvasjs.min.js";
        
    }
    
    
    public function index($state="0"){
        
         $id = $this->data['data']['idPaciente'];
         $this->load->model("pacientes_model");
        $this->data['info'] = $this->pacientes_model->pacienteInfo($id);
        $this->data['tratamiento'] = $this->pacientes_model->pacienteTratamiento($id);
        $this->data['historial'] = $this->pacientes_model->getHistorial($id);
		$this->load->model("tratamiento_model");
		$this->data['metricas'] = $this->tratamiento_model->getDosis($id);
        $this->data['state'] = $state;
        $this->data['idPaciente'] = $id;
        $this->data['files'] = $this->pacientes_model->getFiles($id);
		$this->data['adherencia'] = $this->pacientes_model->getAdherencia($id);
        $this->data['score'] = $this->pacientes_model->getPruebas();
        $this->data['scoreResult'] = $this->pacientes_model->getScoreResult($id);
        $this->data['prescripciones'] = $this->pacientes_model->getPrescripciones($id);
        
        $this->load->view("pacientes/pacienteInfoReadOnly" , $this->data);
    
        
    }

    public function cambiarImagenPerfil(){
        $id = $this->data['data']['idPaciente'];

       
        $this->load->model("pacientes_model");

        $config['upload_path'] = './profilepicture/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            //redirect(base_url()."index.php/principalSuperAdmin/perfil");
            echo  $this->upload->display_errors();
        }else{
            $data = $this->upload->data();
            
           $this->pacientes_model->doUploadImage($id, $data['file_name']);
           
            redirect(base_url()."index.php/perfilMedico/index");
        }
    
    }
    
    
}


?>